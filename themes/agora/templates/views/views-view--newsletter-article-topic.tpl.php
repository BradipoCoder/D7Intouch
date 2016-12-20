<?php
/**
 * PORCATA INLINE :<>
 */
$topicTitle = '';
if(arg(0) == "newsletter" && arg(1) == "topic")
{
    $tid = arg(2);
    $term = taxonomy_term_load($tid);
    $topicTitle = $term->name_field[LANGUAGE_NONE][0]["value"];
}
?>

<section id="main" class="main-content">
    <header class="article-list-header">
        <span class="article-list-breadcrumbs"><b>Articles</b> | <?php print $topicTitle; ?></span>
    </header>
    <div class="articles-container">
        <?php print $rows; ?>
    </div>
</section>
            