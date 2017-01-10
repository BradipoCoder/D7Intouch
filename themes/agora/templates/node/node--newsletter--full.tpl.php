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
    <header class="article-list-header">
        <span class="article-list-breadcrumbs">
            <b>Articles</b> | NEWSLETTER <b><?php print render($content["title_field"]); ?></b></span>
    </header>
    <div class="articles-container">
        <?php print render($content["articles"]); ?>
    </div>
</section>
