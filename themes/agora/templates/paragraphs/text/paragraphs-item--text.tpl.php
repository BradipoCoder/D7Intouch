<?php

/**
 * Paragraphs item container
 * Bundle:      text
 * Context:     any
 * View mode:   any
 */
?>
<div class="<?php print $classes; ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <?php print render($content); ?>
            </div>
        </div>
    </div>
</div>
