<?php /* added nate */ ?>
<div class="posts-index">
    <?php foreach ($cat_blocks as $index => $block) : ?>
        <div class="post clearfix<?php echo $block['content_type'] ? ' has-content-type ' . $block['content_type'] : ''; ?>">
            <a href="<?php echo $block['url']; ?>">
                <div class="image">
                    <img src="<?php echo $block['image'][0] ?>" alt="">
                
                    <?php if ($block['content_type']) : ?>
                        <div class="content-type">
                            <?php echo ucwords($block['content_type']); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <h2 class="title"><?php echo $block['title']; ?></h2>

                <div class="excerpt">
                    <?php echo $block['excerpt']; ?>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>