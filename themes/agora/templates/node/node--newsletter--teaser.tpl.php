
<li class="<?php print $classes; ?>" style="background-image:url(<?php print  $content["newletter_cover"]; ?>);">
    <a href="<?php print $content["link2newsletter"]; ?>">
        <span class="menu-number">
            <span class="menu-number-1x">
                <?php print render($content["title_field"]); ?>
            </span>
        </span>
        <span class="menu-text">Newsletter
            <span class="menu-date-1x">
                <?php print render($content["field_pubdate"]); ?>
            </span>
        </span>
    </a>
</li>