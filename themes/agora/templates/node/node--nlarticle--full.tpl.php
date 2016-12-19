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
            <a href="<?php print $content["content-navigation"]["previous_node_link"]; ?>" class="prev-link">
                <span class="icon icon-chevron-left"></span> Prev<span class="hidden-xs">ious Article</span>
            </a>
            <a href="<?php print $content["content-navigation"]["next_node_link"]; ?>" class="next-link">
                Next<span class="hidden-xs"> Article</span> &gt;
            </a>
            <div class="current-position">
                <span class="content-navigation-title">
                    <span class="content-navigation-title-number hidden-xs">
                        Newsletter</span> <?php print $content["content-navigation"]["newsletter_number"]; ?>
                </span>
            </div>
        </nav>
        <div class="single-articles-related-wrapper">
            <div class="single-articles-container">
                <header class="related-articles-header">
                    <span>Related articles: </span>
                </header>
                <div class="row">
                    <div class="col-md-4">
                        REL-1
                    </div>
                    <div class="col-md-4">
                        REL-2
                    </div>
                    <div class="col-md-4">
                        REL-3
                    </div>
                    <?php /*print render($content["content-related"]);*/ ?>
                </div>
            </div>
        </div>
    </div>
</section>
