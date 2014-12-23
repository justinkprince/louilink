<?php
/*
Template Name: No Featured Boxes
*/

$categories = get_the_category();
$category_id = ($categories) ? $categories[0]->term_id : null;
?>

<?php get_header(); ?>

    <div class="page-content">
        <div class="container">
            <?php //if ($categories && $featured_blocks = louilink_get_featured($category_id)) : ?>
                <?php //echo louilink_render_view('featured-blocks', array('featured_blocks' => $featured_blocks)); ?>
            <?php //endif; ?>

            <div class="main">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>

                <?php if ($categories && $cat_blocks = louilink_get_cat_listing($category_id)) : ?>
                    <?php echo louilink_render_view('cat-listing', array('cat_blocks' => $cat_blocks)); ?>
                <?php endif; ?>
            </div>

            <div class="sidebar">
                <?php dynamic_sidebar('Pages Sidebar'); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>