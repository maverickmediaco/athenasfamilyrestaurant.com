<?php

/*
Plugin Name: Showtime
Plugin URI: http://www.outtolunchproductions.com/showtime
Description: Allows you to create, manage and display a programming schedule. Optional display of the next upcoming show. Insert into templates with &lt;?php if (function_exists('showme_showtime')) echo showme_showtime(); ?&gt; and into posts/pages with the [showtime-schedule] shortcode.
Author: Carter Fort
Version: 3.0
Author URI: http://www.outtolunchproductions.com
*/
if (!defined('ABSPATH')) {
	exit("Sorry, you are not allowed to access this page directly.");
}

/* Set constant for plugin directory */
define( 'SS3_URL', WP_PLUGIN_URL.'/showtime' );

$showtime_db_version = "3.0";
$showtimeTable = $wpdb->prefix . "WPShowtime";

$tz = get_option('timezone_string');
date_default_timezone_set($tz);

//Installation

function showtime_install () {
   global $wpdb;
   global $showtime_db_version;
   global $showtimeTable;

   $showtimeTable = $wpdb->prefix . "WPShowtime";


   if($wpdb->get_var("show tables like '$showtimeTable'") != $showtimeTable) {
      
      $sql = "CREATE TABLE " . $showtimeTable . " (
	  id int(9) NOT NULL AUTO_INCREMENT,
	  dayOfTheWeek text NOT NULL,
	  startTime int(11) NOT NULL,
	  endTime int(11) NOT NULL,
	  startClock text not null,
	  endClock text not null,
	  showName text NOT NULL,
	  linkURL text NOT null,
	  imageURL text not null,
	  UNIQUE KEY id (id)
	);";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);
 
      add_option("showtime_db_version", $showtime_db_version);

   }

}

register_activation_hook(__FILE__,'showtime_install');

//Queue up jQuery

function showtime_jQuery_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}    
 
add_action('wp_enqueue_scripts', 'showtime_jQuery_method');

//Register and create the Widget

class ShowTimeWidget extends WP_Widget
{
 /**
  * Declares the ShowTimeWidget class.
  *
  */
    function ShowTimeWidget(){
    $widget_ops = array('classname' => 'widget_showtime', 'description' => __( "Display your schedule with style.") );
    $control_ops = array('width' => 300, 'height' => 300);
    $this->WP_Widget('ShowTime', __('Showtime'), $widget_ops, $control_ops);
    }

  /**
    * Displays the Widget
    *
    */
    function widget($args, $instance){
      extract($args);
      $title = apply_filters('widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title']);

      # Before the widget
      echo $before_widget;

      # The title
      if ( $title )
      echo $before_title . $title . $after_title;

      # Make the Showtime widget
      echo showme_showtime();

      # After the widget
      echo $after_widget;
  }

  /**
    * Saves the widgets settings.
    *
    */
    function update($new_instance, $old_instance){
      $instance = $old_instance;
      $instance['title'] = strip_tags(stripslashes($new_instance['title']));
      $instance['lineOne'] = strip_tags(stripslashes($new_instance['lineOne']));
      $instance['lineTwo'] = strip_tags(stripslashes($new_instance['lineTwo']));

    return $instance;
  }

  /**
    * Creates the edit form for the widget.
    *
    */
    function form($instance){
      //Defaults
      $instance = wp_parse_args( (array) $instance, array('title'=>'Now Playing') );

      $title = htmlspecialchars($instance['title']);

      # Output the options
      echo '<p style="text-align:right;"><label for="' . $this->get_field_name('title') . '">' . __('Title:') . ' <input style="width: 250px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></label></p>';
        }

}

  function ShowTimeInit() {
  register_widget('ShowTimeWidget');
  }
  add_action('widgets_init', 'ShowTimeInit'); 


//==== OPTIONS ====

add_option('showtime_upcoming', 'yes');
add_option('showtime_use_images', 'yes');
add_option('showtime_shutitdown', 'no');
add_option('off_air_message', 'We are currently off the air.');
add_option('showtime_css', '');
add_option('showtime_shutitdown', 'no');


//==== SHORTCODES ====

function showtime_schedule_handler($atts, $content=null, $code=""){

	global $wpdb;
	global $showtimeTable;

	//Get the current schedule, divided into days
	$daysOfTheWeek = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

	$schedule = array();

	$output = '';

	foreach ($daysOfTheWeek as $day) {
		//Add this day's shows HTML to the $output array
		$showsForThisDay =  $wpdb->get_results( $wpdb->prepare ( "SELECT * FROM $showtimeTable WHERE dayOfTheWeek = %s ORDER BY startTime", $day ));

		//Check to make sure this day has shows before saving the header
		if ($showsForThisDay){
			$output .= '<h2>'.$day.'</h2>';
			$output .= '<ul class="showtime-schedule">';
			foreach ($showsForThisDay as $show){
				$showName = $show->showName;
				$startClock = $show->startClock;
				$endClock = $show->endClock;
				$linkURL = $show->linkURL;

				if ($linkURL){
					$showName = '<a href="'.$linkURL.'">'.$showName.'</a>';
				}

				$output .= '<li><strong>'.$startClock.'</strong> - <strong>'.$endClock.'</strong>: '.$showName.'</li>';

			}
			$output .= '</ul>';
		}
	}
	return $output;
}


add_shortcode('showtime-schedule', 'showtime_schedule_handler');

function showme_showtime(){

		$output = '<style>'.get_option('showtime_css', '').'</style>';
		$output .= '<div class="showtime-now-playing"></div>';
		return $output;

}

add_shortcode('showtime-now-playing', 'showme_showtime');


if ( is_admin() ){ // admin actions
	add_action('admin_menu', 'showtime_plugin_menu');
}


function showtime_image_upload_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_script('my-upload');
}
 
function showtime_image_upload_styles() {
wp_enqueue_style('thickbox');
}
 
if (isset($_GET['page']) && $_GET['page'] == 'showtime_settings') {
add_action('admin_print_scripts', 'showtime_image_upload_scripts');
add_action('admin_print_styles', 'showtime_image_upload_styles');
}

//==== ADMIN OPTIONS AND SCHEDULE PAGE ====

function showtime_plugin_menu() {
    // Add a new submenu under Options:
    add_menu_page('Showtime', 'Showtime', 5, 'showtime_settings', 'showtime_options_page', 0);

}

function admin_register_head() {
    $siteurl = get_option('siteurl');
    $url = SS3_URL . '/admin.css';
    echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
}
add_action('admin_head', 'admin_register_head');


function showtime_options_page(){

	global $wpdb;
	global $showtimeTable;
	//Check to see if the user is upgrading from an old Showtime database

	if (isset($_POST['upgrade-database'])){
		if (check_admin_referer('upgrade_showtime_database', 'upgrade_showtime_database_field')){

			if ($wpdb->get_var("show tables like '$showtimeTable'") != $showtimeTable){
				$sql = "CREATE TABLE " . $showtimeTable . " (
					  id int(9) NOT NULL AUTO_INCREMENT,
					  dayOfTheWeek text NOT NULL,
					  startTime int(11) NOT NULL,
					  endTime int(11) NOT NULL,
					  startClock text not null,
					  endClock text not null,
					  showName text NOT NULL,
					  linkURL text NOT null,
					  imageURL text not null,
					  UNIQUE KEY id (id)
					);";

				      $wpdb->query($sql);
			}
			
			$showtimeOldTable = $wpdb->prefix.'showtime';

			$oldShowtimeShows = $wpdb->get_results($wpdb->prepare("SELECT id, showstart, showend, showname, linkUrl, imageUrl FROM $showtimeOldTable WHERE id != %d", -1));
			if ($oldShowtimeShows){
				foreach ($oldShowtimeShows as $show){
					$showname = $show->showname;
					$startTime = $show->showstart;
					$endTime = $show->showend;
					$startDay = date('l', $startTime);
					$startClock = date('g:i a', ($startTime));
					$endClock = date('g:i a', ($endTime));
					$linkURL = $show->linkUrl;
					if ($linkURL == 'No link specified.'){
						$linkURL = '';
					}
					$imageURL = $show->imageUrl;

					//Insert the new show into the New Showtime Databse
					$wpdb->query( $wpdb->prepare("INSERT INTO $showtimeTable (dayOfTheWeek, startTime,endTime,startClock, endClock, showName,  imageURL, linkURL) VALUES (%s, %d, %d , %s, %s, %s, %s, %s)", $startDay, $startTime, $endTime, $startClock, $endClock, $showname, $imageURL, $linkURL )	);
				}
			}
		}
		//Remove the old Showtime table if the new table has been created
		if($wpdb->get_var("show tables like '$showtimeTable'") == $showtimeTable) {
			$wpdb->query("DROP TABLE $showtimeOldTable");
		}
	}

	echo '<script type="text/javascript" src="'.SS3_URL.'/admin.js" ></script>';

?>
	<div class="wrap">
		<div class="showtime-message-window">Message goes here.</div>
		<h1>Showtime</h1>
		<p><em>A WordPress plugin that really knows what time it is.</em><br /><small>by <a href='http://www.outtolunchproductions.com' target='_blank'>Out to Lunch Productions.</a></small></p>

		<?php
			//Check to see if Showtime 2.0 is installed
		 	$table_name = $wpdb->prefix . "showtime";
		   if($wpdb->get_var("show tables like '$table_name'") == $table_name) {
		   	?>
		   		<div class="error">
		   			<form method="post" action="">
		   				<p><strong>Previous version of Showtime detected.</strong> Be sure to back up your database before performing this upgrade. <input type="submit" class="button-primary" value="Upgrade my Showtime Database" /></p>
		   				<input type="hidden" name="upgrade-database" value=' ' />
						<?php wp_nonce_field('upgrade_showtime_database', 'upgrade_showtime_database_field'); ?>
		   			</form>
		   		</div>
		   	<?php
		   }

		?>

		<input type="hidden" class="script-src" readonly="readonly" value="<?= $_SERVER['PHP_SELF']; ?>?page=showtime_settings" />
		<?php wp_nonce_field('delete_showtime_entry', 'delete_entries_nonce_field'); ?>

		<ul class="tab-navigation">
			<li class="showtime-scheudle">Schedule</li>
			<li class="showtime-options">Display Options</li>
			<li class="shut-it-down" style="border:none;">Shut it Down</li>
		</ul>
		<div class="showtime-tabs">

			<div class="tab-container" id="showtime-schedule">

				<h2>Schedule</h2>

				<h3>Add new Show</h3>

				<div class="add-new-entry">

					<form id="add-showtime-entry" method="post" action="<?= SS3_URL ?>/crud.php">
						<div class="set-showtime-show-deets">
				            <div class="show-time-container">
					            <h3>Show Start</h3>
					           <label for="start">
						           	<select class="startDay" name="sday">
						          	 	<option value="Sunday">Sunday</option>
						            	<option value="Monday">Monday</option>
						            	<option value="Tuesday">Tuesday</option>
						            	<option value="Wednesday">Wednesday</option>
						            	<option value="Thursday">Thursday</option>
						            	<option value="Friday">Friday</option>
						            	<option value="Saturday">Saturday</option>
						            </select>
					        	</label> 
					            
					            <label for="starttime">
					            <input id="starttime" class="text" name="startTime" size="5" maxlength="5" type="text" value="00:00" /></label>
				            </div>
				            <div class="show-time-container">
					            <h3>Show End</h3> 
					           	<label for="endday">
						           	<select class="endDay" name="eday">
						           		<option value="Sunday">Sunday</option>
						            	<option value="Monday">Monday</option>
						            	<option value="Tuesday">Tuesday</option>
						            	<option value="Wednesday">Wednesday</option>
						            	<option value="Thursday">Thursday</option>
						            	<option value="Friday">Friday</option>
						            	<option value="Saturday">Saturday</option>
						            </select>
						        </label> 

					            <label for="endtime">
					            <input id="endtime" class="text" name="endTime" size="5" maxlength="5" type="text" value="00:00" /></label>
				             </div>
				             <div class="clr"></div>
				             <p><strong>Be sure to use 24 hour time (01:00 = 1 AM, 13:00 = 1 PM)</strong></p>
				             <p>Also, make sure your <a href="options-general.php">timezone <strong>city</strong></a> is set appropriately.<br/>
				             	<small><em>Current timezone: <?php if (get_option('timezone_string') == '') { echo '<strong style="color:red;">Set your <a href="options-general.php">timezone</a> city now.</strong></em></small></p>'; } else { echo get_option('timezone_string'); ?></em></small></p>
				            
				        </div>
				        <div class="set-showtime-show-deets">
				            <label for="showname"><h3>Show Details</h3></label> 
				            <p>Name: <br/>
				           		<input id="showname" type="text" name="showname" class="show-detail" />
							</p>
							
				            <p>Link URL (optional):<br />
								<label for="linkUrl">
				            
								<input type="text" name="linkUrl" placeholder="No URL specified." class="show-detail" />
								
							</p>
							
							<p id="primary-image"></p>
							<p><input class="image-url" type="hidden" name="imageUrl" data-target-field-name="new show" value=""/></p>
							<p><input type="button" class="upload-image button" data-target-field="new show" value="Upload Image" /></p>			
							<img src="" style="display:none;" data-target-field-name="new show" />
							<p><a id="remove-primary-image" href="#"><small>Remove Image</small></a></p>
							
								
				            <input type="submit" class="button-primary" style="cursor: pointer;" value="Add Show" />
				            <input type="hidden" name="crud-action" value="create" />
				            <?php wp_nonce_field('add_showtime_entry', 'showtime_nonce_field'); ?>

				            <?php } ?>

				        </div>
				    </form>

				<div class="clr"></div>

				</div>

				<h3>Current Schedule</h3>

				<p>Display type: <a href="#" class="display-toggle full-display">Full</a> | <a href="#" class="display-toggle simple-display">Simple</a></p>

				<form method="post" action="<?= SS3_URL ?>/crud.php" class="showtime-update-shows">
					<div class="showtime-schedule loading">
						<div class="sunday-container"><h2>Sunday</h2></div><!-- end this day of the week -->
						<div class="monday-container"><h2>Monday</h2></div><!-- end this day of the week -->
						<div class="tuesday-container"><h2>Tuesday</h2></div><!-- end this day of the week -->
						<div class="wednesday-container"><h2>Wednesday</h2></div><!-- end this day of the week -->
						<div class="thursday-container"><h2>Thursday</h2></div><!-- end this day of the week -->
						<div class="friday-container"><h2>Friday</h2></div><!-- end this day of the week -->
						<div class="saturday-container"><h2>Saturday</h2></div><!-- end this day of the week -->
					</div>
				<input type="hidden" name="crud-action" value="update" />
				<?php wp_nonce_field('save_showtime_entries', 'showtime_entries_nonce_field'); ?>

				</form>
				
				<p>Display type: <a href="#" class="display-toggle full-display">Full</a> | <a href="#" class="display-toggle simple-display">Simple</a></p>


			</div>

			<div class="tab-container" id="showtime-options">
			<form method="post" action="">
				<h2>Options</h2>
				<?php

				//Save posted options

				if (isset($_POST['showtime_options'])){


					update_option('showtime_upcoming', $_POST['showtime_options']['showUpcoming']);
					update_option('showtime_use_images', $_POST['showtime_options']['imagesOn']);
					update_option('off_air_message', htmlentities(stripslashes($_POST['showtime_options']['offAirMessage'])));
					update_option('showtime_css', htmlentities(stripslashes($_POST['showtime_options']['showtimeCSS'])));

				} else if (isset($_POST['shut-it-down'])) {
					update_option('showtime_shutitdown', $_POST['shut-it-down']);
				}

				//Set options variables
				$showUpcoming = get_option('showtime_upcoming');
				$imagesOn = get_option('showtime_use_images');
				$shutItDown = get_option('showtime_shutitdown');
				$offAirMessage = get_option('off_air_message');
				$showtimeCSS = get_option('showtime_css');
				$shutItDown = get_option('showtime_shutitdown');

				?>

				<h3>Display Images</h3>
					<form id="option" method="post" action="">
					<p>Show accompanying images with showtimes?</p>
						<label><input type="radio"<?php if($imagesOn == 'yes') { ?> checked="checked"<?php } ?> name="showtime_options[imagesOn]" value="yes" /> : Yes</label><br/>
						<label><input type="radio"<?php if($imagesOn == 'no') { ?> checked="checked"<?php } ?> name="showtime_options[imagesOn]" value="no" /> : No</label><br/>


					<h3>Upcoming Timeslot</h3>
					    
					<p>Show the name/time of the next timeslot?</p>
						<label><input type="radio"<?php if($showUpcoming == 'yes') { ?> checked="checked"<?php } ?> name="showtime_options[showUpcoming]" value="yes" /> : Yes</label><br/>
						<label><input type="radio"<?php if($showUpcoming == 'no') { ?> checked="checked"<?php } ?> name="showtime_options[showUpcoming]" value="no" /> : No</label><br/>


					<h3>Off-air Message</h3>
						<label>Off-air message:<br /><input type="text" id="off-air-message" value="<?= $offAirMessage; ?>" name="showtime_options[offAirMessage]" size="40" /></label>

	    
				    <p class="submit">
						<input type="submit" class="button-primary" value="Update Options" />
					</p>

		    <h2>Display Shortcodes</h2>
			<h3>[showtime-schedule]</h3>
				<p>Display a list of the times and names of your events, broken down into days of the week, like so:</p>
				<div style="margin-left:30px;">
				<h4>Thursday</h4>
					<ul>
						<li><strong>5:00 am - 10:00 am</strong> - Thursdie Moarning</li>
						<li><strong>10:00 am - 12:00 pm</strong> - Afternoons with Freddie</li>
					</ul>
					<h4>Friday</h4>
					<ul>
						<li><strong>7:00 am - 9:00 am</strong> - Drive Time</li>
						<li><strong>2:00 pm - 4:00 pm</strong> - Celebrity Immolations</li>
					</ul>
				</div>
			<h3>[showtime-now-playing]</h3>
				<p>Display the Now Playing widget.</p>
				
		   	<div class="clr"></div>
			<h2>CSS</h2>

		    <textarea name="showtime_options[showtimeCSS]" cols="90" rows="30"><?= $showtimeCSS ?></textarea>    

		    <p class="submit">
		    <input type="submit" class="button-primary" value="Update Options" />
		    </p>
		    </form>


			</div>

			<div class="tab-container" id="showtime-shut-it-down">
				
				<h2>Shut it Down</h2>

				<form method="post" action="">
					<p>You can temporarily take your schedule down in case of holidays, illnesses, thermo-nuclear war, etc.</p>
				    	<label><input type="radio"<?php if($shutItDown == 'yes') { ?> checked="checked"<?php } ?> name="shut-it-down" value="yes" /> : Yes, shut it down.</label><br/>
						<label><input type="radio"<?php if($shutItDown == 'no') { ?> checked="checked"<?php } ?> name="shut-it-down" value="no" /> : No, we're back to regularly scheduled programming. </label><br/>
				    
				    <p class="submit">
				    	<input type="submit" class="button-primary" value="Save it" />
					</p>
			 	</form>

			</div>

		</div><!-- end the showtime tabs -->

	</div>

<?

}

function showtime_header_scripts(){

	echo '<script>crudScriptURL = "'.SS3_URL.'/crud.php"</script>';
	echo '<script type="text/javascript" src="'.SS3_URL.'/showtime.js" ></script>';

}

add_action("wp_head","showtime_header_scripts");



?>