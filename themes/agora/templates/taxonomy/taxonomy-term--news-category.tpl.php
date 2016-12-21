<?php
    //
?>

<li class="<?php print $classes; ?>">
    <a href="<?php print $content["link2term"]; ?>">
        <span class="menu-number">
            <i class="cat-icons cat<?php print $content["topic_id"]; ?>"></i>
        </span>
        <span class="menu-text"><?php print render($content["name_field"]); ?></span>
    </a>
</li>
