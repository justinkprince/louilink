<?php get_header(); ?>

    <div class="page-content">
        <div class="container">
            <?php if ($featured_blocks = louilink_get_featured(18)) : ?>
                <?php echo louilink_render_view('featured-blocks.php', array('featured_blocks' => $featured_blocks)); ?>
            <?php endif; ?>

            <div class="main">
                <?php while (have_posts()) : the_post();  ?>
                    <?php //print_r(get_the_category(get_the_ID())); ?>
                    <?php print_r(get_the_category_list()); ?>
                    <?php the_content(); ?>
                    
                    
					<?php // added by nate ?>
					<?php if ($cat_blocks = louilink_get_cat_listing(18)) : ?>
                		<?php echo louilink_render_view('cat-listing.php', array('cat_blocks' => $cat_blocks)); ?>
            		<?php endif; ?>
                    
                    
                <?php endwhile; ?>
            </div>

            <div class="sidebar">
                <?php dynamic_sidebar('Pages Sidebar'); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>