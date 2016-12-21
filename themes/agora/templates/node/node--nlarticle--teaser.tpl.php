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

<article class="<?php print $classes; ?>">
    <header class="article-card-header">
        <a href="<?php print $content["link2article"]; ?>">
            <div class="embed-responsive embed-responsive-16by9">
                <?php print render($content["field_image"]); ?>
            </div>
        </a>
    </header>
    <div class="article-card-content">
        <a href="<?php print $content["news_category_link"]; ?>" class="category-links">
            <span class="h7 cta">
                <?php print render($content["field_news_category"]); ?>
            </span>
        </a>
        <h4>
            <a href="<?php print $content["link2article"]; ?>">
                <?php print render($content["title_field"]); ?>
            </a>
        </h4>
        <p class="minore"><?php print render($content["field_text"]); ?></p>
        <div class="single-readmore">
            <a href="<?php print $content["link2article"]; ?>" class="h5 cta">Read more</a>
        </div>
    </div>
</article>
