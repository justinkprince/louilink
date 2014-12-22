<div id="primary-nav-subs" class="primary-nav-subs">
	<div class="container">
		<?php foreach ($primary_nav_subs as $id => $sub) : ?>
			<div class="sub" id="sub-<?php echo $id; ?>">
				<?php if ($sub['sub_lists']) : ?>
					<?php foreach ($sub['sub_lists'] as $list) : ?>
						<ul>
							<?php foreach ($list as $item) : ?>
								<li><a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php if ($sub['previews']) : ?>
					<div class="previews">
						<?php foreach ($sub['previews'] as $post) : ?>
							<a href="<?php echo $post['url']; ?>" class="post">
								<div class="thumbnail">
									<?php echo $post['thumbnail']; ?>
								</div>

								<div class="excerpt">
									<?php echo $post['excerpt']; ?>
								</div>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>