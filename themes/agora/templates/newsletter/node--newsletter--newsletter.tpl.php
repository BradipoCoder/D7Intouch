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


<!--<a href="--><?php //print $content["link2newsletter"]; ?><!--" target="_blank">open in browser</a>-->