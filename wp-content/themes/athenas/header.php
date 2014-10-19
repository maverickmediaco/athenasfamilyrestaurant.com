<?php
/**
 * The template for displaying the header.
 *
 * Contains the opening tag for the page structure
 */
?><!DOCTYPE html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]--><head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title(''); ?></title>
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1"/>

<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-touch.png">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<!--[if IE]><link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"><![endif]-->
<meta name="msapplication-TileColor" content="#f01d4f">
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/win8-tile-icon.png">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<!--[if lt IE 9]>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv-printshiv.min.js"></script>
<![endif]-->

<?php wp_head(); ?>



<link rel="stylesheet" href="/athenasfamilyrestaurant.com/wp-content/themes/athenas/bootstrap-3.2.0-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/athenasfamilyrestaurant.com/wp-content/themes/athenas/bootstrap-3.2.0-dist/fonts/glyphicons-halflings-regular.eot">
<link rel="stylesheet" href="/athenasfamilyrestaurant.com/wp-content/themes/athenas/bootstrap-3.2.0-dist/fonts/glyphicons-halflings-regular.svg">
<link rel="stylesheet" href="/athenasfamilyrestaurant.com/wp-content/themes/athenas/bootstrap-3.2.0-dist/fonts/glyphicons-halflings-regular.ttf">
<link rel="stylesheet" href="/athenasfamilyrestaurant.com/wp-content/themes/athenas/bootstrap-3.2.0-dist/fonts/glyphicons-halflings-regular.woff">
<link rel="stylesheet" href="/athenasfamilyrestaurant.com/wp-content/themes/athenas/bootstrap-3.2.0-dist/js/bootstrap.min.js">



<link href="/athenasfamilyrestaurant.com/wp-content/themes/athenas/css/ihover.css" rel="stylesheet">

</head>

<body <?php body_class(); ?>>


    
    <div id="tel-bar">
        <div class="container">
            <div class="row-fluid">
                <div class="col-md-7"></div>
                <div id="order-now"class="col-md-2"><p>Order Now!</p></div>
                <div class="col-md-3">
                  <div class="row-fluid">
                  	<div id="tel" class="col-md-2"><span class="glyphicon glyphicon-earphone"></span></div>
                    <div id="tel-no"class="col-md-9"><p>(716) 692-2626</p></div>
                    <div class="col-md-1"></div>
                  </div>  
                </div>
            </div>
         </div>   
    </div>
			<header id="masthead" class="header" role="banner">
            <div class="container-fluid">
    				<div class="row-fluid">

				<div id="inner-header" class="wrap clearfix">
                 
                   	 	<div class="col-md-5">	
							<?php // to use a image just replace the bloginfo('name') with <img> ?>
							<div id="logo" class="h1"><img src="/athenasfamilyrestaurant.com/wp-content/themes/athenas/images/logo.png"></a>
                            <?php // if you'd like to use the site description you can un-comment it below
				// echo '<p class="site-description">'. bloginfo( "description" ) .'</p>' ?>
                            </div>
                		</div> 
                        <div class="col-md-7">
					
                
                <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'test' ); ?></a>

		<nav id="main-navigation" class="clearfix" role="navigation">

			<?php scaffolding_main_nav(); ?>

		</nav>
						</div>
                     </div>
                  </div>
</header>

		
<?php if ( is_front_page() ) { ?><!-- Homepage -->
		
		<?php // Interior Header Image ?>
        <div class="container">
        	<div id="greek_am_badge" class="row">
            	<div class="col-sm-2"></div>
                <div class="col-sm-10">
                <img src="/athenasfamilyrestaurant.com/wp-content/themes/athenas/images/headers/greek_american1.png">
        		</div>
                
            </div>
         </div>       
        <div class="banner-wrap">
        	
            <div id="banner">
            
                <div class="spacer"></div>
            </div>
        </div>
        
        <div id="meals">
        	<!-- From left and right -->
            
<div id="meal_circles" class="row">
			  <div class="col-sm-2"></div>
              <div id="circle_breakfast" class="col-sm-3">
              <a href="/athenasfamilyrestaurant.com/menu/breakfast/"><div class="circle_title">Breakfast</div></a>
                <!-- colored -->
                <div class="ih-item circle colored effect13 from_left_and_right"><a href="/athenasfamilyrestaurant.com/menu/breakfast/">
                    <div class="img"><img src="/athenasfamilyrestaurant.com/wp-content/themes/athenas/images/meal_circles/breakfast_circle.png" alt="breakfast"></div>
                    <div class="info">
                      <div class="info-back">
                        <h3>Breakfast Menu</h3>
                        <p>Click to View</p>
                      </div>
                    </div></a></div>
                <!-- end colored -->
             
              </div>
              
                     <div id="circle_lunch" class="col-sm-3">
                     <a href="/athenasfamilyrestaurant.com/menu/lunch/"><div class="circle_title">Lunch</div></a>
                <!-- colored -->
                <div class="ih-item circle colored effect13 from_left_and_right"><a href="/athenasfamilyrestaurant.com/menu/lunch/">
                    <div class="img"><img src="/athenasfamilyrestaurant.com/wp-content/themes/athenas/images/meal_circles/lunch_circle.png" alt="breakfast"></div>
                    <div class="info">
                      <div class="info-back">
                        <h3>Lunch Menu</h3>
                        <p>Click to View</p>
                      </div>
                    </div></a></div>
                <!-- end colored -->
             
              </div>
              
                    <div id="circle_dinner" class="col-sm-3">
                      <a href="/athenasfamilyrestaurant.com/menu/dinner/"><div class="circle_title">Dinner</div></a>
                <!-- colored -->
                <div class="ih-item circle colored effect13 from_left_and_right"><a href="/athenasfamilyrestaurant.com/menu/dinner/">
                    <div class="img"><img src="/athenasfamilyrestaurant.com/wp-content/themes/athenas/images/meal_circles/dinner_circle.png" alt="breakfast"></div>
                    <div class="info">
                      <div class="info-back">
                        <h3>Dinner Menu</h3>
                        <p>Click to View</p>
                      </div>
                    </div></a></div>
                <!-- end colored -->
             
              </div>
              <div class="col-sm-1"></div>
            </div>
            <!-- end From left and right -->
            <div id="circles_bg" class="row"></div>
 
        </div><!--End Meals -->
        <div id="greek_border"></div>
      
          <div id="section2" class="row">
        	<div class="col-md-4"><img src="/athenasfamilyrestaurant.com/wp-content/themes/athenas/images/fish_fry.png" alt="breakfast">
            </div>
            <div id="welcome" class="col-md-8"><h1>Welcome to Athena's Family Restaurant!</h1>
        <p>Paul Kouvoutsakis, owner of Athena's Family Restaurant, has been in the restaurant business for more than 3o years. 
Athena's is a family-owned and operated busness located in the heart of Tonawanda, NY.
We offer homemade food, quick service and a friendly atmosphere. Try our delicious breakfast, lunch and dinner menus and daily specials.We also offer take out service of our authentic Greek and American cuisine.</p>
<h2>Kali sas Orexi!</h2>
			</div>
          
		</div>
         <div class="monday">
           <div id="section3" class="row">
           		<div class="col-md-1"></div>

                <div id="homepage_specials" class="col-md-5">
                    <div class="row">
                        <div class="col-md-12"><img src="/athenasfamilyrestaurant.com/wp-content/themes/athenas/images/weekdays/01monday.jpg" alt="Monday">
                        </div>
                    </div>    
                    <div id="specials_list" class="row"> 
                        <div class="col-md-6">
                            <ul>
                                <li>Liver, Bacon & Onions</li>
                                <li>Stuffed Cabbage</li>
                                <li>8 oz. Chopped Sirloin </li>
                                <li>Pot Roast</li>
                                <li>Patty Melt</li>
                            </ul>    
                        </div>
                        <div class="col-md-6">
                             <ul>
                                <li>Rack of Lamb Dinner</li>
                                <li>Hot Roast Pork Sandwich</li>
                                <li>Bologna Steak Sandwich</li>
                                <li>Veal Parmigiana and Spaghetti</li>
                                <li>Veal Parmigiana Sandwich</li>
                            </ul> 
                        </div>
                  </div>     
                  </div>   
                <div class="col-md-1"></div>
                <div class="col-md-4"><img src="/athenasfamilyrestaurant.com/wp-content/themes/athenas/images/todays_specials.jpg" alt="Monday"></div>
                 <div class="col-md-1"></div>
           </div>     
         
      
        
        <?php } ?><!-- End Homepage -->

		<div id="content">

			<div id="inner-content" class="wrap clearfix">

				<?php // Test for active sidebars to set the main content width
					if(is_active_sidebar( 'left-sidebar' ) && is_active_sidebar( 'right-sidebar' )) { //both sidebars
						$main_class = 'col-sm-6 col-sm-push-3';
					}
					elseif(is_active_sidebar( 'left-sidebar' ) && !is_active_sidebar( 'right-sidebar' )) { //left sidebar
						$main_class = 'col-sm-9 col-sm-push-3';
					}
					elseif(!is_active_sidebar( 'left-sidebar' ) && is_active_sidebar( 'right-sidebar' )) { //right sidebar
						$main_class = 'col-sm-9';
					}
					else { //no sidebar
						$main_class = 'col-sm-12';
					}
				?>

				<div id="main" class="<?php echo $main_class;?> clearfix" role="main">