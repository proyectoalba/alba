<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Form', 'Javascript') ?>
<?php echo javascript_tag('
  function check_all(tag_name, valor) {
    var lista = document.forms["sf_admin_edit_form"].elements[tag_name];
    for (i=0; i < lista.length; i++) {
      if (lista[i].getAttribute("type") == "checkbox" ) {
        lista[i].checked = valor;
      }
    }
  }

'); ?>


<div id="sf_admin_container">
  <h1><?php echo __('Pasaje de alumnos de un ciclo lectivo a otro', array()) ?></h1>
  <div id="sf_admin_content">
    <?php include_partial('global/flashes') ?>

    <form name="sf_admin_edit_form" id="sf_admin_edit_form" method="post" action="<?php echo url_for('ciclolectivo/pasajeAlumnos') ?>">
      <fieldset id="sf_fieldset_informacion_general" class="">

        <div class="form-row">
          <?php echo label_for('pasaje[fk_division_id]', __('Division actual:'), 'class="required" ') ?>

          <div class="content<?php if ($sf_request->hasError('pasaje{fk_division_id}')): ?> form-error<?php endif; ?>">
            <?php if ($sf_request->hasError('pasaje{fk_division_id}')): ?>
              <?php echo form_error('pasaje{fk_division_id}', array('class' => 'form-error-msg')) ?>
            <?php endif; ?>

            <?php echo select_tag('pasaje[fk_division_id]', options_for_select($optionsDivisiones)); ?>
          </div>
        </div>
        <div class="form-row">
          <?php echo label_for('pasaje[fk_ciclolectivo_id]', __('Ciclo Lectivo destino:'), 'class="required" ') ?>

          <div class="content<?php if ($sf_request->hasError('pasaje{fk_ciclolectivo_id}')): ?> form-error<?php endif; ?>">
            <?php if ($sf_request->hasError('pasaje{fk_ciclolectivo_id}')): ?>
              <?php echo form_error('pasaje{fk_ciclolectivo_id}', array('class' => 'form-error-msg')) ?>
            <?php endif; ?>
            <?php echo select_tag('pasaje[fk_ciclolectivo_id]', objects_for_select($optionsCiclos, 'getId', 'getDescripcion', 0, 'include_blank=true')) ?>
          </div>
        </div>

        <div class="form-row">
          <div id="divisiones_destino"></div>
        </div>
        <div class="form-row">
          <div id="alumnos"></div>
        </div>

      </fieldset>
      <ul class="sf_admin_actions">
        <li><?php echo submit_tag(__('Pasar los alumnos seleccionados'), array('class' => 'sf_admin_action_save',)) ?></li>
      </ul>
    </form>
  </div>
</div>
</div>
<?php
echo observe_field('pasaje_fk_division_id', array(
    'update' => 'alumnos',
    'url' => 'ciclolectivo/listarAlumnos',
    'with' => "'division_id=' + $('pasaje_fk_division_id').value +'&division_no_id=' + value",
    'script' => "true",
    'before' => "$('indicator-wrapper').style.display='block'",
    'complete' => "$('indicator-wrapper').style.display='none'",
));
echo observe_field('pasaje_fk_ciclolectivo_id', array(
    'update' => 'divisiones_destino',
    'url' => 'ciclolectivo/cambiarCicloAjax',
    'with' => "'ciclolectivo_id=' + value",
    'script' => "true",
    'before' => "$('indicator-wrapper').style.display='block'",
    'complete' => "$('indicator-wrapper').style.display='none'",
));
?>
