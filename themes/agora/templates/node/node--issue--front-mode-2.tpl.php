<?php
/**
 * Notes:
 *
 * 1) vedere elenco nomi campi:
 *      <?php dsm("FIELD NAMES: " . json_encode(array_keys($content))); ?>
 *
 * 2) renderizzare il contenuto di un campo:
 *      <?php print render($content["nome_campo"]); ?>
 */
?>
<?php //dsm("FIELD NAMES: " . json_encode(array_keys($content))); ?>


<section id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
    <header class="issue-header">
        <div class="issue-bg" style="background-image: url(<?php print render($content["background_url"]); ?>)"></div>
        <div class="container">
            <div class="cover-video-container">
                <video class="cover-video-item" src="<?php print render($content["video_url"]); ?>" loop muted></video>
                <img class="cover-video-item" src="<?php print render($content["video_cover_url"]); ?>">
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-2">
                    <span class="issue-number">#<?php print render($content["field_pubnumber"]); ?></span>
                    <div class="issue-info">
                        <img class="hidden-xs" src="<?php print AGORAPATH; ?>/images/logo_white.png" width="67">
                        <h2>Issue #<?php print render($content["field_pubnumber"]); ?></h2>
                        <span class="visible-xs-inline-block">/</span>
                        <p class="issue-month"><?php print render($content["field_pubdate"]); ?></p>
                    </div>
                </div>
            </div>
            <h1 class="cover-title"><span><?php print render($content["title_field"]); ?></span></h1>
        </div>
    </header>
    
    <div class="issue-articles">
        <span class="issue-number">#<?php print render($content["field_pubnumber"]); ?></span>
        <div class="container">
            <div class="row">
                <?php print render($content["children"]); ?>
            </div>
        </div>
    </div>
</section>

