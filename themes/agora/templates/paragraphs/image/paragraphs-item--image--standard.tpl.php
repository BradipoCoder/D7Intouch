<?php

/**
 * Paragraphs item container
 * Bundle:      image
 * Context:     Standard
 * View mode:   any
 */
?>


<div class="<?php print $classes; ?>">
    <figure>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <?php print render($content["field_image"]); ?>
                </div>
            </div>
            <figcaption>
                <?php print render($content["field_text"]); ?>
            </figcaption>
        </div>
    </figure>
</div>