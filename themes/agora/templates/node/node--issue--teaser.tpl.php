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

<div class="col-xs-6 col-sm-4">
    <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
        <a href="#">
            <div class="teaser-cover">
                <div class="teaser-bg" style="background-image: url(<?php print render($content["background_url"]); ?>)"></div>
                <div class="cover-video-container">
                    <video class="cover-video-item" src="<?php print render($content["video_url"]); ?>" loop muted></video>
                    <img class="cover-video-item" src="<?php print render($content["video_cover_url"]); ?>">
                </div>
                <span class="issue-number">#<?php print render($content["field_pubnumber"]); ?></span>
            </div>
            <h3 class="issue-title"><span><?php print render($content["title_field"]); ?></span></h3>
        </a>
    </article>
</div>
