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

    $host = $_SESSION['albainstall']['host'];
    $user = $_SESSION['albainstall']['user'];
    $pass = $_SESSION['albainstall']['pass'];
    $db = $_SESSION['albainstall']['db'];
    $tipo_base = $_SESSION ['albainstall']['tipo_base']; 
 
?>
<div id="detalle">
<p>Resultado de la instalaci&oacute;n:</p>

<table>
    <tr>
        <td>Generando archivo de configuraci&oacute;n:</td>
        <td>
            <?php echo generate_databases_yml($host,$user,$pass,$db) ? IMG_OK : IMG_ERROR?>
        </td>
    </tr>
    <tr>
        <td>Creando esquema de base de datos:</td>
        <td>
            <?php echo crear_schema('lib.model.schema.sql', $host, $user, $pass, $db) ? IMG_OK : IMG_ERROR?>
        </td>
    </tr>
    <tr>
        <td>Cargando modelo de base de datos <?php echo $_SESSION['albainstall']['tipo_base']?>:</td>
        <td>
            <?php 
                if ($_SESSION['albainstall']['tipo_base'] =='minima')
                    $archivo = "datos_desde_cero.sql";
                elseif ($_SESSION['albainstall']['tipo_base'] =='ejemplo1')
                    $archivo = "datos_ejemplo.sql";
                else
                    $archivo = "";
            ?>
            <?php echo crear_base_modelo($archivo,$host,$user,$pass,$db) ? IMG_OK : IMG_ERROR?>
        </td>
    </tr>
</table>

<p>La instalaci&oacute;n ha finalizado!</p>

<p><a href="../">Ingresar al Sistema de Gesti&oacute;n Educactiva Alba</a></p>
<p><i>* Recuerde que para ingresar al sistema el nombre de usuario por defecto es <b>admin</b> y la clave es <b>admin</b>.</i></p>
<?php 
// ir al siguiente paso
    $completo = true;
   $paso = 7;
   
?>