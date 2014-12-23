<?php

// Register content type meta box.
include dirname(__FILE__) . '/meta-boxes/content-type.php';

// Remove generator meta tag.
add_filter('the_generator', 'louilink_remove_version');
function louilink_remove_version() {
    return '';
}

// Add thumbnail support.
add_theme_support('post-thumbnails');

// Add custom menu support.
add_theme_support('menus');

$sidebars = array(
    array(
        'name' => 'Pages Sidebar',
        'id' => 'right-sidebar',
    ),
    array(
        'name' => 'Home Page Column 1',
        'id' => 'home-left-sidebar',
    ),
    array(
        'name' => 'Home Page Column 2',
        'id' => 'home-center-sidebar',
    ),
    array(
        'name' => 'Home Page Column 3',
        'id' => 'home-right-sidebar',
    ),
);

louilink_register_sidebars($sidebars);

function louilink_register_sidebars($sidebars) {
    $sidebars = (array) $sidebars;
    foreach ($sidebars as $sidebar) {
        register_sidebar(array(
            'name' => __($sidebar['name']),
            'id' => $sidebar['id'],
            'description' => __($sidebar['name']),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));
    }
}

function louilink_render_view($file, $data = array()) {
    $file = preg_replace('/.php$/', '', trim($file)) . '.php';
    $base_path = realpath(dirname(__FILE__)) . '/views/';
    extract($data);
    ob_start();
    include $base_path . $file;
    $out = ob_get_clean();

    return $out;
}

add_filter('excerpt_length', 'louilink_new_excerpt_length');
function louilink_new_excerpt_length($length) {
	$length = 20;
	if (is_front_page()){
		$length = 15;
	}
	
    return $length;
}

add_action( 'init', 'louilink_create_post_type_top_ten_list' );
function louilink_create_post_type_top_ten_list() {
    register_post_type('top_ten_list',
        array(
            'labels' => array(
                'name' => __( 'Top Ten Lists' ),
                'singular_name' => __( 'Top Ten List' )
            ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'top-10',),
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'capability_type' => 'page',
        'taxonomies' => array('category'),
        'show_ui' => true,
        'exclude_from_search' => true,
        'hierarchical' => true,
        'menu_position' => 5,
        )
    );
}

function louilink_get_pager() {
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    $pagination = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '« Newer',
        'next_text' => 'Older »',
    ));
}

function louilink_get_posts_by_category_id($category_id, $args = array()) {
    $default_args = array(
        'cat' => $category_id,
        'post_type' => 'any',
        'posts_per_page' => 10,
    );

    $args = array_merge($default_args, $args);

    $query = new WP_Query($args);
    $posts = array();

    while ($query->have_posts()) {
        $query->the_post();
        $content_type = rwmb_meta('content_type', array('type' => 'radio'));

        $size = (count($blocks) === 0) ? array(680, 320) : array(270, 155);
        $posts[] = array(
            'post_id' => $post->ID,
            'title' => get_the_title(),
            'url' => get_permalink(),
            'image' => wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size),
            'excerpt' => get_the_excerpt(),
            'content_type' => $content_type,
        );
    }

    return $posts;
}

// Get the featured images for the color blocks
function louilink_get_featured($category_id) {
    $args = array(
        'cat' => $category_id,
        'post_type' => 'any',
    );

    $query = new WP_Query($args);
    $posts = array();

    while ($query->have_posts()) {
        $query->the_post();
        $content_type = rwmb_meta('content_type', array('type' => 'radio'));

        $size = (count($posts) === 0) ? array(680, 320) : array(270, 155);
        $posts[] = array(
            'post_id' => $post->ID,
            'title' => get_the_title(),
            'url' => get_permalink(),
            'image' => wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size),
            'excerpt' => get_the_excerpt(),
            'content_type' => $content_type,
        );
    }

    $featured_posts = array();
    $i = 0;

    foreach ($posts as $post) {
        if (($i > 6) || !$post['image']) {
            continue;
        }
        $featured_posts[] = $post;
        $i++;
    }

    return array_slice($featured_posts, 0, 6);
}

// shortcode - [display-posts category="music" posts_per_page="11" include_date="true" order="DSC" orderby="date" include_excerpt="true" image_size ="1" display-posts offset="6"]
/* *************************************** DOWN - nate
*/
function louilink_get_cat_listing($category_id) {
    $paged = max(1, get_query_var('paged'));

    $args = array(
        'cat' => $category_id,
		'posts_per_page' => 10,
        'paged' => $paged,
    );

    if ($paged == 1) {
        $args['offset'] = 6;
    }

    $query = new WP_Query($args);
    $posts = array();

    while ($query->have_posts()) {
        $query->the_post();
        $content_type = rwmb_meta('content_type', array('type' => 'radio'));

        $size = array(300, 300);
        $posts[] = array(
            'post_id' => $post->ID,
            'title' => get_the_title(),
            'url' => get_permalink(),
            'image' => wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size),
            'excerpt' => get_the_excerpt(),
            'content_type' => $content_type,
        );
    }

    return $posts;

    $out = array();
    $i = 0;

	$num_posts = 0; // count actual posts being added... if no image, the post is not added so the coutner and num posts will be different
    foreach ($blocks as $block) {
        if ($i > 5 && $block['image']) {
            $out[] = $block;
        	$num_posts++;
        }
        $i++;
    }

	return $out;
}

function louilink_get_primary_nav_subs() {
    $primary_nav_subs = array();

    $primary_nav_id = 3;
    $menu_items = wp_get_nav_menu_items($primary_nav_id);

    // Get the children of the primary nav items grouped by parent.
    $groups = louilink_get_primary_nav_sub_items($menu_items);

    foreach ($groups as $parent_id => $group) {
        // Get the page id from the menu item object meta data.
        $page_id = get_post_meta($parent_id, '_menu_item_object_id', true);
        // Get the first category that comes back for a page id.
        $category = louilink_get_category_id_by_page_id($page_id);
        // Add the sub to the stack... two lists of sub-nav items and two preview items.
        $primary_nav_subs[$parent_id] = array(
            'sub_lists' => array(
                array_slice($group, 0, 4),
                array_slice($group, 4, 4),
            ),
            // Get the latest two posts from this menu item's category.
            'previews' => louilink_get_latest_posts(array(
                'category' => $category[0]->cat_ID,
                'numberposts' => 2,
                'post_type' => 'any',
                'meta_key' => '_thumbnail_id',
            )),
        );
    }

    return $primary_nav_subs;
}

function louilink_get_primary_nav_sub_items($menu_items) {
    $sub_items = array();

    foreach ($menu_items as $index => $item) {
        // If the item has a parent, add it to the sub-item array under its parent's index.
        if ($item->menu_item_parent) {
            // Create the parent index if it doesn't exist.
            if (!array_key_exists($item->menu_item_parent, $sub_items)) {
                $sub_items[$item->menu_item_parent] = array();
            }
            $sub_items[$item->menu_item_parent][$item->ID] = array(
                'id' => $item->ID,
                'url' => $item->url,
                'title' => $item->title,
            );
        }
    }

    return $sub_items;
}

function louilink_get_latest_posts($args = array()) {
    $defaults = array(
        'numberposts' => 10,
        'offset' => 0,
        'category' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '', // _thumbnail_id
        'meta_value' => '',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true,
    );

    $args = array_merge($defaults, $args);

    $recent_posts = wp_get_recent_posts($args);
    $posts = array();

    foreach ($recent_posts as $key => $post) {
        $posts[] = array(
            'ID' => $post['ID'],
            'thumbnail' => get_the_post_thumbnail($post['ID'], array(134, 92)),
            'excerpt' => wp_trim_words($post['post_content'], 20),
            'url' => get_permalink($post['ID']),
        );
    }

    return $posts;
}

function louilink_get_category_id_by_page_id($page_id) {
    $categories = get_the_category($page_id);

    return $categories;
    return (!empty($categories[0])) ? $categories[0] : array();
}

function insertImageRSS() {
  global $post;
  preg_match("/(http:\/\/.*(jpg|jpeg|png|gif|tif|bmp))\"/i", get_the_post_thumbnail( $post->ID, 'thumbnail' ), $matches);
  return $matches[1];
}
