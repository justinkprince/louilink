
<div class="featured-blocks">
    <?php foreach ($featured_blocks as $index => $block) : ?>
        <div class="block block-<?php echo $index; ?><?php echo $block['content_type'] ? ' has-content-type ' . $block['content_type'] : ''; ?>">
            <a href="<?php echo $block['url']; ?>">
                <div class="image">
                    <img src="<?php echo $block['image'][0] ?>" alt="">
                </div>

                <?php if ($block['content_type']) : ?>
                    <div class="content-type">
                        <?php echo ucwords($block['content_type']); ?>
                    </div>
                <?php endif; ?>

                <div class="title">
                    <?php echo $block['title']; ?>
                </div>

                <div class="overlay">
                    <div class="excerpt">
                        <?php echo $block['excerpt']; ?>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>