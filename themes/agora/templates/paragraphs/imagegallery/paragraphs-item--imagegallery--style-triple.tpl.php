<?php

/**
 * Paragraphs item container
 * Bundle:      imagegallery
 * Context:     any
 * View mode:   any
 * Style:       single
 */

?>
<div class="media-container <?php print $classes; ?>">
    <div class="article-gallery triple">
        <div class="row">
            <div class="col-xs-6">
                <div class="article-gallery-img-container embed-responsive embed-responsive-vertical">
                    <?php print render($content["image_gallery"][0]); ?>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="article-gallery-img-container embed-responsive embed-responsive-vertical half">
                    <?php print render($content["image_gallery"][1]); ?>
                </div>
                <div class="article-gallery-img-container embed-responsive embed-responsive-vertical half">
                    <?php print render($content["image_gallery"][2]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
