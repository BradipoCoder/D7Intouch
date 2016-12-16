<?php

/**
 * Paragraphs item container
 * Bundle:      imagegallery
 * Context:     any
 * View mode:   any
 * Style:       single
 */

?>
<div class="media-container mobile-fullscreen <?php print $classes; ?>">
    <div class="article-gallery single">
        <div class="row">
            <div class="col-xs-12">
                <div class="article-gallery-content">
                    <div class="caption-container">
                        <div class="caption-icon-container"><i class="dida-icons quotes"></i></div>
                        <div class="article-gallery-caption-text minore">
                            <?php print render($content["image_gallery"]["caption"]); ?>
                        </div>
                    </div>
                    <div class="article-gallery-img-container embed-responsive embed-responsive-16by9">
                        <?php print render($content["image_gallery"]["image"]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
