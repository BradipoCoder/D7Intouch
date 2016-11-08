<?php

/**
 * Paragraphs item container
 * Bundle:      advancedtext
 * Context:     any
 * View mode:   any
 */
?>

<div class="<?php print $classes; ?>">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-2">
                <?php if (isset($content["field_focus"])): ?>
                <div class="visible-xs-block">
                    <div class="focus-preview">
                        <a href="#focus<?php print $paragraphs_entity_item_id; ?>" class="btn btn-with-icon btn-with-icon--gray btn-xs js-toggle-preview">
                            <i class="btn-icon"><img src="<?php print AGORAPATH; ?>/images/icons/plus__gray.svg" width="13"></i>
                        </a>
                        <span class="focus-preview__text">
                            <?php print render($content["field_focus_preview"]); ?>
                        </span>
                        <div class="line"></div>
                    </div>
                </div>
                <aside class="paragraph-focus" id="focus<?php print $paragraphs_entity_item_id; ?>">
                    <header class="paragraph-focus__header visible-xs-block">
                        <h6>In-Depth</h6>
                        <span data-target="#focus<?php print $paragraphs_entity_item_id; ?>" class="close-btn js-toggle-preview">
                            <img src="<?php print AGORAPATH; ?>/images/icons/close__white.svg" width="10">
                        </span>
                    </header>
                    <div class="paragraph-focus__body">
                        <?php print render($content["field_focus"]); ?>
                    </div>
                </aside>
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-8 col-sm-offset-0 col-md-offset-1">
                <?php print render($content["field_text"]); ?>
            </div>
        </div>
    </div>
</div>
