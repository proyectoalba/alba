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
<p>Finalizar instalaci&oacute;n:</p>
<p>Ahora se proceder&aacute; a instalar el sistema. <br/>
Los datos que se van a utilizar son los siguientes, si desea cambiar
alguno por favor haga click aqu&iacute;.
</p>
</div>

<?php if ($error_flag):?>
<div class="error">
    <p>Ocurri&oacute; el siguiente error:</p>
    <p><?php echo $error_msg?></p>
</div>
<?php endif;?>

<table>
    <tr>
        <td>Motor de base de datos:</td>
        <td><?php echo $_SESSION['albainstall']['tipo_motor_base']?></td>
    </tr>
    <tr>
        <td>Servidor:</td>
        <td><?php echo $_SESSION['albainstall']['host']?></td>
    </tr>
    <tr>
        <td>Usuario:</td>
        <td><?php echo $_SESSION['albainstall']['user']?></td>
    </tr>
    <tr>
        <td>Clave:</td>
        <td><?php echo str_repeat('X',strlen($_SESSION['albainstall']['pass']))?></td>
    </tr>
    <tr>
        <td>Base de datos:</td>
        <td><?php echo $_SESSION['albainstall']['db']?></td>
    </tr>
    <tr>
        <td>Modelo de Base:</td>
        <td><?php echo $_SESSION['albainstall']['tipo_base']?></td>
    </tr>
</table>

<?php 
// ir al siguiente paso
   $paso = 6;
   
?>