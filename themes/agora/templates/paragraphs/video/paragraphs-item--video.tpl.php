<?php

/**
 * Paragraphs item container
 * Bundle:      video
 * Context:     any
 * View mode:   any
 */

?>

<div class="<?php print $classes; ?> mobile-fullscreen">
    <div data-type="<?php print render($content["provider_name"]); ?>" data-video-id="<?php print render
    ($content["clean_video_url"]); ?>"></div>
</div>