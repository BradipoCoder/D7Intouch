<?php

/**
 * Paragraphs item container
 * Bundle:      video
 * Context:     any
 * View mode:   any
 */

//added custom $content["clean_video_url"]

?>

<div class="<?php print $classes; ?>">
    <div class="video-container embed-responsive embed-responsive-16by9">
        <pre>clean video url: "<?php print render($content["clean_video_url"]); ?>"</pre>
        <div data-type="youtube" data-video-id="<?php print render($content["clean_video_url"]); ?>"></div>
    </div>
</div>
