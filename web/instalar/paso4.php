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


    if (isset($_POST['set_tipo_base']) && $_POST['set_tipo_base'] == 1) {
        if(!isset($_POST['tipo_base'])) {
            $error_flag= true;
            $error_msg = "Por favor seleccione un tipo de base de datos";
        }
        else {
            $_SESSION['albainstall']['tipo_base'] = $_POST['tipo_base'];
            $completo = false;
        }
    }
    else
        $completo = true;
?>
<div id="detalle">
<p>Selecci&oacute;n de base de datos inicial:</p>
<p>Ahora ud. podr&aacute; elegir si desea comenzar
a utilizar el sistema con una base vac&iacute;a (datos m&iacute;nimos)<br/>
&oacute; con una base de datos de Ejemplo (datos de prueba).</p>
</div>

<?php if ($error_flag):?>
<div class="error">
    <p>Ocurri&oacute; el siguiente error:</p>
    <p><?php echo $error_msg?></p>
</div>
<?php endif;?>


<div>
<form name="tipobase" method="post">
    <input type="hidden" name="set_tipo_base" value="1">
    <table>
        <tr>
            <td>Datos m&iacute;nimos:</td>
            <td>
              <select name="tipo_base">
                <option value="" <?php echo $_SESSION['albainstall']['tipo_base'] == '' ? 'selected' : ''?>>MINIMA - Datos basicos para comenzar a operar</option>
                <option value="ejemplo1" <?php echo $_SESSION['albainstall']['tipo_base'] == 'ejemplo1' ? 'selected' : ''?>>EJEMPLO1 - Datos de ejemplo</option>
              </select>
            </td>
        </tr>
    </table>
    <br/>
    <input type="submit" name="btEnviar" value="Seleccionar base de datos" class="boton">
</form>
</div>
<?php if (isset($_POST['set_tipo_base']) && $_POST['set_tipo_base'] == 1):?>
    <?php if (!$error_flag): ?>
    <div class="ok">
        <p>Modelo de base seleccionado: <?php echo $_POST['tipo_base']?> </p>
    </div>
    <?php endif;?>
<?php endif;?>

<?php
// ir al siguiente paso
   $paso = 5;

?>
