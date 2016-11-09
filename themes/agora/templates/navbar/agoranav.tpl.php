<?php
    //
?>
<nav class="article-navigation">
    <div class="container-fluid">
        <div class="left-content">
            <a href="<?php print $backlink; ?>" class="btn btn-with-icon">
                <i class="btn-icon">
                    <img src="<?php print AGORAPATH; ?>images/icons/arrow-left__black.svg" width="10">
                </i>
                <span>Back <span class="hidden-xs">to Agora Magazine</span></span>
            </a>
        </div>
        <div class="right-content">
            <p class="breadcrumbs">
                <b><?php print $issue; ?></b> <span class="hidden-xs">-  <?php print $article_title; ?></span>
            </p>
        </div>
    </div>
</nav>
