
<?php
/**
* @wordpress-plugin
* Plugin Name: best-beauty-post-post-type
* Plugin URI: http://github.com/shortlist-digital/best-beauty-post-post-type
* Description: A beauty post type for Best Beauty
* Version: 1.0.0
* Author: Shortlist Studio
* Author URI: http://shortlist.studio
* License: MIT
*/
class BestBeautyPostPostType
{
	public function __construct()
	{
		add_action('init', array($this, 'custom_post_type'));
		add_action('init', array($this, 'add_product_selector'));
	}
	// Register Custom Post Type
	function custom_post_type() {
		$labels = array(
			'name'                  => _x( 'Beauty Posts', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Beauty Post', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Beauty Posts', 'text_domain' ),
			'name_admin_bar'        => __( 'Beauty Post', 'text_domain' ),
			'archives'              => __( 'Beauty Post Archives', 'text_domain' ),
			'attributes'            => __( 'Beauty Post Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Beauty Post:', 'text_domain' ),
			'all_items'             => __( 'All Beauty Posts', 'text_domain' ),
			'add_new_item'          => __( 'Add New Beauty Post', 'text_domain' ),
			'add_new'               => __( 'Add Beauty Post', 'text_domain' ),
			'new_item'              => __( 'New Beauty Post', 'text_domain' ),
			'edit_item'             => __( 'Edit Beauty Post', 'text_domain' ),
			'update_item'           => __( 'Update Beauty Post', 'text_domain' ),
			'view_item'             => __( 'View Beauty Post', 'text_domain' ),
			'view_items'            => __( 'View Beauty Posts', 'text_domain' ),
			'search_items'          => __( 'Search Beauty Post', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Beauty Post', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Beauty Post', 'text_domain' ),
			'items_list'            => __( 'Beauty Posts list', 'text_domain' ),
			'items_list_navigation' => __( 'Beauty Posts list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Beauty Posts list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Beauty Post', 'text_domain' ),
			'description'           => __( 'A post for the Best Beauty site', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'beauty_post', $args );
	}
	public function add_product_selector()
	{
		acf_add_local_field_group(array (
			'key' => 'group_bb_product',
			'title' => 'Add a Best Beauty Product',
			'fields' => array (
				array (
					'key' => 'field_bb_product',
					'label' => 'Best Beauty Product',
					'name' => 'best-beauty-product',
					'type' => 'post_object',
					'instructions' => 'Please type in a product name.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array (
						0 => 'product',
					),
					'taxonomy' => array (
					),
					'allow_null' => 0,
					'multiple' => 1,
					'return_format' => 'object',
					'ui' => 1,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'beauty_post',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));
	}
}
new BestBeautyPostPostType();
