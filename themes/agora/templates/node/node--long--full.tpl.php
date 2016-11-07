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
            HEADER
        </header>

        <?php print render($content["admin-buttons"]); ?>
        
    
        <section class="article-body">
            <?php print render($content["field_paragraphs_standard"]); ?>
        </section>
    </div>
</article>
