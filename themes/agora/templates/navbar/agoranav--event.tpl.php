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
                <b class="hidden-reg-on"><?php print $issue; ?></b>
                <span class="hidden-xs">-  <?php print $article_title; ?></span>
                <a href="#" class="btn btn-default btn-inner-icon visible-reg-on"><span>Add to calendar</span> <img src="<?php print AGORAPATH; ?>images/icons/arrow-right__white.svg"></a>
            </p>
        </div>
    </div>
</nav>
