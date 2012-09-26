<?php use_helper('Javascript') ?>
<?php
echo form_tag('relAlumnoDivision/save', array(
    'id' => 'sf_admin_edit_form',
    'name' => 'sf_admin_edit_form',
    'multipart' => true,
))
?>
<?php echo object_input_hidden_tag($rel_alumno_division, 'getId') ?>
<?php echo javascript_tag("
function filrarAlumnosSinDivision(sin_division)
{
  $('indicator-wrapper').style.display='block',
  new Ajax.Updater(
    'rel_alumno_division_fk_alumno_id',
    '" . url_for('relAlumnoDivision/ajaxAlumnos') . "',
    {
      asynchronous:true,
      evalScripts:false,
      onComplete: $('indicator-wrapper').style.display='none',
      parameters: {
        sin_division: sin_division
      }
    }
  );
}
");
?>
<fieldset id="sf_fieldset_none" class="">

  <div class="form-row">
      <?php echo label_for('rel_alumno_division[fk_alumno_id]', __($labels['rel_alumno_division{fk_alumno_id}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('rel_alumno_division{fk_alumno_id}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('rel_alumno_division{fk_alumno_id}')): ?>
        <?php echo form_error('rel_alumno_division{fk_alumno_id}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php
      $value = object_select_tag($rel_alumno_division, 'getFkAlumnoId', array(
          'related_class' => 'Alumno',
          'control_name' => 'rel_alumno_division[fk_alumno_id]',
              ));
      echo $value ? $value : '&nbsp;'
      ?>
      <input type="checkbox" id="chkAlumnosSinDivision" onclick="filrarAlumnosSinDivision(this.checked)"/>Mostrar solo alumnos sin división asignada
    </div>
  </div>

  <div class="form-row">
      <?php echo label_for('rel_alumno_division[fk_division_id]', __($labels['rel_alumno_division{fk_division_id}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('rel_alumno_division{fk_division_id}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('rel_alumno_division{fk_division_id}')): ?>
        <?php echo form_error('rel_alumno_division{fk_division_id}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = get_partial('fk_division_id', array('type' => 'edit', 'rel_alumno_division' => $rel_alumno_division));
      echo $value ? $value : '&nbsp;'
      ?>
    </div>
  </div>

</fieldset>

<?php include_partial('edit_actions', array('rel_alumno_division' => $rel_alumno_division)) ?>

</form>

<ul class="sf_admin_actions">
  <li class="float-left"><?php if ($rel_alumno_division->getId()): ?>
      <?php
      echo button_to(__('delete'), 'relAlumnoDivision/delete?id=' . $rel_alumno_division->getId(), array(
          'post' => true,
          'confirm' => __('Are you sure?'),
          'class' => 'sf_admin_action_delete',
      ))
      ?><?php endif; ?>
  </li>
</ul>
