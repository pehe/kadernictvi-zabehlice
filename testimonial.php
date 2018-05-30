<?php
/**
Template name: Testimonials

 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Cutsnstyle
 */

get_header(); ?>

<div class="content-area">
    <div class="middle-align">
        <div class="site-main sitefull">
        <?php while ( have_posts() ) : the_post(); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
        <?php the_content(); ?>
 		<?php endwhile; // end of the loop. ?>

			<?php $args = array( 'post_type' => 'testimonials', 'posts_per_page' => -1 ); $loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="testimonial-all">
                    <h5><?php the_title(); ?></h5>
					<?php $possition = get_post_meta( get_the_ID(), 'possition', true ); ?>
                    
					<?php the_post_thumbnail(array(200,200) , array('class' => 'alignleft' ) ); ?>
                    <h6> <?php echo $possition; ?></h6>
                    <?php the_content(); ?>
                    <div class="clear"></div>
                    </div>
			<?php endwhile; echo wp_reset_query(); ?>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>