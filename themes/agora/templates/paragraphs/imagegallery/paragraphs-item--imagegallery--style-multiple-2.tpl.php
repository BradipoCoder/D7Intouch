<?php

/**
 * Paragraphs item container
 * Bundle:      imagegallery
 * Context:     any
 * View mode:   any
 * Style:       Multiple 2 (image gallery with caption for agora articles)
 */

?>

<div class="<?php print $classes; ?>">
    <?php print render($content["image_gallery"]); ?>
    <div class="lightslider-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-2">
                    <div class="counter">
                        <span class="current">1</span>/<span class="total">3</span>
                    </div>
                    <div class="caption-container">Caption immagine</div>
                </div>
            </div>
        </div>
    </div>
</div>
