<?php if ( is_home() || is_front_page() ) { ?>

<section id="wrapOne" <?php if( of_get_option('hidewelcomesec', true) != '' ) { ?>style="display:none"<?php } ?>>
        <div class="container">          
            <div class="wrap_one">
             <?php if( of_get_option('welcomepage',false) ) { ?>
        		<?php $queryvar = new wp_query('page_id='.of_get_option('welcomepage',true));				
						while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
                        <h1><?php the_title(); ?></h1>
                          <?php the_post_thumbnail();?>                        
                         <p><?php echo wp_trim_words( get_the_content(), of_get_option('welcomesectionlength'), '...' ); ?></p>
						<?php endwhile;
						wp_reset_query(); ?>
               <?php } else { ?>
                <h1><?php _e('Welcome', 'skt-cutsnstyle') ?></h1>               
                <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. lobortis pellentesque orci, in sodales nisi pretium sit ame Integer sodales suscipit tellus, ut tristique neque suscipit a. Mauris tristique lacus quis leo imperdiet sed pulvinar dui fermentum. Aenean sit amet diam non tortor sagittis varius. Aenean at lorem nulla, sit amet interdum nibh. Aliquam gravida odio nec dui ornare tempus elementum lectus rhoncus. Suspendisse lobortis pellentesque orci, in sodales nisi pretium sit amet. Aenean vulputate, odio non euismod eleifend, magna nisl elementum lorem lobortis pellentesque.', 'skt-cutsnstyle') ?></p> 
                              
             <?php } ?>
            </div><!-- .wrap_one-->
            <div class="clear"></div>
        </div><!-- .container -->
    </section>


<section id="wrapTwo" <?php if( of_get_option('hideservicessec', true) != '' ) { ?>style="display:none"<?php } ?>>
    <div class="container">		
		<?php if( of_get_option('servicestitle') != '') { ?>
		<h2 class="section_title"><?php echo of_get_option('servicestitle'); ?></h2>
		<?php } ?>        
        <div class="services-wrap">
        <?php
                $boxArr = array();
                   if( of_get_option('box1',true) != '' ){
                    $boxArr[] = of_get_option('box1',false);
                   }
                   if( of_get_option('box2',true) != '' ){
                    $boxArr[] = of_get_option('box2',false);
                   }
                   if( of_get_option('box3',true) != '' ){
                    $boxArr[] = of_get_option('box3',false);
                   }
                   if( of_get_option('box4',true) != '' ){
                    $boxArr[] = of_get_option('box4',false);
                   }
                   if( of_get_option('box5',true) != '' ){
                    $boxArr[] = of_get_option('box5',false);
                   }
                   if( of_get_option('box6',true) != '' ){
                    $boxArr[] = of_get_option('box6',false);
                   }
                
                if (!array_filter($boxArr)) {
                for($fx=1; $fx<=3; $fx++) {
            ?>
 
            <div class="three_column <?php if($fx % 3 == 0) { echo "last_column"; } ?>">
             <a href="#">
             <div class="services-thumb"><img src="<?php bloginfo( 'template_url' ); ?>/images/thumb<?php echo $fx; ?>.jpg" alt="" /></div>
             <div class="services-content">
             <h2><?php _e('Make Up', 'skt-cutsnstyle') ?> <?php echo $fx; ?></h2>
			<p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'skt-cutsnstyle') ?></p>            
            </div>
            </a>
         </div>
          
			<?php 
			} 
			} else {
				$box_column = array('no_column','one_column','two_column','three_column','four_column','five_column','six_column');
				$fx = 1;
				$queryvar = new wp_query(array('post_type' => 'page', 'post__in' => $boxArr, 'posts_per_page' => 6, 'orderby' => 'post__in' ));
				while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
                   
                   <div class="three_column <?php echo $box_column[count($boxArr)]; ?> <?php if($fx % count($boxArr) == 0) { echo "last_column"; } ?>">
                   <a href="<?php the_permalink(); ?>"> 
					   <?php $boximg = of_get_option('boximg'.$fx,true); ?>
                       <?php if( !empty($boximg) ) { ?>
                             <div class="services-thumb">
                                <img alt="" src="<?php echo esc_url( of_get_option( 'boximg'.$fx, true )); ?>" / >
                             </div>
                       <?php } ?>
                   <div class="services-content" <?php if( empty($boximg) ) { ?> style="position:relative;" <?php } ?>>
                    <h2><?php the_title(); ?></h2>
                      <p><?php echo wp_trim_words( get_the_content(), of_get_option('threeboxlength'), '...' ); ?></p>
                    </div>
                    </a>
                    <div class="clear"></div>
                   </div>
             <?php 
			 $fx++; 
			 endwhile;
			 wp_reset_query();
			 }
			 ?>        
        
        
        
        
        </div><!-- .services-wrap-->
    <div class="clear"></div>
    </div><!-- .container -->
</section><!-- #wrapTwo -->

<?php } ?>
