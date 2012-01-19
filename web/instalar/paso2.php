<?php
/**
 *    This file is part of Alba.
 * 
 *    Alba is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 2 of the License, or
 *    (at your option) any later version.
 *
 *    Alba is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with Alba; if not, write to the Free Software
 *    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


/**
 * instalador
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: instalar.php 4883 2007-07-30 21:41:42Z ftoledo $
 * @filesource
 * @license GPL
 */

if (!defined('ALBA_INSTALLER')) die();

?>
<div id="detalle">
<p>Comprobaci&oacute;n de las versiones de programas instalados:</p>
</div>
              
<table>
    <tr>
        <td>Version de PHP >= 5.0.0</td>
        <td><?php echo check_php() ? IMG_OK : IMG_ERROR . " (Versi&oacute;n instalada " .phpversion(). ")"?></td>
    </tr>
    <tr>
        <td>L&iacute;mite de Memoria PHP (>=32Mb)</td>
        <td><?php echo check_memorylimit() ? IMG_OK : IMG_ERROR ?></td>
    </tr>
    <tr>
        <td>magic_quotes_gpc = Off</td>
        <td><?php echo check_magicquotes() ? IMG_OK : IMG_ERROR ?></td>
    </tr>
    <tr>
        <td>M&oacute;dulo para Mysql</td>
        <td><?php echo check_mysql() ? IMG_OK : IMG_ERROR ?></td>
    </tr>
    <tr>
        <td>M&oacute;dulo GD</td>
        <td><?php echo check_gd() ? IMG_OK : IMG_ERROR ?></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td>Servidor web Apache 2</td>
        <td><?php echo check_apache2() ? IMG_OK : IMG_ERROR ?></td>
    </tr>
    <tr>
        <td>mod_rewrite</td>
        <td><?php echo check_rewrite() ? IMG_OK : IMG_ERROR ?></td>
    </tr>
</table>
<?php 
// ir al siguiente paso
   $paso = 3;
?>