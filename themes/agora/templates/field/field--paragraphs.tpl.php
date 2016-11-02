<?php
/**
 * Field
 *
 * Hook suggestions examples:
 *  field--type.tpl.php
 *  field--name--1.tpl.php
 *  field--nodetype.tpl.php
 *  field--name--nodetype.tpl.php
 *
 */
?>

<?php if (count($items) > 1): ?>
    <?php foreach ($items as $delta => $item): ?>
        <?php print render($item); ?>
    <?php endforeach; ?>
<?php else: ?>
    <?php print render($items[0]); ?>
<?php endif; ?>

