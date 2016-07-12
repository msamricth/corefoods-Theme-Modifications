<?php
require_once('wp-advanced-search/wpas.php');
require_once get_template_directory() . '/framework/createit/ctThemeLoader.php';

$c = new ctThemeLoader();
$c->init('corefoods');

function my_search_form() {
	$args = array();
	$args['wp_query'] = array( 'post_type' => array('page', 'gs_field', 'gs_param'), 
	                           'orderby' => 'title', 
	                           'order' => 'ASC' );
	                           
	// Here is where we specify the page where results will be shown
	$args['form'] = array( 'action' => get_bloginfo('url') . '/search/',
                          'disable_wrappers' => true);
	//
    $args['fields'][] = array('type' => 'html',
                          'value' => '<div class="form-group"><ul><li class="searchlist input-group">');

	$args['fields'][] = array( 'type' => 'search', 
		                   'value' => 'Enter your search..',
	                           'placeholder' => 'Enter search terms',
                              'class' => array('form-control','typeahead', 'search-form'),
                             'disable_wrappers' => true);
    
     $args['fields'][] = array('type' => 'html',
                          'value' => '<span class="input-group-addon" id="searchic"><i class="fa fa-search"></i></span></li></ul><ul class="hide filter-options" id="filter-search"><li>');
    
    $args['fields'][] = array('type' => 'taxonomy',
                              'taxonomy' => 'post_tag',
                              'label' => 'Tags',
                              'format' => 'checkbox',
                              'pre_html' => '<div class="checkbox">',
                              'post_html' => '<div class="clearfix"></div></div>',
                             'disable_wrappers' => true);
    
    $args['fields'][] = array('type' => 'taxonomy',
                              'taxonomy' => 'category',
                              'label' => 'Categories',
                              'format' => 'checkbox',
                              'pre_html' => '<div class="checkbox">',
                              'post_html' => '<div class="clearfix"></div></div>',
                             'disable_wrappers' => true);
    
	$args['fields'][] = array( 'type' => 'orderby', 
	                           'format' => 'select', 
	                           'label' => 'Order by', 
	                           'values' => array('title' => 'Title', 'date' => 'Date Added'),       'pre_html' => '<div class="form-group">',
                              'post_html' => '<div class="clearfix"></div></div>',
                             'class' => array('form-control', 'select'),
                             'disable_wrappers' => true);
    
         $args['fields'][] = array('type' => 'html',
                          'value' => '<div class="form-group">');
    
	$args['fields'][] = array( 'type' => 'order', 
	                           'format' => 'radio', 
	                           'label' => 'Order', 
	                           'values' => array('ASC' => 'ASC', 'DESC' => 'DESC'), 
                              'pre_html' => '<div class="radio">',
                              'post_html' => '</div>',
	                           'default' => 'ASC',
                             'disable_wrappers' => true);
                              
         $args['fields'][] = array('type' => 'html',
                          'value' => '<div class="clearfix"></div></div>');
    
	$args['fields'][] = array( 'type' => 'posts_per_page', 
	                           'format' => 'select', 
	                           'label' => 'Results per page', 
	                           'values' => array(2=>2, 5=>5, 10=>10), 
	                           'default' => 10 ,
                                'pre_html' => '<div class="form-group">',
                                  'post_html' => '<div class="clearfix"></div></div>',
                                 'class' => array('form-control', 'select'),
                             'disable_wrappers' => true);
    
     $args['fields'][] = array('type' => 'html',
                          'value' => '</li></ul><ul class="submitlist"><li class="filter-search"><button class="btn btn-primary searchclick searchclickbtn" type="button" id="search-filter-button">Filter</button></li><li>');
    
	   $args['fields'][] = array( 'type' => 'submit',
	                           'class' => array('button','btn', 'btn-primary','searchclick'),
	                           'value' => 'Search',
                             'disable_wrappers' => true );
    
    $args['fields'][] = array('type' => 'html',
                              'value' => ' </li></ul><div class="clearfix"></div></div>');
    
    register_wpas_form('my-form', $args);    
}
add_action('init', 'my_search_form');

function roots_setup() {


    // Make theme available for translation
    load_theme_textdomain('ct_theme', get_template_directory() . '/lang');

    // Add default posts and comments RSS feed links to <head>.
    add_theme_support('automatic-feed-links');

    // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
    add_theme_support('post-thumbnails');

    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

    add_theme_support('woocommerce');


    //add size for timeline
    add_image_size('timeline_featured_image', 560, 315, true);
    add_image_size('timeline_thumbnail', 24, 24, true);

    //add size for featured image
    add_image_size('featured_image', 870, 350, true);

    //works
    add_image_size('work_single_horizontal', 1170, 500, true);
    add_image_size('work_single', 770, 500, true);
    add_image_size('featured_work', 770, 379, true);

    //add size for effects template
    add_image_size('featured_image_effects', 1200, 800, false);

    //add size for portfolio and blog thumbnails
    add_image_size('featured_image_small', 370, 220, true);
}

add_action('after_setup_theme', 'roots_setup');

require_once 'theme/theme_functions.php';






