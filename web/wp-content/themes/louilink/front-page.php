<?php get_header(); ?>

    <div class="page-content">
        <div class="container">
            <?php if ($featured_blocks = louilink_get_featured(103)) : ?>
                <?php echo louilink_render_view('featured-blocks.php', array('featured_blocks' => $featured_blocks)); ?>
            <?php endif; ?>

            <div class="main">
                <div class="home-column home-column-1">
                    <?php dynamic_sidebar('Home Page Column 1'); ?>
                </div>

                <div class="home-column home-column-2">
                    <?php dynamic_sidebar('Home Page Column 2'); ?>
                </div>

                <div class="home-column home-column-3">
                    <?php dynamic_sidebar('Home Page Column 3'); ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>