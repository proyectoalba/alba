<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<h1><?php echo __('Editar Entrada en Legajo Pedagógico para '.$alumno->getApellido().' '.$alumno->getNombre(), array()) ?></h1>

<div id="sf_admin_container">

<?php if ($sf_request->hasErrors()): ?>
<div class="form-errors">
<h2><?php echo __('There are some errors that prevent the form to validate') ?></h2>
<ul>
<?php foreach ($sf_request->getErrorNames() as $name): ?>
  <li><?php echo $sf_request->getError($name) ?></li>
<?php endforeach; ?>
</ul>
</div>
<?php elseif ($sf_flash->has('notice')): ?>
<div class="save-ok">
<h2><?php echo __($sf_flash->get('notice')) ?></h2>
</div>
<?php endif; ?>

<?php echo form_tag('legajopedagogico/save', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

<?php echo object_input_hidden_tag($legajopedagogico, 'getId') ?>
<?php echo input_hidden_tag('legajopedagogico[fk_alumno_id]', $alumno_id) ?>
<?php echo input_hidden_tag('aid', $alumno_id) ?>
<?php echo input_hidden_tag('cid', $legajo_categoria_id) ?>


<fieldset id="sf_fieldset_informacion_general" class="">
<h2><?php echo __('Entrada') ?></h2>

<div class="form-row">

  <?php echo label_for('legajopedagogico[fecha]', __('Fecha:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('legajopedagogico{fecha}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('legajopedagogico{fecha}')): ?>
    <?php echo form_error('legajopedagogico{fecha}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_date_tag($legajopedagogico, 'getFecha', array (
  'rich' => true,
  'withtime' => true,
  'calendar_button_img' => sfConfig::get('sf_admin_web_dir').'/images/date.png',
  'control_name' => 'legajopedagogico[fecha]',
)) ?>
  </div> 
</div>

<div class="form-row">
<?php echo label_for('legajopedagogico[titulo]', __('Titulo:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('legajopedagogico{titulo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('legajopedagogico{titulo}')): ?>
    <?php echo form_error('legajopedagogico{titulo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($legajopedagogico, 'getTitulo', array (
  'size' => 20,
  'control_name' => 'legajopedagogico[titulo]',
)) ?>
    </div>

</div>

<div class="form-row">
  <?php echo label_for('legajopedagogico[resumen]', __('Resumen:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('legajopedagogico{resumen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('legajopedagogico{resumen}')): ?>
    <?php echo form_error('legajopedagogico{resumen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php 
if(method_exists($legajopedagogico->getResumen(),'getContents')) {
    echo object_input_tag($legajopedagogico->getResumen(), 'getContents', array ( 'size' => 40, 'control_name' => 'legajopedagogico[resumen]',));
} else {
    echo object_input_tag($legajopedagogico, 'getResumen', array ( 'size' => 40, 'control_name' => 'legajopedagogico[resumen]',));
}
 ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('legajopedagogico[texto]', __('Texto:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('legajopedagogico{texto}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('legajopedagogico{texto}')): ?>
    <?php echo form_error('legajopedagogico{texto}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php 
if(method_exists($legajopedagogico->getTexto(),'getContents')) {
    echo object_textarea_tag($legajopedagogico->getTexto(), 'getContents', array ( 'rows' => '10' , 'cols' => '80', 'control_name' => 'legajopedagogico[texto]',));
} else {
    echo object_textarea_tag($legajopedagogico, 'getTexto', array (  'rows' => '10' , 'cols' => '80', 'control_name' => 'legajopedagogico[texto]',));
}
?>
   </div>
</div>


<div class="form-row">
        <?php echo label_for('categoria', __('Categoria:'), 'class="required" ') ?>
        
     <div class="content<?php if ($sf_request->hasError('legajopedagogico{fk_legajocategoria_id}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('legajopedagogico{fk_legajocategoria_id}')): ?>
        <?php echo form_error('legajopedagogico{fk_legajocategoria_id}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

        <?php echo select_tag('legajopedagogico[fk_legajocategoria_id]', options_for_select($optionsCategoriaLegajo, $legajo_categoria_id)) ?>
   </div>
        
        

</div>

        <div class="form-row">
        <?php echo label_for('adjunto', __('Agregar un nuevo adjunto:')) ?>
        <?php echo input_file_tag('file') ?>
        <?  //aqui deberiamos hacer una funcion verAdjunto?id=XX y mandar el mimetype con header y luego el contenido )
            foreach ($aFile as $file) { 
           ?><a href="<?=sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/".sfConfig::get('sf_upload_dir_name').'/'. $file->ruta?>"><?=$file->nombre_archivo?></a>&nbsp;&nbsp;<?
           echo link_to("Borrar", "legajopedagogico?action=borrarAdjunto&id=".$legajopedagogico->getId()."&ajid=".$file->id."&aid=".$alumno_id);
           echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            } 
        ?>
        </div>

</fieldset>

<ul class="sf_admin_actions">
      <li><?php echo submit_tag(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
    <li><?php echo button_to(__('Legajos'), 'legajopedagogico?action=verLegajo&aid='.$alumno_id.'&cid='.$legajo_categoria_id, array (
  'class' => 'sf_admin_action_list',
)) ?></li>
</ul>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($legajopedagogico->getId()): ?>
<?php echo button_to(__('delete'), 'legajopedagogico/delete?id='.$legajopedagogico->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

</div>

