<?php

/**
 * Paragraphs item container
 * Bundle:      imagegallery
 * Context:     any
 * View mode:   any
 * Style:       Multiple 1 (simple image gallery for intouch articles)
 */

?>

<div class="media-container mobile-fullscreen <?php print $classes; ?>">
    <ul class="article-gallery-multiple">
        <?php print render($content["image_gallery"]); ?>
    </ul>
</div>
