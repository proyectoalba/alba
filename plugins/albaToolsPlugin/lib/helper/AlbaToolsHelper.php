<?php

/*
 * This file is part of the Alba package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * AlbaToolsHelper.
 *
 * @package    symfony
 * @subpackage helper
 * @author     Fernando Toledo <ftoledo@docksud.com.ar>
 * @version    SVN: $Id: NumberHelper.php 7757 2008-03-07 10:55:22Z fabien $
 */

function text2img($texto)
{
    if (is_null($texto)){
        return null;
    }
    return tag('img', array('alt'=> $texto, 'src'=>url_for('albaTools/text2img?texto=' . $texto)));
}
