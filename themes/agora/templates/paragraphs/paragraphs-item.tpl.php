<?php

/**
 * Generic paragraphs item container
 *
 * FILE NAME SUGGESTIONS:
 * paragraphs-item--[bundle]--[context]--[viewmode].tpl.php
 * paragraphs-item--[bundle]--[context].tpl.php
 * paragraphs-item--[bundle]--[viewmode].tpl.php
 * paragraphs-item--[bundle].tpl.php
 * paragraphs-item.tpl.php
 *
 * bundles:
 *  text, image, imagegallery, quote, video ... more to come ;)
 *
 * contexts:
 *  - standard
 *  - long
 *  - event
 *
 * view modes:
 *  - full
 *  - teaser
 *  - child
 *
 * Note: folders are only for grouping files together - the names/locations of the folders have nothing to do with
 * decision on template selection - that is: only the name of the file matters
 */
?>
<div class="<?php print $classes; ?>">
    <?php print render($content); ?>
</div>
