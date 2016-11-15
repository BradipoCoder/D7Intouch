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
    
    <?php print render($content["title_field"]); ?>

</section>
