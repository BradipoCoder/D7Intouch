<?php
/**
 * Page for user (login/profile)
 */
?>

<?php if ($messages) : ?>
    <div class="messages">
        <?php print $messages; ?>
    </div>
<?php endif; ?>
    
    
<div class="main-container">
    <div class="form-container">
        <div class="intouch-logo">
            <img src="<?php echo INTOUCHPATH; ?>/images/intouch-logo.png">
        </div>
        <?php print render($page['content']); ?>
    </div>
    <div class="diasorin-logo">
        <img src="<?php echo INTOUCHPATH; ?>/images/diasorin-logo.png">
    </div>
</div>
