<?php
/**
 * Node
 *
 * Hook suggestions examples:
 *  node--full.tpl.php
 *  node--full--1.tpl.php
 *  node--type.tpl.php
 *  node--type--1.tpl.php
 *  node--type--full.tpl.php
 *  node--type--full--1.tpl.php
 *
 */
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <?php print render($content); ?>
</div>
