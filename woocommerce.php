<?php
/**
 * The Template for displaying all Woocommerce.
 *
 * @package SKT Cutsnstyle
 */
get_header(); 

if( of_get_option('woocomercelayout',true) != ''){
	$woocomercelayout = of_get_option('woocomercelayout');
}
?>

<style>
<?php
	if( of_get_option('woocomercelayout', true) == 'woocomerceleft' ){
		echo '#sidebar{ float:left !important; }'; 
	}
?>
</style>

<div class="content-area">
    <div class="middle-align content_sidebar">
        <div class="site-main <?php echo $woocomercelayout; ?>" id="sitemain">
			<?php woocommerce_content(); ?>
        </div>
         <?php 
		if( $woocomercelayout != 'woocomercesitefull' ){
		  get_sidebar();
		} ?>
        <div class="clear"></div>
    </div>
</div>

 
<?php get_footer(); ?>