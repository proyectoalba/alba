<?php use_helper("Object"); ?>
<div id="alumnos">
  <?php echo label_for('pasaje[fk_alumno_id]', __('Alumnos a pasar:'), 'class="required" ') ?>
  <table cellpadding="0" cellspacing="0"  class="sf_admin_list" style="width: inherit">
    <thead>
      <tr>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>Documento</th>
        <th><?php echo checkbox_tag('todos', 1, false, array('title' => 'Marcar/desmarcar todos', 'onclick' => 'check_all("pasaje[fk_alumno_id][]",this.checked)')) ?></th>
      </tr>
    </thead>

    <?php foreach ($alumnos as $a): ?>
      <tr>
        <td><?php echo $a->getApellido() ?></td>
        <td><?php echo $a->getNombre() ?></td>
        <td><?php echo $a->getTipodocumento(); ?> <?php echo $a->getNroDocumento() ?></td>
        <td><?php echo checkbox_tag("pasaje[fk_alumno_id][]", $a->getId()) ?></td>
      </tr>
    <?php endforeach ?>
    <tfoot>
      <tr>
        <th colspan="4">
          <?php if (count($alumnos) == 0): ?>
             No se encuentran alumnos (&oacute; todos han sido asignados a la divisi&oacute;n destino).
          <?php else: ?>
            <?php echo count($alumnos) ?> registros encontrados.
          <?php endif; ?>
        </th></tr>
    </tfoot>
  </table>
</div>
