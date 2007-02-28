<?php if(isset($datosCuenta) and $datosCuenta): ?>
<script type="text/javascript">
    function completaDatos() 
    {
        var datosCuenta = new Array()
        datosCuenta [0] = "<?=$datosCuenta->getDireccion()?>"
        datosCuenta [1] = "<?=$datosCuenta->getCiudad()?>"
        datosCuenta [2] = "<?=$datosCuenta->getFkProvinciaId()?>"
        datosCuenta [3] = "<?=$datosCuenta->getCodigoPostal()?>"
        datosCuenta [4] = "<?=$datosCuenta->getTelefono()?>"
        document.getElementsByName("alumno[direccion]")[0].value = datosCuenta[0]
        document.getElementsByName("alumno[ciudad]")[0].value = datosCuenta[1]
        document.getElementsByName("alumno[fk_provincia_id]")[0].value = datosCuenta[2]
        document.getElementsByName("alumno[codigo_postal]")[0].value = datosCuenta[3]
        document.getElementsByName("alumno[telefono]")[0].value = datosCuenta[4]
    }
</script>
<?php endif;?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<h1><?php echo __(' ',array()) ?></h1>
<div id="sf_admin_container">
    <div id="sf_admin_header">
        <?php include_partial('alumno/edit_header', array('alumno' => $alumno)) ?>
    </div>

<div id="sf_admin_content">
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

    <?php echo form_tag('alumno/edit', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>
        <?php echo object_input_hidden_tag($alumno, 'getId') ?>

        <fieldset id="sf_fieldset_informacion_general" class="">
            <h2><?php echo __('Informacion general') ?></h2>

            <div class="form-row">
              <?php echo label_for('alumno[apellido]', __('Apellido:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{apellido}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{apellido}')): ?>
                <?php echo form_error('alumno{apellido}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_tag($alumno, 'getApellido', array (
              'size' => 64,
              'control_name' => 'alumno[apellido]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[nombre]', __('Nombres:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{nombre}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{nombre}')): ?>
                <?php echo form_error('alumno{nombre}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_tag($alumno, 'getNombre', array (
              'size' => 64,
              'control_name' => 'alumno[nombre]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[sexo]', __('Sexo:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{sexo}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{sexo}')): ?>
                <?php echo form_error('alumno{sexo}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo include_partial('sexo', array('type' => 'edit', 'alumno' => $alumno)) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[fk_tipodocumento_id]', __('Tipo de Documento:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{fk_tipodocumento_id}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{fk_tipodocumento_id}')): ?>
                <?php echo form_error('alumno{fk_tipodocumento_id}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_select_tag($alumno, 'getFkTipodocumentoId', array (
              'related_class' => 'Tipodocumento',
              'control_name' => 'alumno[fk_tipodocumento_id]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[nro_documento]', __('Nro. Documento:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{nro_documento}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{nro_documento}')): ?>
                <?php echo form_error('alumno{nro_documento}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_tag($alumno, 'getNroDocumento', array (
              'size' => 16,
              'control_name' => 'alumno[nro_documento]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[lugar_nacimiento]', __('Lugar de Nacimiento:'), '') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{lugar_nacimiento}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{lugar_nacimiento}')): ?>
                <?php echo form_error('alumno{lugar_nacimiento}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_tag($alumno, 'getLugarNacimiento', array (
              'size' => 20,
              'control_name' => 'alumno[lugar_nacimiento]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[fecha_nacimiento]', __('Fecha Nacimiento:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{fecha_nacimiento}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{fecha_nacimiento}')): ?>
                <?php echo form_error('alumno{fecha_nacimiento}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_date_tag($alumno, 'getFechaNacimiento', array (
              'rich' => true,
              'withtime' => true,
              'calendar_button_img' => sfConfig::get('sf_admin_web_dir').'/images/date.png',
              'control_name' => 'alumno[fecha_nacimiento]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[fk_pais_id]', __('Nacionalidad:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{fk_pais_id}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{fk_pais_id}')): ?>
                <?php echo form_error('alumno{fk_pais_id}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_select_tag($alumno, 'getFkPaisId', array (
              'related_class' => 'Pais',
              'control_name' => 'alumno[fk_pais_id]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[email]', __('Email:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{email}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{email}')): ?>
                <?php echo form_error('alumno{email}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_tag($alumno, 'getEmail', array (
              'size' => 64,
              'control_name' => 'alumno[email]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[activo]', __('¿Est&aacute; activo?:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{activo}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{activo}')): ?>
                <?php echo form_error('alumno{activo}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_checkbox_tag($alumno, 'getActivo', array (
              'control_name' => 'alumno[activo]',
            )) ?>
                </div>
            </div>

        </fieldset>
        <fieldset id="sf_fieldset_donde_vive" class="">
            <h2><?php echo __('Donde vive') ?></h2>
            <br>
            <?php
                if(isset($datosCuenta) and $datosCuenta) {
                    echo button_to("Cargar datos de la cuenta", "#", array("class" => "sf_admin_action_sava", "onClick" => "javascript:completaDatos()"));
               }
            ?>

            <div class="form-row">
              <?php echo label_for('alumno[direccion]', __('Direcci&oacute;n:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{direccion}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{direccion}')): ?>
                <?php echo form_error('alumno{direccion}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_tag($alumno, 'getDireccion', array (
              'size' => 64,
              'control_name' => 'alumno[direccion]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[ciudad]', __('Ciudad:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{ciudad}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{ciudad}')): ?>
                <?php echo form_error('alumno{ciudad}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_tag($alumno, 'getCiudad', array (
              'size' => 64,
              'control_name' => 'alumno[ciudad]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[fk_provincia_id]', __('Provincia:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{fk_provincia_id}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{fk_provincia_id}')): ?>
                <?php echo form_error('alumno{fk_provincia_id}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_select_tag($alumno, 'getFkProvinciaId', array (
              'related_class' => 'Provincia',
              'control_name' => 'alumno[fk_provincia_id]',
              'include_custom' => '>>Seleccione una Provincia<<',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[codigo_postal]', __('CP:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{codigo_postal}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{codigo_postal}')): ?>
                <?php echo form_error('alumno{codigo_postal}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_tag($alumno, 'getCodigoPostal', array (
              'size' => 20,
              'control_name' => 'alumno[codigo_postal]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[telefono]', __('Tel&eacute;fono:'), '') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{telefono}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{telefono}')): ?>
                <?php echo form_error('alumno{telefono}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_tag($alumno, 'getTelefono', array (
              'size' => 20,
              'control_name' => 'alumno[telefono]',
            )) ?>
                </div>
            </div>

        </fieldset>
        <fieldset id="sf_fieldset_prioridades" class="">
            <h2><?php echo __('Prioridades') ?></h2>

            <div class="form-row">
              <?php echo label_for('alumno[distancia_escuela]', __('Distancia de la escuela (cuadras):'), '') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{distancia_escuela}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{distancia_escuela}')): ?>
                <?php echo form_error('alumno{distancia_escuela}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_tag($alumno, 'getDistanciaEscuela', array (
              'size' => 7,
              'control_name' => 'alumno[distancia_escuela]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[hermanos_escuela]', __('¿Hermanos en la escuela?:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{hermanos_escuela}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{hermanos_escuela}')): ?>
                <?php echo form_error('alumno{hermanos_escuela}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_checkbox_tag($alumno, 'getHermanosEscuela', array (
              'control_name' => 'alumno[hermanos_escuela]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
              <?php echo label_for('alumno[hijo_maestro_escuela]', __('¿Alguno de sus padres es Maestro?:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{hijo_maestro_escuela}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{hijo_maestro_escuela}')): ?>
                <?php echo form_error('alumno{hijo_maestro_escuela}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_checkbox_tag($alumno, 'getHijoMaestroEscuela', array (
              'control_name' => 'alumno[hijo_maestro_escuela]',
            )) ?>
                </div>
            </div>

        </fieldset>
        <fieldset id="sf_fieldset_otros" class="">
            <h2><?php echo __('Otros') ?></h2>

            <div class="form-row">
              <?php echo label_for('alumno[certificado_medico]', __('Trajo el certificado m&eacute;dico?:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('alumno{certificado_medico}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('alumno{certificado_medico}')): ?>
                <?php echo form_error('alumno{certificado_medico}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_checkbox_tag($alumno, 'getCertificadoMedico', array (
              'control_name' => 'alumno[certificado_medico]',
            )) ?>
                </div>
            </div>

            <div class="form-row">
                <?php echo label_for('alumno[fk_cuenta_id]', __('Cuenta:'), 'class="required" ') ?>
                <div class="content<?php if ($sf_request->hasError('alumno{fk_cuenta_id}')): ?> form-error<?php endif; ?>">  
                    <div id="cuenta">
                        <?php if($alumno->getFkCuentaId()) { ?>
                            <?php echo include_partial('verCuenta', array('cuenta_nombre' => $alumno->getCuenta()->getNombre(), 'cuenta_id' => $alumno->getCuenta()->getId()) ); ?>
                        <?php } else { ?>
                            <?php echo include_partial('buscarCuenta'); ?>  
                        <? } ?>
                    </div>
                </div>
                <br><?php echo link_to_remote('Nueva Cuenta', array('update' => 'nueva_cuenta', 'url' => 'alumno/nuevaCuenta?vista=noMuestraMenu' )); ?>
            </div>

        </fieldset>

        <?php echo include_partial('edit_actions', array('alumno' => $alumno)) ?>

    </form>

    <ul class="sf_admin_actions">
        <li class="float-left"><?php if ($alumno->getId()): ?>
        <?php echo button_to(__('delete'), 'alumno/delete?id='.$alumno->getId(), array (
          'post' => true,
          'confirm' => __('Are you sure?'),
          'class' => 'sf_admin_action_delete',
        )) ?><?php endif; ?>
        </li>
    </ul>
    </div>

    <div id="sf_admin_footer">
    <?php include_partial('alumno/edit_footer', array('alumno' => $alumno)) ?>
    </div>
    <div id="nueva_cuenta"></div>  
</div>
