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

<section id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
    <div class="single-articles-wrapper">
        <div class="single-articles-container">
            <header class="single-articles-header">
                <a href="#" class="category-links">
                    <span class="h7 cta">
                        <?php print render($content["field_news_category"]); ?>
                    </span>
                </a>
                <h1 class="h2"><?php print render($content["title_field"]); ?></h1>
                <h4><?php print render($content["field_focus"]); ?></h4>
            </header>
            <div class="single-articles-content">
                <?php print render($content["field_paragraphs_news"]); ?>
            </div>
        </div>
        <nav class="content-navigation single">
            <?php print render($content["content-navigation"]); ?>
        </nav>
        <div class="single-articles-related-wrapper">
            <?php print render($content["content-related"]); ?>
        </div>
    </div>
</section>
