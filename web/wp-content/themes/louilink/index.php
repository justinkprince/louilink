<?php get_header(); ?>

    <div class="page-content">
        <div class="container">
        	<div class="main">
        		<h1><?php the_title(); ?></h1>
	        	<?php if (have_posts()) : ?>
	        		<div class="posts-index">
		        		<?php while (have_posts()) : the_post() ?>
		        			<div class="post listing-item clearfix">
		        				<a href="<?php the_permalink(); ?>" class="image">
		        					<?php $post_image_url = get_post_meta($post->ID, 'postImage', true); ?>
		        					<?php the_post_thumbnail(); ?>
		        				</a>

		        				<a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>

		        				<div class="date">
		        					<?php the_date(); ?>
		        				</div>

		        				<div class="excerpt">
		        					<?php the_excerpt(); ?>
		        				</div>
		        			</div>
		        		<?php endwhile; ?>
	        		</div>
	        	<?php else : ?>

	        	<?php endif; ?>
        	</div>

            <div class="sidebar">
                <?php dynamic_sidebar('Pages Sidebar'); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>