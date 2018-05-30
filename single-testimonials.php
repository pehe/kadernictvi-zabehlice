<?php
/**
 * The Template for displaying all single posts.
 *
 * @package SKT Cutsnstyle
 */
get_header(); 
 
?>
<div class="content-area">
    <div class="middle-align">
        <div class="site-main sitefull">
		<?php $possition = get_post_meta( get_the_ID(), 'possition', true ); ?>
			<?php while ( have_posts() ) : the_post(); ?>
            	
                <h1 class="entry-title"><?php the_title(); ?></h1>
               <h6> <?php echo $possition; ?></h6>
                <?php the_post_thumbnail('medium', array('class' => 'alignleft') ); ?>
                <?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>