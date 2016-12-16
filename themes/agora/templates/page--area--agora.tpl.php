<?php
/**
 * Page for area AGORA
 */
?>

<?php if (!empty($page['main_header'])): ?>
    <?php print render($page['main_header']); ?>
<?php endif; ?>



<?php
/**
 * --- TEMPORARY ---
 * WILL BE REMOVED SOON
 */
if ($messages):
?>
<div class="temp-admin-area">
    <?php if ($messages) : ?>
        <div class="messages">
            <?php print $messages; ?>
        </div>
    <?php endif; ?>

    <?php if (false && !empty($tabs)): ?>
        <?php print render($tabs); ?>
    <?php endif; ?>

    <?php if (false && !empty($page['help'])): ?>
        <?php print render($page['help']); ?>
    <?php endif; ?>

    <?php if (false && !empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
    <?php endif; ?>
</div>
<?php
endif;
/**
 * --- TEMPORARY ---
 */
?>

<?php print render($page['content']['navbar']); ?>


<div class="main-container">
    <?php print render($page['content']); ?>
</div>


<?php if (!empty($page['bottom'])): ?>
    <div class="bottom">
        <?php print render($page['bottom']); ?>
    </div>
<?php endif; ?>

<?php if (!empty($page['wide_bottom'])): ?>
    <div class="wide-bottom">
        <?php print render($page['wide_bottom']); ?>
    </div>
<?php endif; ?>

<footer class="footer">
    <?php print render($page['footer']); ?>
</footer>
