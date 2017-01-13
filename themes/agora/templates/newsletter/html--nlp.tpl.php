<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see     template_preprocess()
 * @see     template_preprocess_html()
 * @see     template_process()
 *
 * @ingroup themeable
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php print $head_title; ?></title>
    <?php /*print $head;*/ ?>
    <?php /*print $styles;*/ ?>
    <?php /*print $scripts;*/ ?>
    
    <style type="text/css">
        table {
            empty-cells: show;
        }
        
        .undoreset table {
            -webkit-margin-start: auto;
            -webkit-margin-end: auto;
        }
        
        .undoreset table th {
            padding: auto !important;
        }
        
        @media only screen and (max-width: 600px) {
            th[class=flexibleContainerCell] {
                width: 100% !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            th[class=flexibleContainerCell] {
                display: block;
                width: 100%;
                text-align: left;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            th[class=flexibleContainerBox] {
                display: block;
                width: 100%;
                text-align: left;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            th[class=flexibleContainerBox] table {
                display: block;
                width: 100%;
                text-align: left;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            table[class=responsive] tr, table[class=responsive] tr th {
                display: block;
                width: 100%;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            table[class=responsive] tr th {
                margin-bottom: 20px;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            table[class=buttonwrapper] th {
                width: auto !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            table[class=pattern] .main_nav {
                display: table-footer-group;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            table[class=pattern] .main_nav th th {
                display: inline-block;
                width: 25%;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            table[class=pattern] .main_nav th th.bigsized {
                width: 33.3333333%;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            .app-container {
                background-color: #fff;
                height: 71px;
                padding: 20px 10px !important;
                width: 33.3333333% !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            th[class=pattern] table {
                width: 100% !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            th[class=pattern] img {
                max-width: 100%;
                height: auto !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            th[class=pattern] .col {
                width: 25%;
                margin-top: 20px;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            .responsive-img {
                max-width: 100%;
                height: auto !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            .double {
                width: 100% !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            .section-titles {
                font-size: 18px !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            .mobile-margin {
                margin-left: 20px;
                margin-right: 20px;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            .mobile-padding-text {
                padding-left: 20px;
                padding-right: 20px;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            .gold-data .gold-data-mobile {
                padding-top: 0;
                padding-bottom: 0;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            .outlook-width-400 {
                margin-left: auto !important;
                margin-right: auto !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            .spacers-th {
                width: 30px !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            .red-closure {
                background-color: transparent !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            .body-mobile {
                font-size: 18px !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            body[yahoo] .hide {
                display: none !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            body[yahoo] .mobile-heading1 {
                font-size: 9px !important;
            }
            
        }
        
        @media only screen and (max-width: 600px) {
            body[yahoo] .mobile-heading2 {
                font-size: 35px !important;
            }
            
        }
        
        @media only screen and (max-width: 599px) {
            table {
                width: 100%;
            }
            
        }
        
        @media only screen and (max-width: 599px) {
            th[class=container] {
                background-size: auto 100%;
                background-position: center top;
                width: 100%;
                height: auto;
                min-height: 200px;
                padding-top: 100px !important;
            }
            
        }
        
        @media only screen and (max-width: 599px) {
            th[class=spacer] {
                display: none;
                height: 0;
            }
            
        }
        
        @media only screen and (max-width: 599px) {
            th[class=pattern] .halfshifter-left .calendar-icon {
                width: 52px !important;
            }
            
        }
        
        @media only screen and (max-width: 599px) {
            .elenco-container .elenco-title table {
                width: auto !important;
            }
            
        }
        
        @media only screen and (max-width: 599px) {
            .month-container {
                padding: 4px 0 !important;
            }
            
        }
        
        @media only screen and (max-width: 599px) {
            .heading {
                padding: 0 !important;
            }
            
        }
        
        @media only screen and (max-width: 599px) {
            .img-left-big img {
                width: 100%;
            }
            
        }
        
        @media only screen and (max-width: 599px) {
            .text-right-big {
                padding: 0 !important;
            }
            
        }
        
        @media only screen and (max-width: 599px) {
            .text-right-big table tr th {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
            
        }
        
        @media only screen and (max-width: 599px) {
            .right-empty-highlights {
                text-align: left;
            }
            
        }
        
        @media only screen and (max-width: 599px) {
            .right-empty-highlights .description {
                text-align: left;
            }
            
        }
        
        @media only screen and (max-width: 590px) {
            .data-details {
                overflow-x: auto;
                width: 500px !important;
            }
            
        }
        
        @media only screen and (max-width: 590px) {
            .mobile-padding {
                padding: 20px;
            }
            
        }
        
        @media only screen and (max-width: 500px) {
            table[class=buttonfixed] th {
                -webkit-text-size-adjust: none;
                font-size: 80%;
            }
            
        }
        
        @media only screen and (max-width: 500px) {
            .bigger a {
                font-size: 11px !important;
            }
            
        }
        
        @media only screen and (max-width: 500px) {
            .right-full-highlights .description {
                text-align: left;
            }
            
        }
        
        @media only screen and (max-width: 500px) {
            .centretext .buttonfix {
                height: 22px;
                max-width: 100px;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            th[class=pattern] .col {
                width: 100%;
                display: block;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            th[class=pattern] .col1 {
                margin-bottom: 16px;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            th[class=pattern] .description span {
                display: block;
                max-width: 300px;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            .big-heading {
                font-size: 20px !important;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            th[class=pattern] .halfshifter-left {
                width: 28% !important;
                display: inline-block !important;
                text-align: left;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            th[class=pattern] .halfshifter-right {
                width: 72% !important;
                display: inline-block !important;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            .spacing-th {
                width: 5px !important;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            .data-details {
                width: auto !important;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            .data-details .first-row th {
                font-size: 10px !important;
                -webkit-text-size-adjust: none;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            .data-details .second-row th {
                font-size: 9px !important;
                padding: 4px;
                -webkit-text-size-adjust: none;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            .main-logo {
                min-width: 224px;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            .mobile-spacer {
                display: none;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            .icon-container {
                position: relative;
                right: 26px;
            }
            
        }
        
        @media only screen and (max-width: 420px) {
            .icon-title {
                font-size: 10px;
            }
            
        }
    </style>

</head>
<body yahoo="" bgcolor="#f6f8f1" style="width: 100% !important;font-family: Roboto, Arial, sans-serif; font-weight: 400; min-width: 100% !important; margin: 0; padding: 0;">

<!-- gmail app mobile friendly disable -->
<!--<div style="display:none;white-space:nowrap;font:15px courier;color:#ffffff;line-height:0;width:800px !important;min-width:600px !important;max-width:800px !important;">                                                          </div>-->


<!--[if mso]>
<style>
    body {
        font-family:Trebuchet MS,Tahoma,sans-serif !important;
    }
    .outlook-fontfix {
        font-family:Trebuchet MS,Tahoma,sans-serif !important;
    }
    .p-padding {
        padding-top:20px;
    }
    .l-padding {
        padding-left:10px;
    }
    .outlook-hide {
        overflow:hidden !important;
        float:left !important;
        display:none !important;
        line-height:0 !important;
    }
    .outlook-width-400 {
        width:400px;
    }
</style>
<![endif]-->

<?php print $page; ?>

</body>
</html>
