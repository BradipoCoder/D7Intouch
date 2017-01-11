<?php
/**
 * Page for area INTOUCH
 */
?>

<?php if ($messages) : ?>
    <div class="messages">
        <?php print $messages; ?>
    </div>
<?php endif; ?>


<div class="main-container">
    <?php print render($page['content']['sidebar']); ?>
    <?php print render($page['content']); ?>
</div>
