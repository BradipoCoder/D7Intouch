<?php

/**
 * Paragraphs item container
 * Bundle:      video
 * Context:     any
 * View mode:   any
 */

//added custom $content["clean_video_url"]

?>

<div class="media-container">
    <?php if(!empty($content["video_description"]["#markup"])) :?>
        <div class="caption-container">
            <div class="caption-icon-container">
                <i class="dida-icons videos"></i>
            </div>
            <div class="article-gallery-caption-text minore">
                <?php print render($content["video_description"]); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="embed-responsive embed-responsive-16by9">
        <?php print render($content["player"]); ?>
    </div>
</div>
