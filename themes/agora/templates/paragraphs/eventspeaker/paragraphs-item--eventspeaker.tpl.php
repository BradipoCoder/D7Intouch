<?php

/**
 * Paragraphs item container
 * Bundle:      eventspeaker
 * Context:     any
 * View mode:   any
 */
?>
<div class="<?php print $classes; ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <aside class="speaker-info">
                    <div class="speaker-pic">
                        <?php print render($content["field_image"]); ?>
                    </div>
                    <h3>
                        <?php print render($content["name_field"]); ?>
                    </h3>
                    <p class="speaker-job">
                        <?php print render($content["title_field"]); ?>
                    </p>
                    <div class="speaker-bio">
                        <p>
                            <?php print render($content["field_text"]); ?>
                        </p>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
