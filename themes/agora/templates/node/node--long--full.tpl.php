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
<?php //echo("FIELD NAMES: " . json_encode(array_keys($content))); ?>



<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
    <div class="fullpage-container">
        <div class="article-cover mobile-fullscreen" style="background-image: url(<?php print render($content["cover_url"]); ?>)"></div>
        <div class="container">
            <header class="article-header">
                <div class="header-content">
                    <a href="#" class="article-category">
                        <?php print render($content["field_category"]); ?>
                    </a>
                    <h1 class="article-main-title">
                        <?php print render($title_prefix); ?>
                        <?php print render($content["title_field"]); ?>
                        <?php print render($title_suffix); ?>
                    </h1>
                    <div class="article-info">
                        <span class="article-date faded">
                            <?php print render($content["field_pubdate"]); /* date of article or issue ??? */ ?>
                        </span>
                        <div class="article-context faded hidden-xs">
                            <div class="context-inner">
                                <span class="agora-magazine">Agora Magazine</span> /
                                <a href="#" class="btn btn-outline btn-xs">
                                    Issue #<?php print render($content["issue_number"]); ?>
                                </a>
                            </div>
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <a href="#" class="btn btn-with-icon btn-with-icon--white js-scroll-to" data-target="#longform-body">
            <i class="btn-icon"><img src="<?php print AGORAPATH; ?>/images/icons/arrow-right__white.svg" width="15"></i>
        </a>
    </div>
    
    <section class="article-body" id="longform-body">
        <?php print render($content["admin-buttons"]); ?>
        
        <?php print render($content["field_paragraphs_standard"]); ?>
    </section>

</article>
