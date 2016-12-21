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

<div class="<?php print $classes; ?>">
    <figure class="single-related-item">
        <header class="single-related-header">
            <div class="single-related-img embed-responsive embed-responsive-16by9 hidden-xs">
                <?php print render($content["field_image"]); ?>
            </div>
            <a href="<?php print $content["news_category_link"]; ?>" class="category-links category-products_innovation">
                <span class="h7 cta">
                    <?php print render($content["field_news_category"]); ?>
                </span>
            </a>
            <h4><?php print render($content["title_field"]); ?></h4>
        </header>
        <div class="single-related-content">
            <p class="minore"><?php print render($content["field_text"]); ?></p>
        </div>
        <div class="single-readmore">
            <a href="<?php print $content["link2article"]; ?>" class="h5 cta">READ MORE</a>
        </div>
    </figure>
</div>

