    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2000/REC-xhtml1-200000126/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
    <?php echo include_http_metas() ?>
    <?php echo include_metas() ?>
    <?php echo include_title() ?>
    <link rel="stylesheet" type="text/css" href="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot() . '/js/jsmenu/themes/'.sfConfig::get("app_alba_menutheme").'/theme.css' ?>"/>
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
        <link rel="stylesheet" type="text/css" href="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot()?>/css/impresion.css" />
    <?php if (!$sf_user->isAuthenticated()):?>
        <link rel="stylesheet" type="text/css" href="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot()?>/css/login.css">
    <?php endif;?>
    </head>
    <body>
<?php echo $content; ?>
    </body>
<?php echo javascript_include_tag('varios/wz_tooltip.js'); ?>
    </html>
