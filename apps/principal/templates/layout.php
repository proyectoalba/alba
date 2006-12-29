<?php 
if(!isset($vista)){
     $vista="";
}
    
if($vista == "noMuestraMenu") { 
echo $content;
} else { ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2000/REC-xhtml1-200000126/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>


<?php echo include_http_metas() ?>
<?php echo include_metas() ?>
<?php echo include_title() ?>
<?php // include ("js_vars.php")?>

<link rel="stylesheet" type="text/css" href="<?echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot() . '/js/jsmenu/themes/'.MENU_THEME.'/theme.css' ?>"/>
<link rel="shortcut icon" href="/favicon.ico" />

<style type="text/css">
.fdown {
    background-image: url(<?=sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/images/gui/index3_5x2.png"?>);
}
.fmedio {
    background-image: url(<?=sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/images/gui/fmedio.png"?>);
}
.ftop {
    background-image: url(<?=sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/images/gui/index3_1x4.png"?>);
}
.fmenu {
    background-image: url(<?=sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/images/gui/fmenu.png"?>);
}
td {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 11px;
}
.fizq {
    background-image: url(<?=sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/images/gui/fizq.png"?>);
}
.fizq-menu {
    background-image: url(<?=sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/images/gui/fizq-menu.png"?>);
}
.menuimg {
    background-image: url(<?=sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/images/gui/index_2x1.png"?>);
}
.fder {
    background-image: url(<?=sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/images/gui/fder.png"?>);
}
</style>


</head>
<body>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr valign="top"> 
            <td colspan="2" class="fmedio">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td class="fmedio"><?=image_tag("gui/index_1x1.png", array ( 'width' => '758' , 'heigth' => '77' ) )?></td>
                    <td class="fmedio" align="right"><!-- datos del usuario -->
                       <?php if($sf_user->isAuthenticated() == true): ?>

                        <table class="user-info">
                            <tr>
                                <td nowrap="nowrap">Bienvenido, <a href="#" onmouseover="this.T_BGCOLOR='#d3e3f6';this.T_SHADOWWIDTH=3;this.T_FONTCOLOR='blue';this.T_BORDERWIDTH=2;this.T_BORDERCOLOR='#000000'; return escape('Organizaci&oacute;n: <?echo $sf_user->getAttribute("organizacion_nombre")?> ' )"><?php echo $sf_user->getAttribute('usuario')?></a>
                                <?php if (SF_DEBUG)
                                    echo ' #'. $sf_user->getAttribute('id');
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap="nowrap"><?php echo link_to($sf_user->getAttribute('establecimiento_nombre'),'establecimiento/cambiar')?>
                                <?php if (SF_DEBUG)
                                    echo ' #'. $sf_user->getAttribute('fk_establecimiento_id');
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap="nowrap">Ciclo: <?php echo link_to($sf_user->getAttribute('ciclolectivo_descripcion'),'ciclolectivo/cambiar')?>
                                <?php if (SF_DEBUG)
                                    echo ' #'. $sf_user->getAttribute('fk_ciclolectivo_id');
                                ?>
                                </td>
                            </tr>
                            
                        </table>
                        <?php else: ?>
                            Bienvenido, An&oacute;nimo
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            </td>
            
            <td><?=image_tag("gui/index_1x2.png", array ( 'width' => '17' , 'heigth' => '77' ) )?></td>
        </tr>

        <tr valign="top"> 
            <td class="fizq-menu" width="1%">&nbsp;</td>
            <td colspan="1" class="fmenu"><?   
                if($sf_user->isAuthenticated() == true)  {
                    include("menu.php");
                }
          ?></td>
            <td><?=image_tag("gui/index_2x2.png", array ( 'width' => '17' , 'heigth' => '35' ) )?></td>
        </tr>
        
        
        <tr valign="top"> 
            <td width="33" class="fizq">&nbsp;</td>
            <td width="959">
<div id="cabecera" align="center">
<?php 
    if($sf_user->isAuthenticated() != true)  {
        if ($sf_params->get('module') != 'seguridad' && $sf_params->get('action') !='login') {
           include_partial('seguridad/login', array('sf_params' => $sf_params, 'error_inicio_sesion' => @$error_inicio_sesion));

        }
    }
?></div><br><div id="content"><?php echo $content ?></div>
            </td>
            <td width="17" class="fder">&nbsp;</td>
        </tr>
        <tr valign="top"> 
            <td><?=image_tag("gui/index3_5x1.png", array ( 'width' => '33' , 'heigth' => '22' ) )?></td>
            <td class="fdown">&nbsp;</td>
            <td><?=image_tag("gui/index3_5x3.png", array ( 'width' => '17' , 'heigth' => '20' ) )?></td>
        </tr>
    </table>

</body>
<? echo javascript_include_tag('varios/wz_tooltip.js'); ?>
</html>
<?}?>