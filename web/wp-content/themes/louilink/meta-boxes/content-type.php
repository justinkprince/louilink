<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter('rwmb_meta_boxes', 'louilink_register_meta_boxes');
/**
 * Register meta boxes
 *
 * @return void
 */
function louilink_register_meta_boxes($meta_boxes) {
	//var_dump($meta_boxes);exit;
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'louilink_';

	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'content_type_meta',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Content type', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array('post', 'page'),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'side',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => false,

		// List of meta fields
		'fields' => array(
			array(
				'name'    => __('Type', 'rwmb'),
				'id'      => "content_type",
				'type'    => 'radio',
				// Array of 'value' => 'Label' pairs for radio options.
				// Note: the 'value' is stored in meta field, not the 'Label'
				'options' => array(
					'article' => __('Article', 'rwmb'),
					'video' => __('Video', 'rwmb'),
					'audio' => __('Audio', 'rwmb'),
					'people' => __('People', 'rwmb'),
				),
				'std' => 'article',
			),
		),
	);

	return $meta_boxes;
}

