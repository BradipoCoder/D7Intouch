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
    <ul class="<?php print $classes; ?>">
        <?php foreach ($items as $delta => $item): ?>
            <li><?php print render($item); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <?php print render($items[0]); ?>
<?php endif; ?>

