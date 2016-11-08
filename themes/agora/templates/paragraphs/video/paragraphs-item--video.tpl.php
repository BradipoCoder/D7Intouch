<?php

/**
 * Paragraphs item container
 * Bundle:      video
 * Context:     any
 * View mode:   any
 */

//added custom $content["clean_video_url"]

?>

<div class="<?php print $classes; ?> mobile-fullscreen">
    <div data-type="youtube" data-video-id="<?php print render($content["clean_video_url"]); ?>"></div>
</div>