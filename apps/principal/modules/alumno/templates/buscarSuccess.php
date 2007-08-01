<?php
    if(strlen($txt_cuenta) > 3) {
?>
<?php use_helper('Javascript') ?>
<?php
        $tr_class = true;
        if(count($aCuentas) > 0) {
?>
    <table cellspacing="0" class="sf_admin_list">
    <thead>
        <tr>
            <th id="sf_admin_list_th_cuenta">Cuenta</th>
            <th id="sf_admin_list_th_seleccionar">Seleccionar</th>
        </tr>
    </thead>
    <tbody>
<?php
            foreach($aCuentas as $cuenta) {
                $tr_class = ! $tr_class;
                $numero = ($tr_class)?1:0; 
?>
    <tr class="sf_admin_row_<?php echo $numero;?>">
      <td><?php echo label_for('cuenta',$cuenta->getNombre()) ?></td>
      <td><?php echo link_to_remote('Seleccionar', array ( 'update' => 'cuenta', 'url' => 'alumno/seleccionarCuenta?id='.$cuenta->getId()));?></td>
    </tr>
<?php
            }
?>
    </tbody>
</table>
<?php
        } else {
            echo "No existe";
        }
    } else {
        echo "Debe buscar con mas de 3 caracteres";
    }
?>
