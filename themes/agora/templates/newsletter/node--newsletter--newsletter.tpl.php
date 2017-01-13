<?php
/**
 * Notes:
 *
 * 1) vedere elenco nomi campi:
 *      <?php dsm("FIELD NAMES: " . json_encode(array_keys($content))); ?>
 *
 * 2) renderizzare il contenuto di un campo:
 *      <?php print render($content["nome_campo"]); ?>
 *
 * <?php print render($content["title_field"]); ?>
 */
?>
<?php //echo("FIELD NAMES: " . json_encode(array_keys($content))); ?>


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



<table align="center" style="table-layout:fixed;width:100% !important;" width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <th class="flexible">
            <!--main table-->
            <!--[if (gte mso 9)|(IE)]>
            <table width="560" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <th>
            <![endif]-->
            <table width="600" bgcolor="#e1e1e1" class="content" align="center" cellpadding="10" cellspacing="0" border="0" style="border-collapse:separate;table-layout:fixed;width:100%;max-width:600px;">
                <!--header new-->
                <tr>
                    <th colspan="3" align="center">
                        <!--in questa tabella deve essere caricata l'immagine di background-->
                        <table border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr>
                                <!--cambiare l'immagine di background nello style, nell'attributo del tag e all'interno del v:fill e inserire le dimensioni esatte-->
                                <th colspan="3" style="background-image:url('<?php print $content["newletter_cover"]; ?>');background-position:center;text-decoration:none;" bgcolor="#222222" width="560" height="241" valign="top">
                                    <!--il percorso all'immagine deve essere inserito anche nel tag v:fill-->
                                    <!--[if gte mso 9]>
                                    <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:560px;height:241px;">
                                        <v:fill type="tile" src="<?php print $content['newletter_cover']; ?>" color="#7bceeb" />
                                        <v:textbox>
                                    <![endif]-->
                                    <div style="margin-top:80px;">
                          
                                  
                                      <span class="outlook-fontfix big-heading test-gmail" style="font-family:Roboto, Arial, sans serif;font-weight:300;font-size:35px;color:#fff;">Newsletter <span style="line-height: 40px; text-transform:uppercase;font-family:Roboto, Arial, sans serif;font-weight:700;font-size:35px;color:#fff;">
                                        <?php print render($content["title_field"]); ?>
                                          </span></span>
                                        
                                        
                                        
                                        <br>
                                        <span class="date" style="font-family:Roboto, Arial, sans serif;font-weight:400;font-size:14px;color:#fff;">
                                            <?php print render($content["field_pubdate"]); ?>
                                        </span>
                                    </div>
                                    <!--[if gte mso 9]>
                                    </v:textbox>
                                    </v:rect>
                                    <![endif]-->
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
                
                <!--NLARTICLES - BEGIN-->
                <?php foreach($content["articles"] as $article): ?>
                    <tr>
                        <th colspan="3" align="center" class="flexible" valign="top">
                            <?php print render($article); ?>
                        </th>
                    </tr>
                <?php endforeach; ?>
                <!--NLARTICLES - END-->
            
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </th>
            </tr>
            </table>
            <![endif]-->
        </th>
    </tr>
</table>

</body>
</html>




<!--<a href="--><?php //print $content["link2newsletter"]; ?><!--" target="_blank">open in browser</a>-->