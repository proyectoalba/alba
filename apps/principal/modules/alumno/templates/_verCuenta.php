<?php use_helper('Javascript') ?>
<?php echo input_hidden_tag('alumno[fk_cuenta_id]',$cuenta_id);?>
<table cellspacing="0" width="30%">
    <tr class="sf_admin_row_1">
        <td><?php echo $cuenta_nombre; ?></td>
        <td><?php echo link_to_remote('Cambiar', array('update' => 'cuenta', 'url' => 'alumno/cambiarCuenta', 'script' => true )); ?></td>
    </tr>
</table>
