<?php get_header(); ?>
 <?php get_template_part( 'content', 'single' ); ?>
    <div class="page-content">
        <div class="container">
            <nav class="next-prev-post-nav clearfix">
                <div class="next-prev prev">
			<div class="post-title">
                    <h3><?php previous_post_link('%link', $link='&laquo; %title ', TRUE, '103'); ?></h3>
</div>                
</div>
                <div class="next-prev next">
                    
			<div class="post-title">
			<h3><?php next_post_link('%link', $link='%title &raquo;', TRUE, '103'); ?></h3>
</div>                
</div>
            
		</nav>
	    <div class="page-title">
		<?php while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<div class="date">

			Posted by <i><?php the_author_posts_link(); ?></i> on <i><?php the_time('F jS, Y h:i a'); ?></i>
		</div>
		
	    </div>

            <div class="main">
                
                    
                    
                    <div class="post-image">
                        <?php the_post_thumbnail(); ?>
			
                    </div>
		    
                    <div class="post-copy">
			
                        <?php the_content(); ?>
                        
                    </div>

                    <?php comments_template(); ?>
                <?php endwhile; ?>
            </div>

            <div class="sidebar sidebar-1">
                <?php dynamic_sidebar('Pages Sidebar') ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
