<?php

/**
 * Paragraphs item container
 * Bundle:      video
 * Context:     any
 * View mode:   any
 */

?>

<div class="media-container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <div class="caption-container">
                <div class="caption-icon-container"><i class="dida-icons pdf"></i></div>
                <div class="article-gallery-caption-text minore">
                    <h6><?php print render($content["description"]); ?></h6>
                    <a class="article-links" href="<?php print render($content["file_uri"]); ?>">Download</a>
                </div>
            </div>
        </div>
    </div>
</div>