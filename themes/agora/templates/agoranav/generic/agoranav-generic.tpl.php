<?php
//$vars = get_defined_vars();
//dpm($vars);
?>
<header class="main-header">
    <div class="agora-header navbar navbar-default">
        <div class="container-fluid">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle js-toggle-macro-menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <svg class="iconsvg-logo">
                        <use xlink:href="<?php print AGORAPATH; ?>images/svgsprite.svg#iconsvg-logo_agora"></use>
                    </svg>
                    <svg class="iconsvg-logo_compressed">
                        <use xlink:href="<?php print AGORAPATH; ?>images/svgsprite.svg#iconsvg-logo_agora_compressed"></use>
                    </svg>
                </a>
            </div>
            
            <div class="magazine-header clearfix">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" class="active">Latest news</a>
                        <div class="megadropdown-menu">
                            <div class="bg-image"></div>
                            <div class="container">
                                <div class="megadropdown-header">
                                    <a href="#" class="btn btn-outline btn-inner-icon visible-reg-on">
                                        <span>See all</span>
                                        <svg class="iconsvg-arrow-right">
                                            <use
                                                xlink:href="<?php print AGORAPATH; ?>images/svgsprite.svg#iconsvg-arrow-right"></use>
                                        </svg>
                                    </a>
                                    <span class="h1">Latest News</span>
                                </div>
                                <div class="dropdown-items">
                                    <div class="row">
                                        <?php print $settings['latest-articles-markup']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <li>
                        <a href="#">Issues</a>
                        <div class="megadropdown-menu dark-bg issue-dropdown">
                            <div class="bg-image"></div>
                            <div class="container">
                                <div class="megadropdown-header">
                                    <a href="#" class="btn btn-outline btn-inner-icon visible-reg-on">
                                        <span>See all</span>
                                        <svg class="iconsvg-arrow-right">
                                            <use
                                                xlink:href="<?php print AGORAPATH; ?>images/svgsprite.svg#iconsvg-arrow-right"></use>
                                        </svg>
                                    </a>
                                    <span class="h1">#Issues</span>
                                </div>
                                <div class="dropdown-items">
                                    <div class="row">
                                        <?php print $settings['latest-issues-markup']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="#">DIA-Facts</a></li>
                </ul>
                
                <div class="nav navbar-nav navbar-right">
                    <span class="categories-title">Filters:</span>
                    <nav class="categories-menu">
                        <!-- classe 'active' quando nella pagina della singola categoria -->
                        <a href="/category/innovation"
                           class="btn btn-outline btn-xs article-category-innovation btn-category-menu">Innovation</a>
                        <a href="/category/people" class="btn btn-outline btn-xs article-category-people
                        btn-category-menu">People</a>
                        <a href="/category/business"
                           class="btn btn-outline btn-xs article-category-business btn-category-menu">Business</a>
                        <a href="/category/well-being" class="btn btn-outline btn-xs article-category-well_being
                        btn-category-menu">Well
                            being</a>
                    </nav>
                    <span class="search-btn js-open-search">
                        <svg class="iconsvg-search">
                            <use xlink:href="<?php print AGORAPATH; ?>images/svgsprite.svg#iconsvg-search"></use>
                        </svg>
                    </span>
                </div>
            </div>
        
        </div>
    </div>
</header>

<nav class="macro-menu-overlay">
    <svg class="iconsvg-logo">
        <use xlink:href="<?php print AGORAPATH; ?>images/svgsprite.svg#iconsvg-logo_agora_inverted"></use>
    </svg>
    <span class="close-overlay-btn js-toggle-macro-menu">
                <svg class="iconsvg-close"><use xlink:href="<?php print AGORAPATH; ?>images/svgsprite.svg#iconsvg-close"></use></svg>
            </span>
    <ul class="nav">
        <li><a href="#" class="active">Magazine</a></li>
        <li><a href="#">Orientation Camp</a></li>
        <li><a href="#">File Repository</a></li>
    </ul>
</nav>

<div class="search-overlay">
            <span class="close-overlay-btn js-close-search">
                <svg class="iconsvg-close"><use xlink:href="<?php print AGORAPATH; ?>images/svgsprite.svg#iconsvg-close"></use></svg>
            </span>
    <div class="search-overlay-content">
        <div class="container">
            <form action="/">
                <div class="form-group">
                    <label for="search">What are you looking for?</label>
                    <input type="text" id="search" name="search" class="search-input" placeholder="Type here">
                </div>
                <button type="submit" class="btn btn-outline btn-outline--white btn-inner-icon">
                    <span>Search</span>
                    <svg class="iconsvg-search">
                        <use xlink:href="<?php print AGORAPATH; ?>images/svgsprite.svg#iconsvg-search"></use>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
