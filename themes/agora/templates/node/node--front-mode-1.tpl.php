<?php

?>
<div class="<?php print $front_mode_article_container_classes; ?>">
    <article class="<?php print $classes; ?>">
        <a href="<?php print $node_url; ?>" class="image-container embed-responsive embed-responsive-16by9">
            <img src="<?php print render($content["cover_url"]); ?>" class="embed-responsive-item">
        </a>
        <div class="teaser-content">
            <a href="<?php print $node_url; ?>" class="article-category"><span><?php print render($content["field_category"]); ?></span></a>
            <h3 class="thumb-title">
                <?php if($type == "event"): ?>
                    <span class="label label-default">
                        <img src="<?php print AGORAPATH; ?>/images/icons/clock__white.svg" width="14"> Event
                    </span>
                <?php endif; ?>
                <a href="<?php print $node_url; ?>"><?php print render($content["title_field"]); ?></a>
            </h3>
            <span class="article-date"><?php print render($content["field_pubdate"]); ?></span>
        </div>
    </article>
</div>
