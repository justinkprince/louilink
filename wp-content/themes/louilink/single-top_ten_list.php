<?php get_header(); ?>

    <div class="page-content">
        <div class="container">
            <div class="main">
            	<h1>Louisville Top Ten</h1>
                <?php while (have_posts()) : the_post();  ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>

            <div class="sidebar">
                <?php dynamic_sidebar('Pages Sidebar'); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>