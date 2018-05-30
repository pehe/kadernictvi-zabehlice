<?php
/**
 * SKT Cutsnstyle functions and definitions
 *
 * @package SKT Cutsnstyle
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
function content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}


if ( ! function_exists( 'skt_cutsnstyle_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_cutsnstyle_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'skt-cutsnstyle', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_image_size('homepage-thumb',240,145,true);	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'skt-cutsnstyle' ),
		'footer' => __( 'Footer Menu', 'skt-cutsnstyle' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // skt_cutsnstyle_setup
add_action( 'after_setup_theme', 'skt_cutsnstyle_setup' );

function skt_cutsnstyle_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'skt-cutsnstyle' ),
		'description'   => __( 'Appears on blog page sidebar', 'skt-cutsnstyle' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Main', 'skt-cutsnstyle' ),
		'description'   => __( 'Appears on page sidebar', 'skt-cutsnstyle' ),
		'id'            => 'sidebar-main',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'skt-cutsnstyle' ),
		'description'   => __( 'Appears on footer', 'skt-cutsnstyle' ),
		'id'            => 'footer-1',
		'before_widget' => '<div id="%1$s" class="cols-3 widget-column-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'skt-cutsnstyle' ),
		'description'   => __( 'Appears on footer', 'skt-cutsnstyle' ),
		'id'            => 'footer-2',
		'before_widget' => '<div id="%1$s" class="cols-3 widget-column-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'skt-cutsnstyle' ),
		'description'   => __( 'Appears on footer', 'skt-cutsnstyle' ),
		'id'            => 'footer-3',
		'before_widget' => '<div id="%1$s" class="cols-3 widget-column-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	
	register_sidebar( array(
		'name'          => __( 'Sidebar Contact Page', 'skt-cutsnstyle' ),
		'description'   => __( 'Appears on contact page', 'skt-cutsnstyle' ),
		'id'            => 'sidebar-contact',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Widget', 'skt-cutsnstyle' ),
		'description'   => __( 'Appears on header', 'skt-cutsnstyle' ),
		'id'            => 'header-widget',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h6 style="display:none">',
		'after_title'   => '</h6>',
	) );
		

}
add_action( 'widgets_init', 'skt_cutsnstyle_widgets_init' );

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once get_template_directory() . '/inc/options-framework.php';

function skt_cutsnstyle_scripts() {
	
	wp_enqueue_style( 'skt_cutsnstyle-gfonts-roboto', '//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' );	

	if( of_get_option('bodyfontface',true) != '' ){
		wp_enqueue_style( 'skt_cutsnstyle-gfonts-body', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('bodyfontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if( of_get_option('logofontface',true) != '' ){
		wp_enqueue_style( 'skt_cutsnstyle-gfonts-logo', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('logofontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('navfontface', true) != '' ) {
		wp_enqueue_style( 'skt_cutsnstyle-gfonts-nav', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('navfontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('headfontface', true) != '' ) {
		wp_enqueue_style( 'skt_cutsnstyle-gfonts-heading', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('headfontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
 	if ( of_get_option('teamservfontface', true) != '' ) {
		wp_enqueue_style( 'skt_cutsnstyle-gfonts-teamserv', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('teamservfontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}

	wp_enqueue_style( 'skt_cutsnstyle-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'skt_cutsnstyle-editor-style', get_template_directory_uri().'/editor-style.css' );
	wp_enqueue_style( 'skt_cutsnstyle-base-style', get_template_directory_uri().'/css/style_base.css' );	
	if ( is_home() || is_front_page() ) { 
	wp_enqueue_style( 'skt_cutsnstyle-nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'skt_cutsnstyle-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	}	
	wp_enqueue_style( 'skt_cutsnstyle-prettyphoto-style', get_template_directory_uri().'/css/prettyPhoto.css' );
	wp_enqueue_script( 'skt_cutsnstyle-prettyphoto-script', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery') );
	wp_enqueue_script( 'skt_cutsnstyle-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'skt_cutsnstyle-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array('jquery') );
	wp_enqueue_script( 'skt_cutsnstyle-filter-scripts', get_template_directory_uri().'/js/filter-gallery.js' );
	wp_enqueue_style( 'skt_cutsnstyle-font-awesome-style', get_template_directory_uri().'/css/font-awesome.min.css' );			
	wp_enqueue_style( 'skt_cutsnstyle-animation-style', get_template_directory_uri().'/css/animation.css' );
	wp_enqueue_style( 'skt_cutsnstyle-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' );	
	wp_enqueue_script( 'skt_cutsnstyle-scalefunction', get_template_directory_uri().'/grayscale-effects/js/functions.js', array('jquery') );
	wp_enqueue_script( 'skt_cutsnstyle-scalejs', get_template_directory_uri().'/grayscale-effects/js/grayscale.js', array('jquery') );
	wp_enqueue_style( 'skt_cutsnstyle-scalecss', get_template_directory_uri().'/grayscale-effects/css/grayscale.css' );
	
	wp_enqueue_script( 'skt_cutsnstyle-owljs', get_template_directory_uri().'/testimonialsrotator/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'skt_cutsnstyle-testimonialsminjs', get_template_directory_uri().'/testimonialsrotator/js/jquery.quovolver.min.js', array('jquery') );

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_cutsnstyle_scripts' );
function media_css_hook(){
	?>
    	<script>			
		jQuery(window).load(function() {
        jQuery('#slider').nivoSlider({
        	effect:'<?php echo of_get_option('slideefect',true); ?>', //sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft, fold, fade, random, slideInRight, slideInLeft, boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse
		  	animSpeed: <?php echo of_get_option('slideanim',true); ?>,
			pauseTime: <?php echo of_get_option('slidepause',true); ?>,
			directionNav: <?php echo of_get_option('slidenav',true); ?>,
			controlNav: <?php echo of_get_option('slidepage',true); ?>,
			pauseOnHover: <?php echo of_get_option('slidepausehover',true); ?>,
    });
});
jQuery(document).ready(function() {
  jQuery('.link').on('click', function(event){
    var $this = jQuery(this);
    if($this.hasClass('clicked')){
      $this.removeAttr('style').removeClass('clicked');
    } else{
      $this.css('background','#7fc242').addClass('clicked');
    }
  });
});
		</script>
<?php 
}
add_action('wp_head','media_css_hook'); 

function skt_cutsnstyle_custom_head_codes() {  
	if ( function_exists('of_get_option') ){
		if ( of_get_option('style2', true) != '' ) {
			echo "<style>". esc_html( of_get_option('style2', true) ) ."</style>";
		}
		echo "<style>";
		if ( of_get_option('bodyfontface', true) != '') {
			echo 'body, .price-table, .header span.tagline{font-family:\''. esc_html( of_get_option('bodyfontface', true) ) .'\', sans-serif;}';
		}
		if ( of_get_option('bodyfontcolor', true) != '' ) {
			echo 'body, .contact-form-section .address,  .accordion-box .acc-content{color:'. esc_html( of_get_option('bodyfontcolor', true) ) .';}';
		}
		if( of_get_option('bodyfontsize',true) != ''){
			echo "body{font-size:".of_get_option('bodyfontsize',true)."}";
		}
		if( of_get_option('logofontface',true) != '' || of_get_option('logofontcolor',true) != '' || of_get_option('logofontsize',true) != ''){
			echo ".header .header-inner .logo h1, .header .header-inner .logo a {font-family:".of_get_option('logofontface').";color:".of_get_option('logofontcolor',true)."; font-size:".of_get_option('logofontsize',true)."}";
		}
		if( of_get_option('logotagfontcolor',true) != '' || of_get_option('logotagfontsize',true) != '' ){
			echo ".header span.tagline{color:".of_get_option('logotagfontcolor',true)."; font-size:".of_get_option('logotagfontsize',true)."}";
		}		
		
		
		if ( of_get_option('navbgcolor', true) != '') {
			echo ".header .header-inner .nav, .header .header-inner .nav ul li:hover > ul{background-color:".of_get_option('navbgcolor', true).";}";
		}
	if ( of_get_option('navlibdcolor', true) != '') {
			echo ".header .header-inner .nav ul li, .header .header-inner .nav ul li ul li{border-color:".of_get_option('navlibdcolor', true).";}";
		}
		
		if ( of_get_option('navfontface', true) != '' || of_get_option('navfontsize',true) != '' ) {
			echo '.header .header-inner .nav ul{font-family:\''. esc_html( of_get_option('navfontface', true) ) .'\', sans-serif;font-size:'.of_get_option('navfontsize',true).'}';
		}
		if ( of_get_option('navfontcolor', true) != '' ) {
			echo '.header .header-inner .nav ul li a, .header .header-inner .nav ul li.current_page_item ul li a{color:'. esc_html( of_get_option('navfontcolor', true) ) .';}';
		}
		
		if ( of_get_option('navhovercolor', true) != '') {
			echo '.header .header-inner .nav ul li a:hover, .header .header-inner .nav ul li.current_page_item a, .header .header-inner .nav ul li.current_page_item ul li a:hover, .header .header-inner .nav ul li.current-menu-ancestor a.parent{ color:'. esc_html( of_get_option('navhovercolor', true) ) .';}';
		}	
		
		$opningtimehex = of_get_option('opningtimebgcolor',true); 
		list($r,$g,$b) = sscanf($opningtimehex,'#%02x%02x%02x');
		if ( of_get_option('opningtimebgcolor', true) != '' ) {
			echo ".time-table{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('opningtimebgopacity',true).");}";
		}
		if( of_get_option('separatorbdcolor',true) != ''){
			echo ".time-table h2, .timingbox{border-color:".of_get_option('separatorbdcolor',true)."; }";
		}
		if ( of_get_option('opningtimefontcolor', true) != '' ) {
			echo '.time-table, .time-table h2{color:'. esc_html( of_get_option('opningtimefontcolor', true) ) .';}';
		}
		if( of_get_option('sectitlesize',true) != '' ){
			echo "h2.section_title{font-size:".of_get_option('sectitlesize',true)."}";
		}	
		if( of_get_option('allbdcolor',true) != '' ){
			echo ".time-table, h2.section_title, .three_column, .three_column h2, .teammember-list h4, .teammember-padding, .member-desination, .date-news, .date-news span.newsdate, .client-say, h1.entry-title, h1.page-title{border-color: ".of_get_option('allbdcolor',true)."}";
		}
		if( of_get_option('grayallbdcolor',true) != '' ){
			echo ".wrap_one h1, .news h3{border-color: ".of_get_option('grayallbdcolor',true)."}";
		}
		if( of_get_option('welcomecolor', true) != '' || of_get_option('welcomefontsize', true) != '' ){
			echo ".wrap_one h1{color:".of_get_option('welcomecolor', true)."; font-size:".of_get_option('welcomefontsize', true)."; }";
		}
		
		
		if ( of_get_option('headfontface', true) != '' || of_get_option('sectitlecolor',true) != '' ) {
echo 'h2.section_title{font-family:\''. esc_html( of_get_option('headfontface', true) ) .'\', sans-serif;color:'.of_get_option('sectitlecolor',true).'}';
		}				
		if ( of_get_option('linkcolor', true) != '' ) {
			echo 'a, .header .header-inner .header_info span.phone-no a, .tabs-wrapper ul.tabs li a, .slide_toggle a{color:'. esc_html( of_get_option('linkcolor', true) ) .';}';
		}
		if ( of_get_option('linkhovercolor', true) != '' ) {
			echo 'a:hover, .header .header-inner .header_info span.phone-no a:hover, .tabs-wrapper ul.tabs li a:hover, .slide_toggle a:hover{color:'. esc_html( of_get_option('linkhovercolor', true) ) .';}';
		}			
		if( of_get_option('foottitlecolor', true) != '' || of_get_option('ftfontsize', true) != '' ){
			echo ".cols-3 h5{color:".of_get_option('foottitlecolor', true)."; font-size:".of_get_option('ftfontsize', true)."; }";
		}		
		if( of_get_option('footdesccolor', true) != ''){
			echo ".cols-3{color:".of_get_option('footdesccolor', true).";}";
		}					
		if( of_get_option('copycolor', true) != ''){
			echo ".copyright-txt{color:".of_get_option('copycolor',true)."}";
		}
		if( of_get_option('designcolor', true) != ''){
			echo ".design-by{color:".of_get_option('designcolor',true)."}";
		}		
		if ( of_get_option('headerbg', true) != '' ) {
			echo ".header{background-color:".of_get_option('headerbg',true).";}";
		}			
		
		if ( of_get_option('socialbgcolor', true) != '' || of_get_option('socialfontcolor',true) != '' || of_get_option('socialstyle',true) != '' ) {
			echo ".social-icons a{background-color:".of_get_option('socialbgcolor',true)."; color:".of_get_option('socialfontcolor',true)."; border-radius:".of_get_option('socialstyle', true)."%;}";
		}	
		if( of_get_option('socialbgcolorhv',true) != '' || of_get_option('socialfonthvcolor',true) != ''){
			echo ".social-icons a:hover{background-color:".of_get_option('socialbgcolorhv',true)."; color:".of_get_option('socialfonthvcolor',true)."; }";
		}			
		if( of_get_option('btnbgcolor',true) != '' || of_get_option('btntxtcolor', true) != ''){
			echo ".wpcf7 form input[type=submit], .header .header-inner .header_info .apointment a, .button, #commentform input#submit, input.search-submit, .post-password-form input[type=submit], p.read-more a, .accordion-box h2:before, .pagination ul li span, .pagination ul li a{background-color:".of_get_option('btnbgcolor',true)."; color:". of_get_option('btntxtcolor', true) ."; }";
		}
		if( of_get_option('btnbghvcolor',true) != '' || of_get_option('btntxthvcolor', true) != '' ){
			echo ".wpcf7 form input[type=submit]:hover, .header .header-inner .header_info .apointment a:hover, .button:hover, #commentform input#submit:hover, input.search-submit:hover, .post-password-form input[type=submit]:hover, p.read-more a:hover, .pagination ul li .current, .pagination ul li a:hover{background-color:".of_get_option('btnbghvcolor',true)."; color:". esc_html( of_get_option('btntxthvcolor', true) ) .";}";
		}
		if( of_get_option('searchbgcolor',true) != ''){
			echo ".searchbox-icon, .searchbox-submit, #sidebar .woocommerce-product-search input[type=submit] {background-color:".of_get_option('searchbgcolor',true)."; }";
		}
		if( of_get_option('galleryactivebc',true) != ''){
			echo ".photobooth .filter-gallery ul li.current a{border-color:".of_get_option('galleryactivebc',true)."; }";
		}
		if( of_get_option('searchbgcolor',true) != ''){
			echo ".wrap_one .fa{color:".of_get_option('searchbgcolor',true)."; }";
		}
		if( of_get_option('fsh2color',true) != ''){
			echo ".wrap_one h2 {color:".of_get_option('fsh2color',true)."; }";
		}

		if ( of_get_option('widgettitlebgcolor', true) != '' || of_get_option('wdgttitleccolor', true) != '' ) {
			echo "h3.widget-title{background-color:".of_get_option('widgettitlebgcolor', true)."; color:".of_get_option('wdgttitleccolor', true).";}";
		}
		if ( of_get_option('footerbgcolor', true) != '' ) {
			echo "#footer-wrapper{background-color:".of_get_option('footerbgcolor', true)."; }";
		}
		if ( of_get_option('footercolumnbdcolor', true) != '') {
			echo ".widget-column-2, ul.recent-post li, ul.recent-post li img{border-color:".of_get_option('footercolumnbdcolor', true).";}";
		}		
		if ( of_get_option('footermenucolor', true) != '' ) {
			echo ".cols-3 ul li a, .phone-no span, .phone-no a:hover{color:".of_get_option('footermenucolor', true)."; }";
		}
		if ( of_get_option('footermenucurrent', true) != '' ) {
			echo ".cols-3 ul li a:hover, .phone-no a{color:".of_get_option('footermenucurrent', true)."; }";
		}			
		if ( of_get_option('copybgcolor', true) != '' ) {
			echo '.copyright-wrapper{background-color:'. esc_html( of_get_option('copybgcolor', true) ) .';}';
		}
		if( of_get_option('galhvcolor',true) != ''){
			echo ".photobooth .gallery ul li:hover{ background:".of_get_option('galhvcolor',true).";}";
		}
		if( of_get_option('sldpagebg',true) != ''){
			echo ".nivo-controlNav a{background-color:".of_get_option('sldpagebg',true)."}";
		}
		if( of_get_option('sldpagehvbg',true) != ''){
			echo ".nivo-controlNav a.active{background-color:".of_get_option('sldpagehvbg',true)."}";
		}	
		if( of_get_option('sldpagehvbd',true) != ''){
			echo ".nivo-controlNav a{border-color:".of_get_option('sldpagehvbd',true)."}";
		}	
		if( of_get_option('sidebarfontcolor',true) != ''  ){
			echo "#sidebar ul li a{color:".of_get_option('sidebarfontcolor',true).";}";
		}	
		if( of_get_option('sidebarliaborder', true) != '' ){
			echo "#sidebar ul li{border-bottom:1px dashed ".of_get_option('sidebarliaborder',true)."}";
		}		
		if( of_get_option('sidebarfonthvcolor',true) != '' ){
			echo "#sidebar ul li a:hover{color:".of_get_option('sidebarfonthvcolor',true)."; }";
		}	
		if (  of_get_option('slidetitlecolor', true) != '' || of_get_option('slidetitlefontsize', true) != '') {
		echo ".slide_info h2{ color:".of_get_option('slidetitlecolor', true)."; font-size:".of_get_option('slidetitlefontsize', true).";}";
		}
		if ( of_get_option('slidetitlefontface', true) != '') {
			echo '.slide_info h2{font-family:\''. esc_html( of_get_option('slidetitlefontface', true) ) .'\', sans-serif;}';
		}
		if ( of_get_option('slidedesfontface', true) != '') {
			echo '.slide_info p{font-family:\''. esc_html( of_get_option('slidedesfontface', true) ) .'\', sans-serif;}';
		}
		if ( of_get_option('slidedesccolor', true) != '' || of_get_option('slidedescfontsize', true) != '') {
		echo ".slide_info p{ color:".of_get_option('slidedesccolor', true)."; font-size:".of_get_option('slidedescfontsize', true).";}";
		}
		if ( of_get_option('copylinks', true) != '' ) {
		echo ".copyright-wrapper a{ color: ".of_get_option('copylinks', true)."; }";
		}	
		if ( of_get_option('copylinkshover', true) != '' ) {
		echo ".copyright-wrapper a:hover{ color: ".of_get_option('copylinkshover', true)."; }";
		}	
		if ( of_get_option('teamtitlecolor', true) != '' ) {
		echo ".teammember-list h4, .member-desination, .teammember-list p{ color:".of_get_option('teamtitlecolor', true)."; }";
		}	
		if( of_get_option('teamservfontsize',true) != ''){
			echo ".three_column p, .teammember-list p{font-size:".of_get_option('teamservfontsize',true)."}";
		}
 
		if ( of_get_option('teamservfontface', true) != '') {
			echo '.three_column p, .teammember-list h4, .member-desination, .teammember-list p{font-family:\''. esc_html( of_get_option('teamservfontface', true) ) .'\', sans-serif;}';
		}
		if ( of_get_option('section1bgcolor', true) != '' ) {
			echo "#wrapOne{background-color:".of_get_option('section1bgcolor',true).";}";
		}
		
		if ( of_get_option('slideloadingbg', true) != '' ) {
			echo ".slider-main{background-color:".of_get_option('slideloadingbg',true).";}";
		}
		
		if ( of_get_option('section2bgcolor', true) != '' ) {
			echo "#wrapTwo{background-color:".of_get_option('section2bgcolor',true).";}";
		}			
		
		if ( of_get_option('teamthumbrbg', true) != '' ) {
			echo ".team-thumb-icons, .news-box .news-thumb, .news-box:hover .date-news{background-color:".of_get_option('teamthumbrbg',true).";}";
		}
		if ( of_get_option('teamsocialbrbg', true) != '' ) {
		echo ".member-social-icon a{background:".of_get_option('teamsocialbrbg',true).";}";
		}
		if ( of_get_option('teamsicolor', true) != '' ) {
			echo ".member-social-icon a{color:".of_get_option('teamsicolor', true)."; }";
		}
		if ( of_get_option('teamdescriptionbrbg', true) != '' ) {
		echo ".teammember-content{background-color:".of_get_option('teamdescriptionbrbg',true).";}";
		}
		if ( of_get_option('teamsicolorhv', true) != '' ) {
		echo ".member-social-icon a:hover{ color:".of_get_option('teamsicolorhv', true)."; }";
		}
		if ( of_get_option('iframeborder', true) != '') {
		echo "iframe{ border:1px solid ".of_get_option('iframeborder', true)."; }";
		}		
		if ( of_get_option('sidebarbgcolor', true) != '' ) {
		echo "aside.widget{ background-color:".of_get_option('sidebarbgcolor', true)."; }";
		}	
		if ( of_get_option('readmorebutton', true) != '' ) {
		echo ".view-all-btn a{ border:1px solid ".of_get_option('readmorebutton', true)."; border-left:5px solid ".of_get_option('readmorebutton', true)."; }";
		}		
		if ( of_get_option('readmorebuttonhv', true) != '' ) {
		echo ".view-all-btn a:hover{ border-color:".of_get_option('readmorebuttonhv', true)."; }";
		}			
		if ( of_get_option('togglemenu', true) != '' ) {
		echo ".toggle a{ background-color:".of_get_option('togglemenu', true)."; }";
		}
		if ( of_get_option('tmthumbgcolor', true) != '' ) {
		echo ".say_thumb{ background-color:".of_get_option('tmthumbgcolor', true)."; }";
		}
		
		if ( of_get_option('tmndescbgcolor', true) != '' ) {
		echo "#testimonials ul li .tm_description{background-color: ".of_get_option('tmndescbgcolor', true)."; }";
		}
		if ( of_get_option('tmnpagerbg', true) != '' ) {
		echo "ol.nav-numbers li a{background-color: ".of_get_option('tmnpagerbg', true)."; border:2px solid ".of_get_option('tmnpagerbg', true)."; }";
		}
		if ( of_get_option('tmnpagerbghv', true) != '' ) {
		echo "ol.nav-numbers li.active a{background-color: ".of_get_option('tmnpagerbghv', true)."; border:2px solid ".of_get_option('tmnpagerbg', true)."; }";
		}
		if ( of_get_option('tgmenuresponsivebg', true) != '' ) {
		echo "@media screen and (max-width: 1169px){.header .header-inner .nav{background-color: ".of_get_option('tgmenuresponsivebg', true).";}}";
		}
		
		if ( of_get_option('logoheight', true) != '' ) {
		echo ".header .header-inner .logo img{ height:".of_get_option('logoheight', true)."px; }";
		}
		
/* Heading */
		if ( of_get_option('h1fontface', true) != '' ) {
			echo "h1{font-family:".of_get_option('h1fontface', true).";}";
		}	
		if ( of_get_option('h1fontsize', true) != '' ) {
			echo "h1{font-size:".of_get_option('h1fontsize', true).";}";
		}
		if ( of_get_option('sectiontitleboldcolor', true) != '' ) {
			echo "section h2 span{color:".of_get_option('sectiontitleboldcolor', true).";}";
		}

		if ( of_get_option('h1fontcolor', true) != '' ) {
			echo "h1{color:".of_get_option('h1fontcolor', true).";}";
		}
		if ( of_get_option('h2fontface', true) != '' ) {
			echo "h2{font-family:".of_get_option('h2fontface', true).";}";
		}	
		if ( of_get_option('h2fontsize', true) != '' ) {
			echo "h2{font-size:".of_get_option('h2fontsize', true).";}";
		}
		if ( of_get_option('h2fontcolor', true) != '' ) {
			echo "h2{color:".of_get_option('h2fontcolor', true).";}";
		}
		if ( of_get_option('h3fontface', true) != '' ) {
			echo "h3{font-family:".of_get_option('h3fontface', true).";}";
		}	
		if ( of_get_option('h3fontsize', true) != '' ) {
			echo "h3{font-size:".of_get_option('h3fontsize', true).";}";
		}
		if ( of_get_option('h3fontcolor', true) != '' ) {
			echo "h3{color:".of_get_option('h3fontcolor', true).";}";
		}
		if ( of_get_option('h4fontface', true) != '' ) {
			echo "h4{font-family:".of_get_option('h4fontface', true).";}";
		}	
		if ( of_get_option('h4fontsize', true) != '' ) {
			echo "h4{font-size:".of_get_option('h4fontsize', true).";}";
		}
		if ( of_get_option('h4fontcolor', true) != '' ) {
			echo "h4{color:".of_get_option('h4fontcolor', true).";}";
		}
		if ( of_get_option('h5fontface', true) != '' ) {
			echo "h5{font-family:".of_get_option('h5fontface', true).";}";
		}	
		if ( of_get_option('h5fontsize', true) != '' ) {
			echo "h5{font-size:".of_get_option('h5fontsize', true).";}";
		}
		if ( of_get_option('h5fontcolor', true) != '' ) {
			echo "h5{color:".of_get_option('h5fontcolor', true).";}";
		}
		if ( of_get_option('h6fontface', true) != '' ) {
			echo "h6{font-family:".of_get_option('h6fontface', true).";}";
		}	
		if ( of_get_option('h6fontsize', true) != '' ) {
			echo "h6{font-size:".of_get_option('h6fontsize', true).";}";
		}
		if ( of_get_option('h6fontcolor', true) != '' ) {
			echo "h6{color:".of_get_option('h6fontcolor', true).";}";
		}
		
// Woocommerce price Filter
	if ( of_get_option('pricesliderbg', true) != '' ) {
			echo '#sidebar .price_slider_wrapper .ui-widget-content{background-color:'. esc_html( of_get_option('pricesliderbg', true) ) .';}';
	}
	if ( of_get_option('pricehandlebg', true) != '' ) {
			echo '#sidebar .ui-slider .ui-slider-handle{background-color:'. esc_html( of_get_option('pricehandlebg', true) ) .';}';
	}
	if ( of_get_option('pricerangebg', true) != '' ) {
			echo '#sidebar .ui-slider .ui-slider-range{background-color:'. esc_html( of_get_option('pricerangebg', true) ) .';}';
	}

		echo "</style>";
	}
}
add_action('wp_head', 'skt_cutsnstyle_custom_head_codes');


function skt_cutsnstyle_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load custom functions file.
 */
require get_template_directory() . '/inc/custom-functions.php';

function excerpt($num) {
        $limit = $num+1;
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt)."...";
        echo $excerpt;
    }
	
function skt_cutsnstyle_string_limit_words($string, $word_limit){
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}	

function skt_cutsnstyle_custom_blogpost_pagination( $wp_query ){
	$big = 999999999; // need an unlikely integer
	if ( get_query_var('paged') ) { $pageVar = 'paged'; }
	elseif ( get_query_var('page') ) { $pageVar = 'page'; }
	else { $pageVar = 'paged'; }
	$pagin = paginate_links( array(
		'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' 		=> '?'.$pageVar.'=%#%',
		'current' 		=> max( 1, get_query_var($pageVar) ),
		'total' 		=> $wp_query->max_num_pages,
		'prev_text'		=> '&laquo; Prev',
		'next_text' 	=> 'Next &raquo;',
		'type'  => 'array'
	) ); 
	if( is_array($pagin) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $pagin as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	} 
}
// get slug by id
function skt_cutsnstyle_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}