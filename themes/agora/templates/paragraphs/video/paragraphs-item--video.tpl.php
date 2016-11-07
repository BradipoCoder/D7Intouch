<?php

/**
 * Paragraphs item container
 * Bundle:      video
 * Context:     any
 * View mode:   any
 */
?>

<div class="<?php print $classes; ?>">
    <div class="video-container embed-responsive embed-responsive-16by9">
        <?php print trim(render($content["field_video"]),"\r\n "); ?>
        <!--<div data-type="youtube" data-video-id="<?php print render($content["field_video"]); ?>"></div>-->
    </div>
</div>
