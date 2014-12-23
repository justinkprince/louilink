<?php get_header(); ?>

    <div class="page-content">
        <div class="container">
            <?php if ($featured_blocks = louilink_get_featured(6)) : ?>
                <?php echo louilink_render_view('featured-blocks.php', array('featured_blocks' => $featured_blocks)); ?>
            <?php endif; ?>

            <div class="main">
                <?php while (have_posts()) : the_post();  ?>
                    <?php if ($content = get_the_content()) : ?>
                        <?php echo $content; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
                    
				<?php // added by nate ?>
				<?php if ($cat_blocks = louilink_get_cat_listing(6)) : ?>
            		<?php echo louilink_render_view('cat-listing.php', array('cat_blocks' => $cat_blocks)); ?>
        		<?php endif; ?>
            </div>

            <div class="sidebar">
                <?php dynamic_sidebar('Pages Sidebar'); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>