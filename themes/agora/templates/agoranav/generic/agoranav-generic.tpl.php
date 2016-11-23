<?php
//$vars = get_defined_vars();
//dpm($vars);
?>
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
                    <a href="#"
                       class="btn btn-outline btn-xs article-category-innovation btn-category-menu">Innovation</a>
                    <a href="#" class="btn btn-outline btn-xs article-category-people btn-category-menu">People</a>
                    <a href="#"
                       class="btn btn-outline btn-xs article-category-business btn-category-menu">Business</a>
                    <a href="#" class="btn btn-outline btn-xs article-category-well_being btn-category-menu">Well
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

