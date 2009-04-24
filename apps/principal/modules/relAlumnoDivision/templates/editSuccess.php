<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date','Form', 'Javascript') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<?php use_stylesheet('cart') ?>
<div id="sf_admin_container">
<h1><?php echo __('Asignar alumno a grado y secci&oacute;n', array()) ?></h1>
<!-- Filtro Alumnos -->
<?php echo form_remote_tag(array(
    'update'   => 'alumnos',
    'url'      => 'relAlumnoDivision/busqueda',
    'script'    => true
)) ?>
    <div id="filtros_alumnos">Apellido:
        <?php echo input_tag("filtro_nombre_alumnos", '', array ( 'size' => 20, 'class'=>'text' )) ?>
        <?php echo select_tag('filtro_alumnos', options_for_select(array('Todos',  'No Asignados',), 0)) ?>
        <ul class="sf_admin_actions">
            <li><?php echo submit_tag(__('Buscar'), array ( 'class' => 'sf_admin_action_save',)) ?></li>
        </ul>
    </div>
</form>


<!-- Alumnos -->
<div id="alumnos">
<?php include_partial('relAlumnoDivision/listado_alumnos', array('optionsAlumno' => $optionsAlumno)) ?>
</div>


<!-- Filtro Divisiones -->
<br/>
<?php echo form_remote_tag(array( 'update'   => 'divisiones', 'url' => 'relAlumnoDivision/busquedaDivision',  'script'    => true )) ?>
    <div id="filtros_secciones">Divisiones:
        <?php echo input_tag("filtro_nombre_divisiones", '', array ('size' => 20, 'class'=>'text')) ?>

    &nbsp;Orientaci&oacute;n:
  <?php $value = object_select_tag($division, 'getFkOrientacionId', array (
  'related_class' => 'Orientacion',
  'control_name' => 'fk_orientacion_id',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>

    &nbsp;A&ntilde;o: 
  <?php $value = object_select_tag($division, 'getFkAnioId', array (
  'related_class' => 'Anio',
  'control_name' => 'fk_anio_id',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>

    &nbsp;Turno:
  <?php $value = object_select_tag($division, 'getFkTurnoId', array (
  'related_class' => 'Turno',
  'control_name' => 'fk_turno_id',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>


    </div>
        <ul class="sf_admin_actions">
            <li><?php echo submit_tag(__('Buscar'), array ( 'class' => 'sf_admin_action_save',)) ?></li>
        </ul>
</form>


<!-- Divisiones-->
<div id="divisiones">
<?php include_partial('relAlumnoDivision/listado_divisiones', array('optionsDivision' => $optionsDivision, 'alumnoDivision' => $alumnoDivision )) ?>
</div>

</div>
