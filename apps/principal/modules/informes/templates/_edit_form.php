<?php echo form_tag('informes/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($informe, 'getId') ?>

<fieldset id="sf_fieldset_informacion_general" class="">

<div class="form-row">
  <?php echo label_for('informe[nombre]', __($labels['informe{nombre}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('informe{nombre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('informe{nombre}')): ?>
    <?php echo form_error('informe{nombre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($informe, 'getNombre', array (
  'size' => 64,
  'control_name' => 'informe[nombre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('informe[descripcion]', __($labels['informe{descripcion}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('informe{descripcion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('informe{descripcion}')): ?>
    <?php echo form_error('informe{descripcion}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($informe, 'getdescripcion', array (
  'size' => 64,
  'control_name' => 'informe[descripcion]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>



<div class="form-row">
        <?php echo label_for('adjunto', __('Plantilla de informe:')) ?>
  <div class="content<?php if ($sf_request->hasError('file')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('file')): ?>
    <?php echo form_error('file', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
        <?php echo input_file_tag('file') ?>
        <?php  
           if($informe->getAdjunto()) {
           ?><a href="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/".sfConfig::get('sf_upload_dir_name').'/'. sfConfig::get('sf_informe_dir_name').'/'.$informe->getAdjunto()->getRuta()?>"><?php echo $informe->getAdjunto()->getNombreArchivo()?></a>&nbsp;&nbsp;<?php 
//-           echo link_to("Borrar", "informes?action=borrarAdjunto&id=".$informe->getId());
           echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            } 
        ?>
    </div>
</div>


<div class="form-row">
  <?php echo label_for('informe[fk_tipoinforme_id]', __($labels['informe{fk_tipoinforme_id}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('informe{fk_tipoinforme_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('informe{fk_tipoinforme_id}')): ?>
    <?php echo form_error('informe{fk_tipoinforme_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($informe, 'getFkTipoinformeId', array (
  'related_class' => 'Tipoinforme',
  'control_name' => 'informe[fk_tipoinforme_id]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>



<div class="form-row">
  <?php echo label_for('informe[listado]', __($labels['informe{listado}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('informe{listado}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('informe{listado}')): ?>
    <?php echo form_error('informe{listado}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($informe, 'getListado', array (
  'control_name' => 'informe[listado]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>


<div class="form-row">
  <?php echo label_for('informe[variables]', __($labels['informe{variables}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('informe{variables}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('informe{variables}')): ?>
    <?php echo form_error('informe{variables}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($informe, 'getVariables', array (
  'size' => 64,
  'control_name' => 'informe[variables]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>



</fieldset>

<?php include_partial('edit_actions', array('informe' => $informe)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($informe->getId()): ?>
<?php echo button_to(__('delete'), 'informes/delete?id='.$informe->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
