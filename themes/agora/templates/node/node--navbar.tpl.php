<?php
    // type: all
    // viewmode: navbar

    $nodeLink = url('node/' . $nid);
?>

<div class="col-xs-12 col-sm-4">
    <article class="<?php print $classes; ?>">
        <a href="<?php print $nodeLink; ?>" class="image-container embed-responsive embed-responsive-16by9">
            <?php print render($content["field_image"]); ?>
        </a>
        <div class="teaser-content">
            <a href="#" class="article-category">
                <span><?php print render($content["field_category"]); ?></span>
            </a>
            <h3 class="thumb-title">
                <a href="<?php print $nodeLink; ?>">
                    <?php print render($content["title_field"]); ?>
                </a>
            </h3>
            <span class="article-date">
                <?php print render($content["field_pubdate"]); ?>
            </span>
        </div>
    </article>
</div>
