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

$cnx_error_flag = false;
$cnx_error_msg = "";
$error_flag = true;

$host = "";
$user = "";
$pass = "";
$db = "";
$creardb = "";
if (isset($_POST['test_conn']) && $_POST['test_conn']==1) {
    
    $host = $_POST['host'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $db = $_POST['db'];    
    $creardb = (isset($_POST['creardb']) && $_POST['creardb'] == 1);
    DebugLog('Probando conexión'); 
    $conn = @mysql_connect($host,$user,$pass);
    if (!$conn) {
        $cnx_error_flag = true;
        DebugLog('Error al conectar con la base de datos','E');
        $cnx_error_msg = "No se puede conectar a la base de datos: <br>" . mysql_error();
    }
    else {
        DebugLog('Probando crear base de datos');
        if ($creardb) {
            $ret = @mysql_query('CREATE DATABASE ' . $db , $conn);
            if (!$ret) {
                $cnx_error_flag = true;
                DebugLog('No se puede crear la base de datos: ' . mysql_error() ,'E');
                $cnx_error_msg = "No se puede crear la base de datos: <br>" . mysql_error();
                $error_flag = true;
            }
        }
        else {
            $error_flag = false;
        }    
        $_SESSION['albainstall']['host'] = $host;
        $_SESSION['albainstall']['user'] = $user;        
        $_SESSION['albainstall']['pass'] = $pass;   
        $_SESSION['albainstall']['db'] = $db;
        $_SESSION['albainstall']['creardb'] = $creardb;
    }
}    
?>
<div id="detalle">
<p>Detalle de conexi&oacute;n con la base de datos:</p>
</div>
<?php if ($cnx_error_flag):?>
<div class="error">
    <p>Ocurri&oacute; el siguiente error:</p>
    <p><?php echo $cnx_error_msg?></p>
</div>
<?php endif;?>
<form name="test_conn" method="post">              
<input type="hidden" name="test_conn" value="1">
<table>
    <tr>
        <td>Servidor:</td>
        <td><input type="text" name="host" value="<?php echo $host?>" class="texto"></td>
    </tr>
    <tr>
        <td>Usuario:</td>
        <td><input type="text" name="user" value="<?php echo $user?>" class="texto"></td>
    </tr>
    <tr>
        <td>Clave:</td>
        <td><input type="password" name="pass" value="<?php echo $pass?>" class="texto"></td>
    </tr>
    <tr>
        <td>Base de datos:</td>
        <td><input type="text" name="db" value="<?php echo $db?>" class="texto"></td>
    </tr>
    <tr>
        <td>Crear base de datos:<br/><span style="font-size:9px">(debe tener los permisos para poder hacerlo)</style></td>
        <td><input type="checkbox" name="creardb" value="1" <?php echo $creardb ? "checked" : ""?> class="check"></td>
    </tr>   
</table>
<br/>
<input type="submit" name="btTextConn" value="Comprobar conexi&oacute;n a la Base de Datos" class="boton">
</form>
<?php 
// ir al siguiente paso
   $paso = 4;
   
?>