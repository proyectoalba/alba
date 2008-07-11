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

$cnx_error_flag = false; //errores de base de datos
$cnx_error_msg = ""; //errores de base de datos
$error_flag = false; // error en el paso del instalador

$tipo_motor_base = "";
$host = "";
$user = "";
$pass = "";
$db = "";
$creardb = "";

if (isset($_POST['test_conn']) && $_POST['test_conn']==1) {
    //obtenidno datos del form

    $tipo_motor_base = $_POST['tipo_motor_base'];
    $host = $_POST['host'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $db = $_POST['db'];
    $creardb = (isset($_POST['creardb']) && $_POST['creardb'] == 1);

    //probado conexion
    DebugLog('Probando conexión'); 

    // Compruebo si estan los datos minimos completos
    if($host == '' OR $user == '' OR $db == '' OR ($tipo_motor_base != 'mysql' AND $tipo_motor_base != 'pgsql')) {
        $error_flag = true;
        $cnx_error_flag = true;
        $cnx_error_msg = "Debe completar al menos los campos Motor de bases de datos, Servidor, usuario y base de datos <br>";
        DebugLog('Error al conectar con la base de datos','E');
    } else {
        $dsn = ":host=$host";
        switch($tipo_motor_base) {
            case 'mysql': $dsn = 'mysql'.$dsn; break;
            case 'pgsql': $dsn = 'pgsql'.$dsn.";port=5432;user=$user;password=$pass"; break;
            default: $dsn = null;
        }
        if(!$creardb) {
            $dsn .= ";dbname=$db";
        }

        try {
            $dbh = new PDO($dsn, $user, $pass);
        } 
        catch (PDOException $e) {
            $dbh = null;
            $error_flag = true;
            $cnx_error_flag = true;
            $cnx_error_msg = "No se puede conectar a la base de datos: <br>" . $e->getMessage();
            DebugLog('Error al conectar con la base de datos','E');
        }

        //crear base si es necesario
        if ($creardb AND $dbh != null) {
            DebugLog('Probando crear base de datos...');
            try {
                @$dbh->exec('CREATE DATABASE ' . $db);
                DebugLog("Base de datos $db creada correctamente");
            }
            catch(PDOException $e) {
                $error_flag = true;
                $cnx_error_flag = true;
                $cnx_error_msg = "No se puede crear la base de datos: <br>" . $e->getMessage();
                DebugLog('No se puede crear la base de datos: ' . $e->getMessage() ,'E');
            }
        } else {
            DebugLog("No se creara una base de datos");
        } 

        $dbh = null;

        $_SESSION['albainstall']['tipo_motor_base'] = $tipo_motor_base;
        $_SESSION['albainstall']['host'] = $host;
        $_SESSION['albainstall']['user'] = $user;
        $_SESSION['albainstall']['pass'] = $pass;
        $_SESSION['albainstall']['db'] = $db;
        $_SESSION['albainstall']['creardb'] = $creardb;
    }
}
else
    $error_flag = true;    
?>

<script type="text/javascript">
    function cambioTipo(bt) {
        if(bt.value=="pgsql") {
            document.forms[0].creardb.disabled = true;
        } else {
            document.forms[0].creardb.disabled = false;
        }
    }
</script>

<div id="detalle">
<p>Detalle de conexi&oacute;n con la base de datos:</p>
</div>
<?php if ($cnx_error_flag):?>
<div class="error">
    <p>Ocurri&oacute; el siguiente error:</p>
    <p><?php echo $cnx_error_msg?></p>
</div>
<?php endif?>
<form name="test_conn" method="post">              
<input type="hidden" name="test_conn" value="1">
<table>

    <tr>
        <td>Motor de bases de datos:&nbsp;&nbsp;&nbsp;</td>
        <td>Mysql<input type="radio" name="tipo_motor_base" value="mysql" onChange="cambioTipo(this)"  <?php echo isset($tipo_motor_base) && $tipo_motor_base == 'mysql' ? 'checked' : ''?> >
        Postgresql<input type="radio" name="tipo_motor_base" value="pgsql" onChange="cambioTipo(this)" <?php echo isset($tipo_motor_base) && $tipo_motor_base == 'pgsql' ? 'checked' : ''?> ></td>
    </tr>
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
        <td>Crear base de datos:<br/><span style="font-size:9px">(Debe tener los permisos para poder hacerlo)</style></td>
        <td><input type="checkbox" name="creardb" value="1" <?php echo $creardb ? "checked" : ""?> class="check"></td>
    </tr>
</table>
<br/>
<input type="submit" name="btTextConn" value="Comprobar conexi&oacute;n a la Base de Datos" class="boton">
</form>

<?php if (isset($_POST['test_conn']) && $_POST['test_conn']==1): ?>
    <?php if (!$cnx_error_flag): ?>
    <div class="ok">
        <p>La conexi&oacute;n a la base fue existosa.</p>
    </div>
    <?php endif;?>
<?php endif?>

<?php 
// ir al siguiente paso
   $paso = 4;
   
?>
