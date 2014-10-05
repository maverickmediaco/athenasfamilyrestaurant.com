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
                <div id="tel-no"class="col-md-2"><p>(716) 692-2626</p></div>
                <div id="tel" class="col-md-1"><span class="glyphicon glyphicon-earphone"></span></div>
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

		
		
		<?php // Interior Header Image ?>
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
                <!-- colored -->
                <div class="ih-item circle colored effect13 from_left_and_right"><a href="/athenasfamilyrestaurant.com/menu/breakfast/">
                    <div class="img"><img src="/athenasfamilyrestaurant.com/wp-content/themes/athenas/images/meal_circles/breakfast_circle.png" alt="breakfast"></div>
                    <div class="info">
                      <div class="info-back">
                        <h3>Breakfast</h3>
                        <p>Description goes here</p>
                      </div>
                    </div></a></div>
                <!-- end colored -->
             
              </div>
              
                     <div id="circle_lunch" class="col-sm-3">
                <!-- colored -->
                <div class="ih-item circle colored effect13 from_left_and_right"><a href="/athenasfamilyrestaurant.com/menu/breakfast/">
                    <div class="img"><img src="/athenasfamilyrestaurant.com/wp-content/themes/athenas/images/meal_circles/breakfast_circle.png" alt="breakfast"></div>
                    <div class="info">
                      <div class="info-back">
                        <h3>Breakfast</h3>
                        <p>Description goes here</p>
                      </div>
                    </div></a></div>
                <!-- end colored -->
             
              </div>
              
                     <div id="circle_dinner" class="col-sm-3">
                <!-- colored -->
                <div class="ih-item circle colored effect13 from_left_and_right"><a href="/athenasfamilyrestaurant.com/menu/breakfast/">
                    <div class="img"><img src="/athenasfamilyrestaurant.com/wp-content/themes/athenas/images/meal_circles/dinner_circle.png" alt="breakfast"></div>
                    <div class="info">
                      <div class="info-back">
                        <h3>Breakfast</h3>
                        <p>Description goes here</p>
                      </div>
                    </div></a></div>
                <!-- end colored -->
             
              </div>
              <div class="col-sm-1"></div>
            </div>
            <!-- end From left and right -->
             
             
           
        
        
        </div><!--End Meals--!>

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