<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Cutsnstyle
 */
?>
<div id="footer-wrapper">
    	<div class="container">
        	
        	<?php if(!dynamic_sidebar('footer-1')) : ?>  
             <div class="cols-3 widget-column-1">            	
               <h5><?php if( of_get_option('aboutustitle') != '') { echo of_get_option('aboutustitle'); } ; ?></h5>
               <?php if( of_get_option('aboutdescription') != '') { echo of_get_option('aboutdescription'); } ; ?>
                <div class="clear"></div>    
              </div>                  
			<?php  endif; ?>
           
            
           
            <?php if(!dynamic_sidebar('footer-2')) : ?> 
             <div class="cols-3 widget-column-2">          
            	<h5><?php if( of_get_option('recentpoststitle') != ''){ echo of_get_option('recentpoststitle');}; ?></h5>
                 <ul class="recent-post">
                	<?php query_posts('post_type=post&showposts=2'); ?>
                    <?php  while( have_posts() ) : the_post(); ?>
                  	<li>
                    
<a href="<?php the_permalink(); ?>">
<?php if ( has_post_thumbnail() ) { $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );   $thumbnailSrc = $src[0]; ?>
	<img src="<?php echo $thumbnailSrc; ?>" alt="" width="60" height="auto" ><?php } 
else { ?>
	<img src="<?php echo esc_url( get_template_directory_uri()); ?>/images/img_404.png" width="67" height="49" />
<?php } ?></a>
					<p><?php echo wp_trim_words( get_the_content(), 10 , '...' ); ?></p>
                    <a href="<?php the_permalink(); ?>"><span> <?php if( of_get_option('footerreadmoretext') != ''){ echo of_get_option('footerreadmoretext');}; ?></span></a>
                    
                    </li>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </ul>
              </div>             
            <?php endif; ?>
          
            <?php if(!dynamic_sidebar('footer-3')) : ?>
              <div class="cols-3 widget-column-3">                
            	<h5><?php if( of_get_option('cutsstyletitle') != '') { echo of_get_option('cutsstyletitle'); } ; ?></h5>
               	
                <p><?php if( of_get_option('address',true) != '') { echo of_get_option('address',true) ; } ; ?></p>
                <p><?php if( of_get_option('address2',true) != '') { echo of_get_option('address2',true) ; } ; ?></p>
                <div class="phone-no">
                	<?php if( of_get_option('phone',true) != ''){ ?>
                		<p><span><?php _e('Phone:','skt-cutsnstylee'); ?></span><?php echo of_get_option('phone'); ?></p>
                    <?php } ?>
                    <?php if( of_get_option('email',true) != '' ) { ?>
                    <p><span><?php _e('E-mail:','skt-cutsnstylee'); ?></span><a href="mailto:<?php echo of_get_option('email',true); ?>"><?php echo of_get_option('email',true) ; ?></a></p>
                    <?php } ?>
                    <?php if( of_get_option('weblink',true) != ''){ ?>
                    	<p><span><?php _e('Website:','skt-cutsnstylee'); ?></span><a href="<?php echo of_get_option('weblink',true); ?>" target="_blank"><?php echo of_get_option('weblink',true); ?></a></p>
                    <?php } ?>
                </div>
               </div>
            <?php endif; ?>
            
            <div class="clear"></div>
        </div><!--end .container-->
        
        <div class="copyright-wrapper">
        	<div class="container">
            	<div class="copyright-txt"><?php if( of_get_option('copytext',true) != ''){ echo of_get_option('copytext',true); }; ?></div>
                <div class="design-by"><?php if( of_get_option('ftlink', true) != ''){echo of_get_option('ftlink',true);}; ?></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php wp_footer(); ?>
</body>
</html>