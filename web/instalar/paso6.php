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

$tipo_motor_base = $_SESSION['albainstall']['tipo_motor_base'];
$host = $_SESSION['albainstall']['host'];
$user = $_SESSION['albainstall']['user'];
$pass = $_SESSION['albainstall']['pass'];
$db = $_SESSION['albainstall']['db'];
$tipo_base = $_SESSION ['albainstall']['tipo_base']; 
 
$error_flag = false;    
?>
<div id="detalle">
<p>Resultado de la instalaci&oacute;n:</p>

<table>
    <tr>
        <td>Generando archivo de configuraci&oacute;n de acceso a base de datos:</td>
        <td>
            <?php 
                $ret = generate_databases_yml($tipo_motor_base,$host,$user,$pass,$db);
                echo $ret ? IMG_OK : IMG_ERROR;
                if (!$ret) {
                    $error_flag = true;
                    DebugLog("Error al generar archivo databases.yml","E");
                }
            ?>
        </td>
    </tr>


    <tr>
        <td>Generando archivo de configuraci&oacute;n para las tareas:</td>
        <td>
            <?php 
                $ret = generate_propel_ini($tipo_motor_base,$host,$user,$pass,$db);
                echo $ret ? IMG_OK : IMG_ERROR;
                if (!$ret) {
                    $error_flag = true;
                    DebugLog("Error al generar archivo propel.ini","E");
                }
            ?>
        </td>
    </tr>



    <tr>
        <td>Generando modelo de la base de datos:</td>
        <td>
<!--
            <div style="visibility: hidden;">
            <?php 
                $ret = build_model();
            ?>
            </div>
-->
            <?php echo IMG_OK; ?>
        </td>
    </tr>



    <tr>
        <td>Creando esquema de base de datos:</td>
        <td>
            <?php 

                if($tipo_motor_base == 'mysql') {
                    $ret = crear_schema('lib.model.schema.mysql.sql', $tipo_motor_base, $host, $user, $pass, $db);
                } else {
                    $ret = crear_schema('lib.model.schema.pgsql.sql', $tipo_motor_base, $host, $user, $pass, $db);
                }

                echo $ret ? IMG_OK : IMG_ERROR;
                if (!$ret) {
                    $error_flag = true;
                    DebugLog("Error al crear schemad e base de datos","E");
                }
            ?>
        </td>
    </tr>
    <tr>
        <td>Cargando modelo de base de datos <?php echo $_SESSION['albainstall']['tipo_base']?>:</td>
        <td>
            <?php 
                if ($_SESSION['albainstall']['tipo_base'] == 'minima')
                    if($_SESSION['albainstall']['tipo_motor_base'] == 'mysql')
                        $archivo = "datos_desde_cero.sql";
                    elseif  ($_SESSION['albainstall']['tipo_motor_base'] == 'pgsql')
                        $archivo = "datos_desde_cero.sql";
                    else
                        $archivo = "";
                elseif ($_SESSION['albainstall']['tipo_base'] == 'ejemplo1')
                    if($_SESSION['albainstall']['tipo_motor_base'] == 'mysql')
                        $archivo = "datos_ejemplo.sql";
                    elseif ($_SESSION['albainstall']['tipo_motor_base'] == 'pgsql')
                        $archivo = "datos_ejemplo.pgsql.sql";
                    else
                        $archivo = "";
                else
                    $archivo = "";
            ?>
            <?php 
                $ret = crear_base_modelo($archivo, $tipo_motor_base, $host, $user, $pass, $db);
                echo $ret ? IMG_OK : IMG_ERROR;
                if (!$ret) {
                    $error_flag = true;
                    DebugLog("Error al cargar modelo de base de datos: $archivo","E");
                }
            ?>
        </td>
    </tr>
</table>

<p>La instalaci&oacute;n ha finalizado!</p>

<?php if ($error_flag):?>
<div class="error">
<p>
Se encontraron errores en la instalación, es posible que debe realizar algun paso<br/>
de forma manual, por favor revise el registro de la instalaci&oacute;n haciendo click <br/>
en el siguiente enlace:
</p>
<p><a href ="ver_log.php" target="_blank">Ver Registro de Instalaci&oacute;n</a></p>
</div>
<?php endif;?>
<p><a href="../">Ingresar al Sistema de Gesti&oacute;n Educactiva Alba</a></p>
<p><i>* Recuerde que para ingresar al sistema el nombre de usuario por defecto es <b>admin</b> y la clave es <b>admin</b>.</i></p>
<?php
         
// finaliznado los pasos 
    DebugLog  ("============================ FIN INSTALACION ALBA - " .date('d-m-Y H:i:s'). "=======================");
    $completo = true;
?>