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
 
function permisos($dir) {
    $octalPermiso = substr(sprintf('%o', @fileperms($dir)), -4);
    return ($octalPermiso == "0777" OR $octalPermiso == "1777");
}
        
$dirs = array(
    'config', 
    'cache', 
    'log', 
    'web' . DIRECTORY_SEPARATOR . 'tmp',
    'web' . DIRECTORY_SEPARATOR. 'uploads',
    'web' . DIRECTORY_SEPARATOR. 'uploads' .DIRECTORY_SEPARATOR. 'assets',
);
 
?> 
<ul>
<?php foeach($dirs as $dir):?>
    <li>Comprobando permisos en: <?php echo $dir?> <?php permiso($dir) : IMG_OK : IMG_ERROR </li>
<?php endforeach;?>
</ul>