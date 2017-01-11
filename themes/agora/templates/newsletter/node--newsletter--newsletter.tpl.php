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
                                <th colspan="3" style="background-image:url('http://stage.fightbean.it/intouch-nl/header.png');background-position:center;text-decoration:none;" bgcolor="#222222" width="560" height="241" valign="top">
                                    <!--il percorso all'immagine deve essere inserito anche nel tag v:fill-->
                                    <!--[if gte mso 9]>
                                    <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:560px;height:241px;">
                                        <v:fill type="tile" src="http://stage.fightbean.it/intouch-nl/header.png" color="#7bceeb" />
                                        <v:textbox>
                                    <![endif]-->
                                    <div style="margin-top:80px;">
                          <span class="outlook-fontfix big-heading test-gmail" style="font-family:Roboto, Arial, sans serif;font-weight:300;font-size:35px;color:#fff;">Newsletter <span style="line-height: 40px; text-transform:uppercase;font-family:Roboto, Arial, sans serif;font-weight:700;font-size:35px;color:#fff;">12</span>
                        </span>
                                        <br>
                                        <span class="date" style="font-family:Roboto, Arial, sans serif;font-weight:400;font-size:14px;color:#fff;">November 17, 2015</span>
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
                <!--mail body-->
                <tr>
                    <th colspan="3" align="center" class="flexible" valign="top">
                        <table align="center" cellspacing="0" border="0" width="560">
                            <tr>
                                <!--in questo th c'è il il bordo stondato e l'ombra-->
                                <th style="border-radius:2px;background:#fff;">
                                    <table align="center" cellpadding="0" cellspacing="0">
                                        <!--table spacing-->
                                        <tr>
                                            <th class="horizontal-spacer" align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th height="10" colspan="3" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--table heading category-->
                                        <tr>
                                            <th align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th height="30" width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                        <th height="30" width="500" align="left">
                                                            <h3 style="font-size:10px;text-transform:uppercase;">
                                                                <span style="background:#75d9b5; color:#fff; padding:2px 5px; border-radius:2px; text-decoration:none;">Products &amp; Innovation</span>
                                                            </h3>
                                                        </th>
                                                        <th height="30" width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--table heading title and subtitle-->
                                        <tr>
                                            <th align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                        <th width="500" align="left">
                                                            <a style="text-decoration:none;" href="#" target="_blank">
                                                                <span class="outlook-fontfix" style="font-family: Roboto, arial,sans-serif; font-size: 32px; color: #222; padding-bottom: 8px; font-weight:300;line-height: 32px;">Leaders in innovation</span>
                                                            </a>
                                                            <br>
                                                            <a href="#" target="_blank" class="outlook-fontfix" style="font-family:Roboto, arial, sans-serif;color:#222;font-size:14px;font-weight:700;text-decoration:none;line-height:14px;">DiaSorin launched two fast molecular diagnostic tests</a>
                                                        </th>
                                                        <th width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--table spacing-->
                                        <tr>
                                            <th class="horizontal-spacer" align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th height="30" colspan="3" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--sezione immagini-->
                                        <tr>
                                            <th colspan="3" align="center">
                                                <!--in questa tabella deve essere caricata l'immagine di background-->
                                                <a href="http://www.google.it" target="_blank">
                                                </a>
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <!--cambiare l'immagine di background nello style, nell'attributo del tag e all'interno del v:fill e inserire le dimensioni esatte-->
                                                        <th colspan="3" style="background-image:url('http://stage.fightbean.it/intouch-nl/img1.jpg');background-position:center;" bgcolor="#222222" width="600" height="240" valign="top">
                                                            <!--il percorso all'immagine deve essere inserito anche nel tag v:fill-->
                                                            <!--[if gte mso 9]>
                                                            <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;height:240px;">
                                                                <v:fill type="tile" src="http://stage.fightbean.it/intouch-nl/img1.jpg" color="#7bceeb" />
                                                                <v:textbox>
                                                            <![endif]-->
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
                                        <!--table spacing-->
                                        <tr>
                                            <th class="horizontal-spacer" align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th height="30" colspan="3" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--table body text-->
                                        <tr>
                                            <th align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                        <th width="500" align="left">
                                <span class="outlook-fontfix" style="font-family: Roboto, arial,sans-serif; color:#222;font-size:12px; font-weight:400; line-height:24px;">When used together, the new DiaSorin tests allow reliable, complete and extremely fast detection of the PML-RARA translocation, the <b>genetic cause of Acute Prom..</b>
                              </span>
                                                        </th>
                                                        <th width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--table body link-->
                                        <tr>
                                            <th align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                        <th width="500" align="left">
                                                            <a href="#" target="_blank" class="outlook-fontfix" style="color:#75d9b5;text-decoration:none;">
                                                                <span style="color:#75d9b5;font-family: Roboto, arial,sans-serif; font-size:12px; font-weight:900;" class="outlook-fontfix">READ MORE</span>
                                                            </a>
                                                        </th>
                                                        <th width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--table spacing-->
                                        <tr>
                                            <th class="horizontal-spacer" align="left">
                                            </th>
                                            <th height="10" colspan="3" align="left">
                                            </th>
                                        </tr>
                                    </table>
                                </th>
                            </tr>
                        </table>
                    </th>
                </tr>
                <!--second block-->
                <tr>
                    <!--in questo th c'è il il bordo stondato e l'ombra-->
                    <th colspan="3" align="center" class="flexible" valign="top">
                        <table align="center" cellspacing="0" border="0" width="560">
                            <tr>
                                <!--in questo th c'è il il bordo stondato e l'ombra-->
                                <th style="border-radius:2px;background:#fff;">
                                    <table align="center" cellpadding="0" cellspacing="0">
                                        <!--table spacing-->
                                        <tr>
                                            <th class="horizontal-spacer" align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th height="10" colspan="3" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--table heading category-->
                                        <tr>
                                            <th align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th height="30" width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                        <th height="30" width="500" align="left">
                                                            <h3 style="font-size:10px;text-transform:uppercase;">
                                                                <span style="background:#75d9b5; color:#fff; padding:2px 5px; border-radius:2px; text-decoration:none;">Products &amp; Innovation</span>
                                                            </h3>
                                                        </th>
                                                        <th height="30" width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--table heading title and subtitle-->
                                        <tr>
                                            <th align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                        <th width="500" align="left">
                                                            <a style="text-decoration:none;" href="#" target="_blank">
                                                                <span class="outlook-fontfix" style="font-family: Roboto, arial,sans-serif; font-size: 32px; color: #222; padding-bottom: 8px; font-weight:300;line-height: 32px;">Leaders in innovation</span>
                                                            </a>
                                                            <br>
                                                            <a href="#" target="_blank" class="outlook-fontfix" style="font-family:Roboto, arial, sans-serif;color:#222;font-size:14px;font-weight:700;text-decoration:none;line-height:14px;">DiaSorin launched two fast molecular diagnostic tests</a>
                                                        </th>
                                                        <th width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--table spacing-->
                                        <tr>
                                            <th class="horizontal-spacer" align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th height="30" colspan="3" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--sezione immagini-->
                                        <tr>
                                            <th colspan="3" align="center">
                                                <!--in questa tabella deve essere caricata l'immagine di background-->
                                                <a href="http://www.google.it" target="_blank">
                                                </a>
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <!--cambiare l'immagine di background nello style, nell'attributo del tag e all'interno del v:fill e inserire le dimensioni esatte-->
                                                        <th colspan="3" style="background-image:url('http://stage.fightbean.it/intouch-nl/img1.jpg');background-position:center;" bgcolor="#222222" width="600" height="240" valign="top">
                                                            <!--il percorso all'immagine deve essere inserito anche nel tag v:fill-->
                                                            <!--[if gte mso 9]>
                                                            <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;height:240px;">
                                                                <v:fill type="tile" src="http://stage.fightbean.it/intouch-nl/img1.jpg" color="#7bceeb" />
                                                                <v:textbox>
                                                            <![endif]-->
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
                                        <!--table spacing-->
                                        <tr>
                                            <th class="horizontal-spacer" align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th height="30" colspan="3" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--table body text-->
                                        <tr>
                                            <th align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                        <th width="500" align="left">
                              <span class="outlook-fontfix" style="font-family: Roboto, arial,sans-serif; color:#222;font-size:12px; font-weight:400; line-height:24px;">When used together, the new DiaSorin tests allow reliable, complete and extremely fast detection of the PML-RARA translocation, the <b>genetic cause of Acute Prom..</b>
                            </span>
                                                        </th>
                                                        <th width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--table body link-->
                                        <tr>
                                            <th align="left">
                                                <table cellspacing="10" cellpadding="0" border="0">
                                                    <tr>
                                                        <th width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                        <th width="500" align="left">
                                                            <a href="#" target="_blank" class="outlook-fontfix" style="color:#75d9b5;text-decoration:none;">
                                                                <span style="color:#75d9b5;font-family: Roboto, arial,sans-serif; font-size:12px; font-weight:900;" class="outlook-fontfix">READ MORE</span>
                                                            </a>
                                                        </th>
                                                        <th width="50" class="mobile-spacer" align="left">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </th>
                                        </tr>
                                        <!--table spacing-->
                                        <tr>
                                            <th class="horizontal-spacer" align="left">
                                            </th>
                                            <th height="10" colspan="3" align="left">
                                            </th>
                                        </tr>
                                    </table>
                                </th>
                            </tr>
                        </table>
                    </th>
                </tr>
            </table>
        
        </th>
    </tr>
</table>
<!--[if (gte mso 9)|(IE)]>
</th>
</tr>
</table>
<![endif]-->