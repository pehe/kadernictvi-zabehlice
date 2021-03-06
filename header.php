<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SKT Cutsnstyle
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" type="text/css" media="all" />
<![endif]-->
<?php 
	wp_head(); 
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	if( !get_option( $themename ) ) {
	require get_template_directory() . '/index-default.php';
	exit;
	}
?>
</head>

<body <?php body_class(); ?>>
<div class="header">

<div class="header-inner">
    <div class="logo">
        <a href="<?php echo home_url('/'); ?>">
            <?php if( of_get_option( 'logo', true ) != '' ) { ; ?>
               <img src="<?php echo esc_url( of_get_option( 'logo', true )); ?>" / >
            <?php } else { ?>
                <h1><?php bloginfo('name'); ?></h1>
            <?php } ?> 
            	<span class="tagline"><?php bloginfo( 'description' ); ?></span>
        </a>
    </div><!-- logo -->  
                 
    <div class="header_info">
       <?php if(!dynamic_sidebar('header-widget')): ?>
            <div class="apointment"><?php echo of_get_option('headerinfo'); ?></div>	
            <div class="phoneemailfix">
            <span class="phone-no"><i class="fa fa-phone"></i><a href="tel:<?php echo of_get_option('phone',true); ?>"> <?php echo of_get_option('phone'); ?></a></span>
            <span class="email-id"><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo of_get_option('email',true); ?>"> <?php echo of_get_option('email',true) ; ?></a></span>
            </div>
        <?php endif; ?>
    <div class="clear"></div>
     </div><!--header_info-->
 <div class="clear"></div>
                                
                <div class="toggle">
                <a class="toggleMenu" href="#"><?php _e('Menu','skt-cutsnstyle'); ?></a>
                </div><!-- toggle -->
                <div class="nav">                   
                    <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
                </div><!-- nav --><div class="clear"></div>
</div><!-- header-inner -->
</div><!-- header -->


<?php if ( is_home() || is_front_page() ) { ?>
<?php if( of_get_option('customslider',true) == ''){ ?>
    <div class="slider-main">
       <?php
			$slAr = array();
			$m = 0;
			for ($i=1; $i<11; $i++) {
				if ( of_get_option('slide'.$i, true) != "" ) {
					$imgSrc 	= of_get_option('slide'.$i, true);
					$imglink	= of_get_option('slidelink'.$i, true);
					$slidebutton	= of_get_option('slidebutton'.$i, true);
					$slideurl	= of_get_option('slideurl'.$i, true);
					if ( strlen($imgSrc) > 10 ) {
						$slAr[$m]['image_src'] = of_get_option('slide'.$i, true);
						$slAr[$m]['image_button'] = of_get_option('slidebutton'.$i, true);
						$slAr[$m]['image_url'] = of_get_option('slidelink'.$i, true);
						$m++;
					}
				}
			}
			$slideno = array();
			if( $slAr > 0 ){
				$n = 0;?>
                <div id="slider" class="nivoSlider">
                <?php 
                foreach( $slAr as $sv ){
                    $n++; ?><img src="<?php echo esc_url($sv['image_src']); ?>" alt="<?php echo esc_attr($sv['image_title']);?>" title="<?php echo '#slidecaption'.$n ; ?>"/><?php
                    $slideno[] = $n;
                }
                ?>
                </div> 
                
       

                 <?php
                foreach( $slideno as $sln ){ ?>
                    <div id="slidecaption<?php echo $sln; ?>" class="nivo-html-caption">
                    <div class="slide_info">
                        <?php if( of_get_option('slidetitle'.$sln, true) != '' ){ ?>                          
                        <a href="<?php echo of_get_option('slideurl'.$sln, true); ?>"><h2><?php echo of_get_option('slidetitle'.$sln, true); ?></h2></a>						
                        <?php } ?>
                         <?php if( of_get_option('slidedesc'.$sln, true) != '' ){ ?>                         
                             <p><?php echo do_shortcode(of_get_option('slidedesc'.$sln, true)); ?></p>
                         <?php } ?>						                        
                        <?php if( of_get_option('slideurl'.$sln, true) != '' ){ ?>
                             <a class="button" href="<?php echo of_get_option('slideurl'.$sln, true); ?>">
							   <?php echo of_get_option('slidebutton'.$sln, true); ?>
                             </a>
                         <?php } ?>  
                        
                    </div>
                    </div><?php } ?>
                
        <div class="clear"></div>        
		<?php if( of_get_option('openingtiming') != ''){ ?>
        <div class="time-table">          
             <?php echo do_shortcode(of_get_option('openingtiming', true)); ?>
        </div>
          <?php } ?>
                </div>
                <div class="clear"></div><?php } ?>
                

        </div>
        

    </div><!-- slider -->
    <?php } else {
 $short_code = of_get_option('customslider');
 echo do_shortcode($short_code);
 } ?>
	<?php } else { ?>        
			<div class="innerbanner">                 
           <?php
			$header_image = get_header_image();
			if( is_single() || is_archive() || is_category() || is_author()|| is_search()) { 
        		echo '<img src="'.of_get_option('innerpagebanner', true ).'" alt="">';
			}
			elseif( has_post_thumbnail() ) {
				$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$thumbnailSrc = $src[0];
				echo '<img src="'.$thumbnailSrc.'" alt="">';
			} 
			elseif ( ! empty( $header_image ) ) {
				echo '<img src="'.esc_url( $header_image ).'" width="'.get_custom_header()->width.'" height="'.get_custom_header()->height.'" alt="" />';
            }	
			else { 
            	echo '<img src="'.of_get_option('innerpagebanner', true ).'" alt="">';
		    } ?>
            </div> 
	<?php }	?>
    <?php include ('page-box.php'); ?>