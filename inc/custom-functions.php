<?php
/**
 * @package SKT Cutsnstyle
 * Setup the WordPress core custom functions feature.
 *
*/

add_action('skt_cutsnstyle_optionsframework_custom_scripts', 'skt_cutsnstyle_optionsframework_custom_scripts');
function skt_cutsnstyle_optionsframework_custom_scripts() { ?>
	<script type="text/javascript">
    jQuery(document).ready(function() {
    
        jQuery('#example_showhidden').click(function() {
            jQuery('#section-example_text_hidden').fadeToggle(400);
        });
        
        if (jQuery('#example_showhidden:checked').val() !== undefined) {
            jQuery('#section-example_text_hidden').show();
        }
        
    });
    </script><?php
}

// get_the_content format text
function get_the_content_format( $str ){
	$raw_content = apply_filters( 'the_content', $str );
	$content = str_replace( ']]>', ']]&gt;', $raw_content );
	return $content;
}
// the_content format text
function the_content_format( $str ){
	echo get_the_content_format( $str );
}

function is_google_font( $font ){
	$notGoogleFont = array( 'Arial', 'Comic Sans MS', 'FreeSans', 'Georgia', 'Lucida Sans Unicode', 'Palatino Linotype', 'Symbol', 'Tahoma', 'Trebuchet MS', 'Verdana' );
	if( in_array($font, $notGoogleFont) ){
		return false;
	}else{
		return true;
	}
}

// subhead section function
function sub_head_section( $more ) {
	$pgs = 0;
	do {
		$pgs++;
	} while ($more > $pgs);
	return $pgs;
}

//[clear]
function clear_func() {
	$clr = '<div class="clear"></div>';
	return $clr;
}
add_shortcode( 'clear', 'clear_func' );

//[separator height="20"]
function separator_shortcode_func($atts ) {
	extract( shortcode_atts( array(
		'height' => '20',
	), $atts ) );
	$sptr = '<div style="clear:both; min-height:20px; height:'.$height.'px; background:url('.get_template_directory_uri().'/images/hr_double.png) no-repeat center center transparent;"></div>';
	return $sptr;
}
add_shortcode( 'separator', 'separator_shortcode_func' );

//[blankspace height="20"]
function blankspace_shortcode_func($atts ) {
	extract( shortcode_atts( array(
		'height' => '20',
	), $atts ) );
	$sptr = '<div class="custom-height" style="height:'.$height.'px;"></div>';
	return $sptr;
}
add_shortcode( 'blankspace', 'blankspace_shortcode_func' );


//[column_content]Your content here...[/column_content]
function column_content_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' => '',
		'animation' => '',
	), $atts ) );
	$colPos = strpos($type, '_last');
	if($colPos === false){
		$cnt = '<div class="'.$type.' '.$animation.'">'.do_shortcode($content).'</div>';
	}else{
		$type = substr($type,0,$colPos);
		$cnt = '<div class="'.$type.' '.$animation.' last_column">'.do_shortcode($content).'</div>';
	}
	return $cnt;
}
add_shortcode( 'column_content', 'column_content_func' );


//[hr]
function hrule_func() {
	$hrule = '<div class="clear hrule"></div>';
	return $hrule;
}
add_shortcode( 'hr', 'hrule_func' );


//[hr_top]
function hr_top_func() {
	$hr_top = '<div class="clear linktotop"><a title="Top of Page" href="#top">Back to Top</a></div><div class="clear hrule"></div>';
	return $hr_top;
}
add_shortcode( 'hr_top', 'hr_top_func' );


// [searchform]
function searchform_shortcode_func( $atts ){
	return get_search_form( false );
}
add_shortcode( 'searchform', 'searchform_shortcode_func' );

// accordion
function accordion_func( $atts, $content = null ) {
	$acc = '<div style="margin-top:10px;">'.get_the_content_format( do_shortcode($content) ).'<div class="clear"></div></div>';
	return $acc;
}
add_shortcode( 'accordion', 'accordion_func' );
function accordion_content_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Accordion Title',
	), $atts ) );
	$content = wpautop(trim($content));
	$acn = '<div class="accordion-box"><h2>'.$title.'</h2>
			<div class="acc-content">'.$content.'</div><div class="clear"></div></div>';
	return $acn;
}
add_shortcode( 'accordion_content', 'accordion_content_func' );


// remove excerpt more
function new_excerpt_more( $more ) {
	return '... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

// get post categories function
function getPostCategories(){
	$categories = get_the_category();
	$catOut = '';
	$separator = ', ';
	$catOutput = '';
	if($categories){
		foreach($categories as $category) {
			$catOutput .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'skt-cutsnstyle' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
		}
		$catOut = 'Categories: '.trim($catOutput, $separator);
	}
	return $catOut;
}

// replace last occurance of a string.
function str_lreplace($search, $replace, $subject){
	$pos = strrpos($subject, $search);
	if($pos !== false){
		$subject = substr_replace($subject, $replace, $pos, strlen($search));
	}
	return $subject;
}

function readmore_func( $atts) {
	extract(shortcode_atts(array(	
	'button'		=> '',	
	'links'		=> '',
	'align'		=> '',						
	), $atts));
	$rrow = '<div class="view-all-btn" style="text-align:'.$align.'"><a href="'.$links.'">'.$button.'</a></div>';
    return $rrow;
}
add_shortcode( 'readmore-link', 'readmore_func' );


// custom post type for Testimonials
function my_custom_post_testimonials() {
	$labels = array(
		'name'               => __( 'Testimonials','skt-cutsnstyle'),
		'singular_name'      => __( 'Testimonials','skt-cutsnstyle'),
		'add_new'            => __( 'Add Testimonials','skt-cutsnstyle'),
		'add_new_item'       => __( 'Add New Testimonial','skt-cutsnstyle'),
		'edit_item'          => __( 'Edit Testimonial','skt-cutsnstyle'),
		'new_item'           => __( 'New Testimonial','skt-cutsnstyle'),
		'all_items'          => __( 'All Testimonials','skt-cutsnstyle'),
		'view_item'          => __( 'View Testimonial','skt-cutsnstyle'),
		'search_items'       => __( 'Search Testimonial','skt-cutsnstyle'),
		'not_found'          => __( 'No Testimonial found','skt-cutsnstyle'),
		'not_found_in_trash' => __( 'No Testimonial found in the Trash','skt-cutsnstyle'), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Testimonials',
		'public'        => true,
		'menu_icon'		=> 'dashicons-format-quote',
		'menu_position' => null,
		'supports'      => array( 'title', 'editor', 'thumbnail'),
		'has_archive'   => true,
	);
	register_post_type( 'testimonials', $args );	
}
add_action( 'init', 'my_custom_post_testimonials' );


// add meta box to testimonials
add_action( 'admin_init', 'my_testimonial_admin_function' );
function my_testimonial_admin_function() {
    add_meta_box( 'testimonial_meta_box',
        'Testimonial Info',
        'display_testimonial_meta_box',
        'testimonials', 'normal', 'high'
    );
}
// add meta box form to team
function display_testimonial_meta_box( $testimonial ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $possition = esc_html( get_post_meta( $testimonial->ID, 'possition', true ) ); 
	
    ?>
    <table width="100%">       
        <tr>
            <td width="20%">Designation </td>
            <td width="80%"><input size="80" type="text" name="possition" value="<?php echo $possition; ?>" /></td>
        </tr>       
    </table>
    <?php    
}
// save testimonial meta box form data
add_action( 'save_post', 'add_testimonial_fields_function', 10, 2 );
function add_testimonial_fields_function( $testimonial_id, $testimonial ) {
    // Check post type for testimonials
    if ( $testimonial->post_type == 'testimonials' ) {
        // Store data in post meta table if present in post data		 
        if ( isset($_POST['possition']) ) {
            update_post_meta( $testimonial_id, 'possition', $_POST['possition'] );
        }       
    }
}



//Testimonials function
function testimonials_output_func( $atts ){
	extract( shortcode_atts( array( 'show' => '',), $atts ) ); $postoutput = ''; wp_reset_query();
	$testimonialoutput = '<div id="testimonials">';
	wp_reset_query();
	$n = 0;
 	query_posts('post_type=testimonials&posts_per_page='.$show);
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();		
		$n++;
		if($n%2==0) $nomargin = 'client-say-last';
		else $nomargin = ' ';
		$possition = esc_html( get_post_meta( get_the_ID(), 'possition', true ) );
			$testimonialoutput .= '
			     <div class="client-say '.$nomargin.'">
				  <div class="say_thumb"> <a href="'.get_the_permalink().'">'.get_the_post_thumbnail( get_the_ID(), array(105,105) ).' </a> </div> 	                  
				  <div class="tm_description">
				   <p>'.wp_trim_words(get_the_content(), of_get_option('testimonialexcerptlength'), '').'</p>
					<a href="'.get_the_permalink().'"><h5><span>'.$possition.'</span> '.get_the_title().'</h5>  </a>
				  </div> 
				  <div class="clear"></div>				  			              
			  	</div>
				 ';
		endwhile;
		 $testimonialoutput .= '</div>';
	else:
	  $testimonialoutput = '<div id="testimonials">
			  <div class="client-say">
				  <div class="say_thumb">
					<img src="'.get_template_directory_uri()."/images/testimonial.png".'" alt="" />
				  </div> 	                  
				  
				  <div class="tm_description">
				   <p>Praesent dictum est vel ultrices convallis. Curaeleifend dolor at augue rutrum, in tristique leo tincidu bibendum quam ex. Aenean iaculis ante vitae hendrerit efficituring Etiam a lectus faucibus, dapibus lacus ac, laoreet nisi. Vivamus congue vitae mauris.</p>                 
					<h5>Suscipit libero</h5>  
				  </div> 				  			              
			  </div>


			  <div class="client-say client-say-last">
				  <div class="say_thumb">
					<img src="'.get_template_directory_uri()."/images/testimonial.png".'" alt="" />
				  </div> 	                  
				  
				  <div class="tm_description">
				   <p>Praesent dictum est vel ultrices convallis. Curaeleifend dolor at augue rutrum, in tristique leo tincidu bibendum quam ex. Aenean iaculis ante vitae hendrerit efficituring Etiam a lectus faucibus, dapibus lacus ac, laoreet nisi. Vivamus congue vitae mauris.</p>                 
					<h5>Suscipit libero</h5>  
				  </div> 				  			              
			  </div>

                 	     
    <div class="clear"></div>
  </div> ';			
	  endif;  
	wp_reset_query();
	$testimonialoutput .= '</div>';
	
	return $testimonialoutput;
}
add_shortcode( 'testimonials', 'testimonials_output_func' );


//custom post type for Our Team
function my_custom_post_team() {
	$labels = array(
		'name'               => __( 'Our Team', 'skt-cutsnstyle' ),
		'singular_name'      => __( 'Our Team', 'skt-cutsnstyle' ),
		'add_new'            => __( 'Add New', 'skt-cutsnstyle' ),
		'add_new_item'       => __( 'Add New Team Member', 'skt-cutsnstyle' ),
		'edit_item'          => __( 'Edit Team Member', 'skt-cutsnstyle' ),
		'new_item'           => __( 'New Member', 'skt-cutsnstyle' ),
		'all_items'          => __( 'All Members', 'skt-cutsnstyle' ),
		'view_item'          => __( 'View Members', 'skt-cutsnstyle' ),
		'search_items'       => __( 'Search Team Members', 'skt-cutsnstyle' ),
		'not_found'          => __( 'No Team members found', 'skt-cutsnstyle' ),
		'not_found_in_trash' => __( 'No Team members found in the Trash', 'skt-cutsnstyle' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Our Team'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Team',
		'public'        => true,
		'menu_position' => null,
		'menu_icon'		=> 'dashicons-groups',
		'supports'      => array( 'title', 'editor', 'thumbnail' ),
		'rewrite' => array('slug' => 'our-team'),
		'has_archive'   => true,
	);
	register_post_type( 'team', $args );
}
add_action( 'init', 'my_custom_post_team' );

// add meta box to team
add_action( 'admin_init', 'my_team_admin_function' );
function my_team_admin_function() {
    add_meta_box( 'team_meta_box',
        'Member Info',
        'display_team_meta_box',
        'team', 'normal', 'high'
    );
}
// add meta box form to team
function display_team_meta_box( $team ) {
    // Retrieve current name of the Director and Movie Rating based on review ID   
    $facebook = get_post_meta( $team->ID, 'facebook', true );
	$facebooklink = esc_url( get_post_meta( $team->ID, 'facebooklink', true ) );
    $twitter = get_post_meta( $team->ID, 'twitter', true );
	$twitterlink = esc_url( get_post_meta( $team->ID, 'twitterlink', true ) );
    $linkedin = get_post_meta( $team->ID, 'linkedin', true );
	$linkedinlink = esc_url( get_post_meta( $team->ID, 'linkedinlink', true ) );
	$googlelink = esc_url( get_post_meta( $team->ID, 'googlelink', true ) );
    $dribbble = get_post_meta( $team->ID, 'dribbble', true );
	$dribbblelink = get_post_meta( $team->ID, 'dribbblelink', true );
    ?>
    <table width="100%">      
        <tr>
            <td width="20%">Social link 1</td>
            <td width="40%"><input type="text" name="facebook" value="<?php echo $facebook; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="facebooklink" value="<?php echo $facebooklink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 2</td>
            <td width="40%"><input type="text" name="twitter" value="<?php echo $twitter; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="twitterlink" value="<?php echo $twitterlink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 3</td>
            <td width="40%"><input type="text" name="linkedin" value="<?php echo $linkedin; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="linkedinlink" value="<?php echo $linkedinlink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 4</td>
            <td width="40%"><input type="text" name="dribbble" value="<?php echo $dribbble; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="dribbblelink" value="<?php echo $dribbblelink; ?>" /></td>
        </tr>
        <tr>
        	<td width="100%" colspan="3"><label style="font-size:12px;"><strong>Note:</strong> Icon name should be in lowercase without space. More social icons can be found at: http://fortawesome.github.io/Font-Awesome/icons/</label> </td>
        </tr>
    </table>
    <?php    
}
// save team meta box form data
add_action( 'save_post', 'add_team_fields_function', 10, 2 );
function add_team_fields_function( $team_id, $team ) {
    // Check post type for testimonials
    if ( $team->post_type == 'team' ) {
        // Store data in post meta table if present in post data       
        if ( isset($_POST['facebook']) ) {
            update_post_meta( $team_id, 'facebook', $_POST['facebook'] );
        }
		if ( isset($_POST['facebooklink']) ) {
            update_post_meta( $team_id, 'facebooklink', $_POST['facebooklink'] );
        }
        if ( isset($_POST['twitter']) ) {
            update_post_meta( $team_id, 'twitter', $_POST['twitter'] );
        }
		if ( isset($_POST['twitterlink']) ) {
            update_post_meta( $team_id, 'twitterlink', $_POST['twitterlink'] );
        }
        if ( isset($_POST['linkedin']) ) {
            update_post_meta( $team_id, 'linkedin', $_POST['linkedin'] );
        }
		if ( isset($_POST['linkedinlink']) ) {
            update_post_meta( $team_id, 'linkedinlink', $_POST['linkedinlink'] );
        }
        if ( isset($_POST['dribbble']) ) {
            update_post_meta( $team_id, 'dribbble', $_POST['dribbble'] );
        }
		if ( isset($_POST['dribbblelink']) ) {
            update_post_meta( $team_id, 'dribbblelink', $_POST['dribbblelink'] );
        }
		if ( isset($_POST['google']) ) {
            update_post_meta( $team_id, 'google', $_POST['google'] );
        }
		if ( isset($_POST['googlelink']) ) {
            update_post_meta( $team_id, 'googlelink', $_POST['googlelink'] );
        }
    }
}

function ourteamposts_func( $atts ) {
   extract( shortcode_atts( array(
		'col' => '',
	), $atts ) );
	  extract( shortcode_atts( array( 'show' => '',), $atts ) ); $postoutput = ''; wp_reset_query();
	$bposts = '<div class="section-teammember">';
	$args = array( 'post_type' => 'team', 'posts_per_page' => $show, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
	query_posts( $args );
	$n = 0;
	if ( have_posts() ) {
		while ( have_posts() ) { 
			the_post();
			$n++; if( $n%3 == 0 ) $nomargn = ' last'; else $nomargn = '';			
			$facebook = get_post_meta( get_the_ID(), 'facebook', true );
			$facebooklink = get_post_meta( get_the_ID(), 'facebooklink', true );
			$twitter = get_post_meta( get_the_ID(), 'twitter', true );
			$twitterlink = get_post_meta( get_the_ID(), 'twitterlink', true );
			$linkedin = get_post_meta( get_the_ID(), 'linkedin', true );
			$linkedinlink = get_post_meta( get_the_ID(), 'linkedinlink', true );
			$dribbble = get_post_meta( get_the_ID(), 'dribbble', true );
			$dribbblelink = get_post_meta( get_the_ID(), 'dribbblelink', true );
			$googlelink = get_post_meta( get_the_ID(), 'googlelink', true );
			$bposts .= '<div class="teammember-list'.$nomargn.'">';
			$bposts .= '<h4>'.get_the_title().'</h4>';
			$bposts .= '<div class="teammember-padding">';
			$bposts .= '<div class="team-thumb-icons">
			
			<a href="'.get_permalink().'" title="'.get_the_title().'">
			'.( (get_the_post_thumbnail( get_the_ID(), array(340,280)) != '') ? get_the_post_thumbnail() : '<img src="'.get_template_directory_uri().'/images/img_404.png" />' ).'</a>
				';
			$bposts .= '<div class="member-social-icon">';
			if( $facebook != '' ){
				$bposts .= '<a href="'.$facebooklink.'" title="'.$facebook.'" target="_blank"><i class="fa fa-'.$facebook.' fa-lg"></i></a>';
			}
			if( $twitter != '' ){
				$bposts .= '<a href="'.$twitterlink.'" title="'.$twitter.'" target="_blank"><i class="fa fa-'.$twitter.' fa-lg"></i></a>';
			}
			if( $linkedin != '' ){
				$bposts .= '<a href="'.$linkedinlink.'" title="'.$linkedin.'" target="_blank"><i class="fa fa-'.$linkedin.' fa-lg"></i></a>';
			}
			if( $dribbble != '' ){
				$bposts .= '<a href="'.$dribbblelink.'" title="'.$dribbble.'" target="_blank"><i class="fa fa-'.$dribbble.' fa-lg"></i></a>';
			}
				$bposts .= '</div>';
				$bposts .= '</div>';	
				$bposts .= '<div class="teammember-content">							
				 			'.content( of_get_option('teamexcerptlength') ).'';							    
				$bposts .= '</div></div></div>';
		}
	}else{
		$bposts .= 'There are not found team member';
	}
	wp_reset_query();
	$bposts .= '<div class="clear"></div></div>';
    return $bposts;
}
add_shortcode( 'ourteam', 'ourteamposts_func' );


// shortcode for custom width
function skt_cutsnstyle_custom_width_func($atts, $content = null){
		extract(shortcode_atts(array(
			'width'		=> 'width',						
			'class'		=> null
		), $atts));
		return '<div class="'.$class.'" style="width:'.$width.';">'.do_shortcode($content).'</div>';		
}

add_shortcode('area','skt_cutsnstyle_custom_width_func');


// Social Icon Shortcodes

function skt_cutsnstyle_social_area($atts,$content = null){
  return '<div class="social-icons">'.do_shortcode($content).'</div>';
 }
add_shortcode('social_area','skt_cutsnstyle_social_area');

function skt_cutsnstyle_social($atts){
 extract(shortcode_atts(array(
  'icon' => '',
  'link' => ''
 ),$atts));
  return '<a href="'.$link.'" target="_blank" class="fa fa-'.$icon.' fa-2x" title="'.$icon.'"></a>';
 }
add_shortcode('social','skt_cutsnstyle_social');


function contactform_func( $atts ) {
    $atts = shortcode_atts( array(
        'to_email' => get_bloginfo('admin_email'),
		'title' => 'Contact enquiry - '.home_url( '/' ),
    ), $atts );

	$cform = "<div class=\"main-form-area\" id=\"contactform_main\">";

	$cerr = array();
	if( isset($_POST['c_submit']) && $_POST['c_submit']=='Submit' ){
		$name 			= trim( $_POST['c_name'] );
		$email 			= trim( $_POST['c_email'] );
		$phone 			= trim( $_POST['c_phone'] );
		$website		= trim( $_POST['c_website'] );
		$comments 		= trim( $_POST['c_comments'] );
		$captcha 		= trim( $_POST['c_captcha'] );
		$captcha_cnf	= trim( $_POST['c_captcha_confirm'] );

		if( !$name )
			$cerr['name'] = 'Please enter your name.';
		if( ! filter_var($email, FILTER_VALIDATE_EMAIL) ) 
			$cerr['email'] = 'Please enter a valid email.';
		if( !$phone )
			$cerr['phone'] = 'Please enter your phone number.';
		if( !$comments )
			$cerr['comments'] = 'Please enter your message.';
		if( !$captcha || (md5($captcha) != $captcha_cnf) )
			$cerr['captcha'] = 'Please enter the correct answer.';

		if( count($cerr) == 0 ){
			$subject = $atts['title'];
			$headers = "From: ".$name." <" . strip_tags($email) . ">\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

			$message = '<html><body>
							<table>
								<tr><td>Name: </td><td>'.$name.'</td></tr>
								<tr><td>Email: </td><td>'.$email.'</td></tr>
								<tr><td>Phone: </td><td>'.$phone.'</td></tr>
								<tr><td>Website: </td><td>'.$website.'</td></tr>
								<tr><td>Message: </td><td>'.$comments.'</td></tr>
							</table>
						</body>
					</html>';
			mail( $atts['to_email'], $subject, $message, $headers);
			$cform .= '<div class="success_msg">Thank you! A representative will get back to you very shortly.</div>';
			unset( $name, $email, $phone, $website, $comments, $captcha );
		}else{
			$cform .= '<div class="error_msg">';
			$cform .= implode('<br />',$cerr);
			$cform .= '</div>';
		}
	}

	$capNum1 	= rand(1,4);
	$capNum2 	= rand(1,5);
	$capSum		= $capNum1 + $capNum2;
	$sumStr		= $capNum1." + ".$capNum2 ." = ";

	$cform .= "<form name=\"contactform\" action=\"#contactform_main\" method=\"post\">
			<p><input type=\"text\" name=\"c_name\" value=\"". ( ( empty($name) == false ) ? $name : "" ) ."\" placeholder=\"Name\" /></p>
			<p><input type=\"email\" name=\"c_email\" value=\"". ( ( empty($email) == false ) ? $email : "" ) ."\" placeholder=\"Email\" /></p><div class=\"clear\"></div>
			<p><input type=\"tel\" name=\"c_phone\" value=\"". ( ( empty($phone) == false ) ? $phone : "" ) ."\" placeholder=\"Phone\" /></p>
			<p><input type=\"url\" name=\"c_website\" value=\"". ( ( empty($website) == false ) ? $website : "" ) ."\" placeholder=\"Website with prefix http://\" /></p><div class=\"clear\"></div>
			<p><textarea name=\"c_comments\" placeholder=\"Message\">". ( ( empty($comments) == false ) ? $comments : "" ) ."</textarea></p><div class=\"clear\"></div>";
	$cform .= "<p><span class=\"capcode\">$sumStr</span><input style=\"width:200px;\" type=\"text\" placeholder=\"Captcha\" value=\"". ( ( empty($captcha) == false ) ? $captcha : "" ) ."\" name=\"c_captcha\" /><input type=\"hidden\" name=\"c_captcha_confirm\" value=\"". md5($capSum)."\"></p><div class=\"clear\"></div>";
	$cform .= "<p class=\"sub\"><input type=\"submit\" name=\"c_submit\" value=\"Submit\" class=\"search-submit\" /></p>
		</form>
	</div>";

    return $cform;
}
add_shortcode( 'contactform', 'contactform_func' );

//custom post type for Our photogallery
function my_custom_post_photogallery() {
	$labels = array(
		'name'               => __( 'Photo Gallery','skt-cutsnstyle' ),
		'singular_name'      => __( 'Photo Gallery','skt-cutsnstyle' ),
		'add_new'            => __( 'Add New','skt-cutsnstyle' ),
		'add_new_item'       => __( 'Add New Image','skt-cutsnstyle' ),
		'edit_item'          => __( 'Edit Image','skt-cutsnstyle' ),
		'new_item'           => __( 'New Image','skt-cutsnstyle' ),
		'all_items'          => __( 'All Images','skt-cutsnstyle' ),
		'view_item'          => __( 'View Image','skt-cutsnstyle' ),
		'search_items'       => __( 'Search Images','skt-cutsnstyle' ),
		'not_found'          => __( 'No images found','skt-cutsnstyle' ),
		'not_found_in_trash' => __( 'No images found in the Trash','skt-cutsnstyle' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Photo Gallery'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Photo Gallery',
		'public'        => true,
		'menu_icon'		=> 'dashicons-format-image',
		'menu_position' => null,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'photogallery', $args );
}
add_action( 'init', 'my_custom_post_photogallery' );


//  register gallery taxonomy
register_taxonomy( "gallerycategory", 
	array("photogallery"), 
	array(
		"hierarchical" => true, 
		"label" => "Gallery Category", 
		"singular_label" => "Photo Gallery", 
		"rewrite" => true
	)
);

add_action("manage_posts_custom_column",  "photogallery_custom_columns");
add_filter("manage_edit-photogallery_columns", "photogallery_edit_columns");
function photogallery_edit_columns($columns){
	$columns = array(
		"cb" => '<input type="checkbox" />',
		"title" => "Gallery Title",
		"pcategory" => "Gallery Category",
		"view" => "Image",
		"date" => "Date",
	);
	return $columns;
}
function photogallery_custom_columns($column){
	global $post;
	switch ($column) {
		case "pcategory":
			echo get_the_term_list($post->ID, 'gallerycategory', '', ', ','');
		break;
		case "view":
			the_post_thumbnail('thumbnail');
		break;
		case "date":

		break;
	}
}


//[photogallery filter="false"]
function photogallery_shortcode_func( $atts ) {
	extract( shortcode_atts( array(
		'show' => -1,
		'filter' => 'true'
	), $atts ) );
	$pfStr = '';

	$pfStr .= '<div class="photobooth">';
	if( $filter == 'true' ){
		$pfStr .= '<div class="filter-gallery"><ul class="clean" id="filter"><li class="current"><a href="javascript:void(0)">All</a></li>';
		$categories = get_categories( array('taxonomy' => 'gallerycategory') );
		foreach ($categories as $category) {
			$pfStr .= '<li><a href="javascript:void(0)">'.$category->name.'</a></li>';
		}
		$pfStr .= '</ul></div>';
	}

	$pfStr .= '<div class="gallery"><ul class="clean" id="portfolio">';
	$j=0;
	query_posts('post_type=photogallery&posts_per_page='.$show); 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$j++;
 
		$imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		$terms = wp_get_post_terms( get_the_ID(), 'gallerycategory', array("fields" => "all"));
		$slugAr = array();
		foreach( $terms as $tv ){
			$slugAr[] = $tv->slug;
		}
		if ( $imgSrc[0]!='' ) {
			$imgUrl = $imgSrc[0];
		}else{
			$imgUrl = get_template_directory_uri().'/images/img_404.png';
		}
		$pfStr .= '<li class="'.implode(' ', $slugAr).'">
                <strong>'.get_the_title().'</strong>                
 <a href="'.( $imgSrc[0] ).'" rel="prettyPhoto[pp_gal]"><img src="'.$imgSrc[0].'"/></a>
            </li>';
		unset( $slugAr );
		$pfStr .= ''.(($j%4==0) ? '<div class="clear"></div>' : '');
	endwhile; else: 
		$pfStr .= '<p>Sorry, photo gallery is empty.</p>';
	endif; 
	wp_reset_query();
	$pfStr .= '</ul></div>';
	$pfStr .= '<div class="clear"></div></div>';
	return $pfStr;
}
add_shortcode( 'photogallery', 'photogallery_shortcode_func' );

/*toggle function*/
function toggle_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Click here to toggle content',
	), $atts ) );
	$tog_content = "<div class=\"toggle_holder\"><h3 class=\"slide_toggle\"><a href=\"#\">{$title}</a></h3>
					<div class=\"slide_toggle_content\">".get_the_content_format( $content )."</div></div>";

	return $tog_content;
}
add_shortcode( 'toggle_content', 'toggle_func' );

function tabs_func( $atts, $content = null ) {
	$tabs = '<div class="tabs-wrapper"><ul class="tabs">'.do_shortcode($content).'</ul></div>';
	return $tabs;
}
add_shortcode( 'tabs', 'tabs_func' );

function tab_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Tab Title',
	), $atts ) );
	$rand = rand(100,999);
	$tab = '<li><a rel="tab'.$rand.'" href="javascript:void(0)"><span>'.$title.'</span></a><div id="tab'.$rand.'" class="tab-content">'.get_the_content_format($content).'</div></li>';
	return $tab;
}
add_shortcode( 'tab', 'tab_func' );

function gradient_button_func( $atts ) {
	extract( shortcode_atts( array(
		'size' => 'small',
		'bg_color' => '#636b74',
		'color' => '#fff',
		'text' => 'More',
		'title' => 'Click',
		'url' => '',
		'position' => 'center',
	), $atts ) );
	$btn  = "<div class=\"clear\"></div>";
	$btn .= "<a href=\"{$url}\" "; 
	$btn .= ($title != "") ? " title=\"{$title}\" " : "";
	$btn .= "class=\"grad-btn-{$size} btn-align-{$position}\" style=\"background-color:{$bg_color}; color:{$color}\">";
	$btn .= "{$text}</a>";
	$btn  .= "<div class=\"clear\"></div>";

	return $btn;
}
add_shortcode( 'gradient_button', 'gradient_button_func' );

function simple_button_func( $atts ) {
	extract( shortcode_atts( array(
		'size' => 'small',
		'bg_color' => '#636b74',
		'color' => '#fff',
		'text' => 'More',
		'title' => 'Click',
		'url' => '',
		'position' => 'left',
	), $atts ) );
	$btn  = "<div class=\"clear\"></div>";
	$btn .= "<a href=\"{$url}\" ";  
	$btn .= ($title != "") ? " title=\"{$title}\" " : "";
	$btn .= "class=\"simple-btn-{$size} btn-align-{$position}\" style=\"background-color:{$bg_color}; color:{$color}\">";
	$btn .= "{$text}</a>";
	$btn  .= "<div class=\"clear\"></div>";

	return $btn;
}
add_shortcode( 'simple_button', 'simple_button_func' );

function round_button_func( $atts ) {
	extract( shortcode_atts( array(
		'style' => 'dark',
		'text' => 'More',
		'title' => 'Click',
		'url' => '',
		'position' => 'left',
	), $atts ) );
	$btn  = "<div class=\"clear\"></div>";
	$btn .= "<a href=\"{$url}\" ";
	$btn .= ($title != "") ? " title=\"{$title}\" " : ""; 
	$btn .= "class=\"round-btn-{$style} round-btn btn-align-{$position}\">";
	$btn .= "<span>{$text}</span></a>";
	$btn  .= "<div class=\"clear\"></div>";

	return $btn;
}
add_shortcode( 'round_button', 'round_button_func' );

function msg_box_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' => 'info',
		'bg_color' => '#f6f6f6',
		'color' => '#333',
		'start_color' => "#fff",
		'end_color' => "#eee",
		'border' => "#ccc",
		'align' => '',
		'width' => '100%',
	), $atts ) );
	$msg = '';

	if($type == 'success'){
		$msg  = '<div class="msg-success"><div class="msg-box-icon">';
		$msg .= ($content == '') ? "This is a sample of the 'success' style message box shortcode. To use this style use the following shortcode" : $content;
		$msg .= '</div></div>';
	}elseif($type == 'error'){
		$msg  = '<div class="msg-error"><div class="msg-box-icon">';
		$msg .= ($content == '') ? "This is a sample of the 'error' style message box shortcode. To use this style use the following shortcode." : $content;
		$msg .= '</div></div>';
	}elseif($type == 'warning'){
		$msg  = '<div class="msg-warning"><div class="msg-box-icon">';
		$msg .= ($content == '') ? "This is a sample of the 'warning' style message box shortcode. To use this style use the following shortcode." : $content;
		$msg .= '</div></div>';
	}elseif($type == 'info'){
		$msg  = '<div class="msg-info"><div class="msg-box-icon">';
		$msg .= ($content == '') ? "This is a sample of the 'info' style message box shortcode. To use this style use the following shortcode." : $content;
		$msg .= '</div></div>';
	}elseif($type == 'about'){
		$msg  = '<div class="msg-about"><div class="msg-box-icon">';
		$msg .= ($content == '') ? "This is a sample of the 'about' style message box shortcode. To use this style use the following shortcode." : $content;
		$msg .= '</div></div>';
	}elseif($type == 'custom'){
		$msg  = "<div style=\"width:{$width};\" class=\"msg-align-{$align}\"><div class=\"msg-custom\" style=\"background-color:{$end_color}; background: -moz-linear-gradient(center top , {$start_color}, {$end_color}); background: -webkit-gradient(linear, 0% 0%, 0% 100%, from({$start_color}), to({$end_color})); background: -webkit-linear-gradient(top, {$start_color}, {$end_color}); background: -ms-linear-gradient(top, {$start_color}, {$end_color}); background: -o-linear-gradient(top, {$start_color}, {$end_color}); border:1px {$border} solid; color:{$color};\">";
		$msg .= ($content == '') ? "This is a sample of the 'simple' style message box shortcode." : $content;
		$msg .= '</div></div><div class="clear"></div>';
	}elseif($type == 'simple'){
		$msg  = "<div class=\"msg-simple\" style=\"background-color:{$bg_color}; color:{$color};\">";
		$msg .= ($content == '') ? "This is a sample of the 'simple' style message box shortcode." : $content;
		$msg .= '</div>';
	}
	return $msg;
}
add_shortcode( 'message', 'msg_box_func' );


function unorderedlist_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'style' => 'list-1',
	), $atts ) );
	$content = wpautop(trim($content));
	$ulist = '<ul class="'.$style.'">'.$content.'</ul>';
	return $ulist;
}
add_shortcode( 'unordered_list', 'unorderedlist_func' );


function heading_title_func( $atts, $content = null ) {
   extract( shortcode_atts( array(	
	'underline'	=> '',
	'align'		=> ''	
	), $atts ) ); 
	$hdntitle = '<h2 class="heading '.( (strtolower($underline) == 'yes') ? 'underline' : '' ).'" '.( ($align!='') ? 'style="text-align:'.$align.' !important;"' : '' ) .'>'.do_shortcode( $content ) .'</h2>'; 
    return $hdntitle;
}
add_shortcode( 'heading', 'heading_title_func' );

/*clients function*/
function skt_client_logos($atts, $content = null){
	return '<div class="owl-carousel">'.do_shortcode($content).'</div>';
	}
add_shortcode('client_lists','skt_client_logos');

function skt_client($atts){
	extract(shortcode_atts(array(
	'image'	=> '',
	'link'	=> '#',
	'clear'	=> ''
	), $atts));
	return '<div class="item '.$clear.'"><a href="'.$link.'" target="_blank"><img src="'.$image.'" /></a></div>';
	}
add_shortcode('client','skt_client');

define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/skt-cutnstyle-doc/');

// add shortcode for Time Table main area
function skt_cutsnstyle_time_table_area($atts, $timetable_content = null){
	return '<div class="time-table">'.do_shortcode($timetable_content).'</div>';
}
add_shortcode('time_table_main','skt_cutsnstyle_time_table_area');

// add shortcode for day and timing 
function skt_cutsnstyle_stat($skt_var){
		extract( shortcode_atts(array(
			'day' => 'day',
			'hours' => 'hours',
			'highlight' => '',
		), $skt_var));
		return '<div class="timingbox">
				<div class="openingday"><div>'.$day.'</div></div>
				<div class="openingtime"><div class="'.$highlight.'">'.$hours.'</div></div>
				<div class="clear"></div>
				</div>';
}
add_shortcode('timing','skt_cutsnstyle_stat');

function skt_cutsnstyle_pricing_area($atts,$content = null){
	 extract( shortcode_atts( array(
		'bgcolor' => '',
		'textcolor' => '',
	), $atts ) );
  return '<div class="pricing-table-content"  '.( ($bgcolor!='' || $textcolor!='') ? 'style="background-color:'.$bgcolor.'; color:'.$textcolor.';"' : '' ) .' >'.do_shortcode($content).'</div>';
 }
add_shortcode('pricing_table','skt_cutsnstyle_pricing_area');

// add shortcode for Pricing Table
function skt_cutsnstyle_price($skt_var){
		extract( shortcode_atts(array(
			'bdcolor' => '',
			'hairservice' => 'hairservice',
			'hairprice' => 'hairprice',
			
		), $skt_var));
		return '<div class="pricing-table" '.( ($bdcolor!='') ? 'style="border-bottom:dashed 1px '.$bdcolor.' !important;"' : '' ) .'>
					<span class="hairservice">'.$hairservice.'</span>
					<span class="hairprice">'.$hairprice.'</span>
					<div class="clear"></div>
				</div>';
		}
add_shortcode('price_row','skt_cutsnstyle_price');


function latestpostsoutput_func( $atts ){
   extract( shortcode_atts( array(
		'show' => '',
	), $atts ) );
	$postoutput = '';
	wp_reset_query();
	$n = 0;
	query_posts(  array( 'posts_per_page'=>$show, 'post__not_in' => get_option('sticky_posts') )  );
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$n++;
			if( $n%2==0 )  $nomgn = 'last';	else $nomgn = ' ';
			if ( has_post_thumbnail()) {
				$large_imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				$imgUrl = $large_imgSrc[0];
			}else{
				$imgUrl = get_template_directory_uri().'/images/img_404.png';
			}
			$postoutput .= '<div class="news-box '.$nomgn.'">
								<div class="news-thumb">
									<a href="'.get_the_permalink().'"><img src="'.$imgUrl.'" alt=" " /></a>
								</div>
								<div class="news">
									<div class="date-news">
										<span class="newsdate">'.get_the_time('d').'</span>
										<span>'.get_the_time('M').'</span>
									</div>
									<a href="'.get_permalink().'"><h3>'.get_the_title().'</h3></a>
									 <p>'.wp_trim_words( get_the_content(), of_get_option('newsboxlength'), '...' ).'</p>								
								</div>
                        </div>';	
						$postoutput .= ''.(($n%2==0) ? '<div class="clear"></div>' : '');	
		endwhile;
	endif;
	wp_reset_query();
	return $postoutput;
}
add_shortcode( 'latestposts', 'latestpostsoutput_func' );


// add shortcode for statistics main area
function skt_cutsnstyle_stat_main($atts, $stat_main_content = null){

	return '<div id="some-facts">'.do_shortcode($stat_main_content).'</div>';
}
add_shortcode('stat_main','skt_cutsnstyle_stat_main');

// add shortcode for statistics
function skt_cutsnstyle_daytime($skt_stat_var, $stat_content = null){
	extract( shortcode_atts(array(
		'bgcolor'		=> '',
		'textcolor'		=> '',
		'everyday'		=> 'everyday',

	), $skt_stat_var));
	
	return '<div class="everydaytime">
				<div class="everydays" '.( ($bgcolor!='' || $textcolor!='') ? 'style="background-color:'.$bgcolor.'; color:'.$textcolor.';"' : '' ) .' >'.$everyday.'</div>
				<div class="everytime">'.$stat_content.'</div>
			</div>';
}
add_shortcode('stat','skt_cutsnstyle_daytime');