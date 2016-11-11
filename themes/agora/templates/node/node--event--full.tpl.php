<?php
/**
 * Notes:
 *
 * 1) vedere elenco nomi campi:
 *      <?php dsm("FIELD NAMES: " . json_encode(array_keys($content))); ?>
 *
 * 2) renderizzare il contenuto di un campo:
 *      <?php print render($content["nome_campo"]); ?>
 */
?>
<?php //echo("FIELD NAMES: " . json_encode(array_keys($content))); ?>


<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
    <div class="container">
        <header class="article-header">
            <div class="header-content">
                <a href="#" class="article-category">
                    <?php print render($content["field_category"]); ?>
                </a>
                <h1 class="article-main-title">
                    <?php print render($title_prefix); ?>
                    <?php print render($content["title_field"]); ?>
                    <?php print render($title_suffix); ?>
                </h1>
                <div class="article-info">
                    <span class="article-date faded">
                        <?php print render($content["field_pubdate"]); /* date of article or issue ??? */ ?>
                    </span>
                    <div class="article-context faded hidden-xs">
                        <div class="context-inner">
                            <span class="agora-magazine">Agora Magazine</span> /
                            <a href="#" class="btn btn-outline btn-xs">
                                Issue #<?php print render($content["issue_number"]); ?>
                            </a>
                        </div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
        </header>
    
        <section class="article-body">
            <div class="article-module event-header mobile-fullscreen">
                <div class="container-fluid">
                    <div class="row">
                
                        <div class="col-xs-12 col-sm-8 no-padding-right">
                            <?php print render($content["field_image"]); ?>
                        </div>
                
                
                        <div class="col-xs-12 col-sm-4 no-padding-left">
                            <header class="event-info dark-bg">
                                <h3>Reserve your spot</h3>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-12">
                                        <h5 class="text-uppercase"><span>Date and time</span>
                                            <img src="<?php print AGORAPATH; ?>/images/icons/clock__white.svg" width="16">
                                        </h5>
                                        <p>
                                            <?php print render($content["field_event_date"]); ?>
                                        </p>
                                    </div>
                                    <div class="col-xs-6 col-sm-12">
                                        <h5 class="text-uppercase"><span>Location</span>
                                            <img src="<?php print AGORAPATH; ?>/images/icons/location__white.svg" height="25">
                                        </h5>
                                        <p>
                                            <?php print render($content["field_event_location"]); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="register-container">
                                    <a href="<?php print $google_calendar_link; ?>" target="_blank" class="btn btn-default btn-block btn-inner-icon"><span>Add to calendar</span>
                                        <img src="<?php print AGORAPATH; ?>/images/icons/arrow-right__white.svg"></a>
                                </div>
                            </header>
                        </div>
            
                    </div>
                </div>
            </div>
    
            <?php print render($content["field_paragraphs_event"]); ?>
            
        </section>
    </div>
</article>

<?php print render($content["admin-buttons"]); ?>