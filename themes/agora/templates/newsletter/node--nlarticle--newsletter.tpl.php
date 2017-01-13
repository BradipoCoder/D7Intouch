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
                                        <span style="background:<?php print $content["category_color"]; ?>; color:#fff;
                                            padding:2px 5px; border-radius:2px; text-decoration:none;">
                                            <?php print render($content["field_news_category"]); ?>
                                        </span>
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
                                    <a style="text-decoration:none;" href="<?php print $content["link2article"]; ?>" target="_blank">
                                        <span class="outlook-fontfix" style="font-family: Roboto, arial,sans-serif; font-size: 32px; color: #222; padding-bottom: 8px; font-weight:300;line-height: 32px;">
                                            <?php print render($content["title_field"]); ?>
                                        </span>
                                    </a>
                                    <br>
                                    <a href="<?php print $content["link2article"]; ?>" target="_blank" class="outlook-fontfix" style="font-family:Roboto, arial, sans-serif;color:#222;font-size:14px;font-weight:700;text-decoration:none;line-height:14px;">
                                        <?php print render($content["field_focus"]); ?>
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
                                <th colspan="3" style="background-image:url('<?php print $content["field_image_uri"]; ?>');background-position:center;" bgcolor="#222222" width="600" height="240" valign="top">
                                    <!--il percorso all'immagine deve essere inserito anche nel tag v:fill-->
                                    <!--[if gte mso 9]>
                                    <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;height:240px;">
                                        <v:fill type="tile" src="<?php print $content['field_image_uri']; ?>" color="#7bceeb" />
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
                                <span class="outlook-fontfix" style="font-family: Roboto, arial,sans-serif; color:#222;font-size:12px; font-weight:400; line-height:24px;">
                                    <?php print render($content["field_text"]); ?>
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
                                    <a href="<?php print $content["link2article"]; ?>" target="_blank" class="outlook-fontfix" style="color:#75d9b5;text-decoration:none;">
                                        <span style="color:<?php print $content["category_color"]; ?>;font-family: Roboto, arial,sans-serif; font-size:12px; font-weight:900;" class="outlook-fontfix">
                                            READ MORE
                                        </span>
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
