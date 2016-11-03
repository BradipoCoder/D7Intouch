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
                            <a href="#" class="btn btn-outline btn-xs">Issue #<?php print render
                                ($content["issue_number"]); ?></a>
                        </div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
        </header>

        <?php print render($content["admin-buttons"]); ?>
    
        <div class="article-module article-cover mobile-fullscreen">
            <?php print render($content["field_image"]); ?>
        </div>
    
        <section class="article-body">
            <?php print render($content["field_paragraphs_standard"]); ?>
        </section>
    </div>
</article>
