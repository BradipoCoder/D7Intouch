<?php
    //newsletter side bar
?>

<section class="intouch-loader <?php print $topic_class; ?>">
    <div class="intouch-loader-velina"></div>
    <div class="intouch-loader-logo">
        <div class="diasorin-logo"><img src="<?php print INTOUCHPATH; ?>images/diasorin-logo.png" width="135"></div>
        <div class="in-touch-logo"><img src="<?php print INTOUCHPATH; ?>images/intouch-logo.png" height="21"></div>
    </div>
</section>

<header class="main-header <?php print $topic_class; ?>">
    <div class="header-content">
        <div class="header-content-logo">
            <div class="in-touch-logo"><img src="<?php print INTOUCHPATH; ?>images/intouch-logo.png"></div>
            <div class="diasorin-logo"><img src="<?php print INTOUCHPATH; ?>images/diasorin-logo.png" width="80"></div>
        </div>
        <div class="header-content-inner">
            <div class="header-icon-container">
                <span class="category-number-2x">
                    <i class="cat-icons cat<?php print$topic_id; ?>"></i>
                </span>
            </div>
            <h1 class="category-title-2x"><?php print$title; ?></h1>
            <button class="js-scroll-to visible-xs-inline-block btn btn-default" data-target=".main-content">Read</button>
        </div>
    </div>
    
    <div class="nav-menus">
        <div class="nl-menu">
            <div class="see-all-btn-container">
                <span class="js-show-all-nl see-all-btn hidden-xs"><i class="icon icon-expand"></i></span>
            </div>
            <div class="nav-menus-inner last-nl">
                <ul class="nav-menus-ul">
                    <?php print render($elements_nl_last); ?>
                </ul>
            </div>
            <div class="nav-menus-inner all-nl">
                <ul class="nav-menus-ul">
                    <?php print render($elements_nl_all); ?>
                </ul>
            </div>
        </div>
        
        <div class="topics-menu">
            <div class="nav-menus-inner">
                <ul class="nav-menus-ul">
                    <?php print render($elements_topics); ?>
                </ul>
            </div>
        </div>
    </div>
    
    <nav class="main-nav">
        <div class="mobile-category-header">
            <a href="<?php print $backlink; ?>">
                <div class="mobile-category-icon-container"><span class="category-number-1x"><i class="icon icon-arrow-left"></i></span></div>
                <div class="mobile-category-title-container"><span class="category-title-1x">Back</span></div>
            </a>
        </div>
        <div class="nav-items">
            <span class="js-toggle-nl-menu"><i class="icon icon-newsletter"></i><span class="menu-label">Newsletter</span></span>
            <span class="js-toggle-topics-menu"><i class="icon icon-topic"></i><span class="menu-label">Topics</span></span>
        </div>
        <div class="close-nav"><a href="#" class="js-close-menu"><i class="icon icon-close"></i></a></div>
    </nav>
    
</header>