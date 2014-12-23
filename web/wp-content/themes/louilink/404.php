<?php get_header(); ?>

    <div class="page-content">
        <div class="container">
        	<div class="main">
        		<h1>We couldn't find that page...</h1>

        		<p>Would you like to try to search for it?</p>
        		
			    <?php get_search_form(); ?>
        	</div>

            <div class="sidebar">
                <?php dynamic_sidebar('Pages Sidebar'); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>