<?php use_helper('I18N','Object') ?>

<script type="text/javascript">
    function cambiarDeEstado(element) {
        if (document.getElementById(element).disabled == true)
            document.getElementById(element).disabled=false;
        else
            document.getElementById(element).disabled=true;
    }


    function HabilitaDeshabilitaHora() {
        cambiarDeEstado('evento_hora_inicio_hour');
        cambiarDeEstado('evento_hora_inicio_minute');
        cambiarDeEstado('evento_hora_inicio_ampm');
        cambiarDeEstado('evento_hora_fin_hour');
        cambiarDeEstado('evento_hora_fin_minute');
        cambiarDeEstado('evento_hora_fin_ampm');
    }


    function HabilitaDeshabilitaRepeticion() {
        cambiarDeEstado('evento_frecuencia_7');
        cambiarDeEstado('evento_frecuencia_6');
        cambiarDeEstado('evento_frecuencia_5');
        cambiarDeEstado('evento_frecuencia_4');
        cambiarDeEstado('evento_recurrencia_fin_tipo_0');
        cambiarDeEstado('evento_recurrencia_fin_tipo_1');
        cambiarDeEstado('evento_recurrencia_fin_tipo_2');
        deshabilitaRangoFrecuencia();
        deshabilitaReglas();

        if(document.getElementById('evento_frecuencia_7').disabled == false && document.getElementById('evento_frecuencia_7').checked == true) {
            mostrarRegla('anual');
        }

        if(document.getElementById('evento_frecuencia_6').disabled == false && document.getElementById('evento_frecuencia_6').checked == true) {
            mostrarRegla('mensual');
        }

        if(document.getElementById('evento_frecuencia_5').disabled == false && document.getElementById('evento_frecuencia_5').checked == true) {
            mostrarRegla('semana');
        }

        if(document.getElementById('evento_frecuencia_4').disabled == false && document.getElementById('evento_frecuencia_4').checked == true) {
            mostrarRegla('diaria');
        }

        if(document.getElementById('evento_recurrencia_fin_tipo_1').disabled == false && document.getElementById('evento_recurrencia_fin_tipo_1').checked == true) {
            HabilitaDeshabilitaRangoFrecuencia('evento_frecuencia_fin_repeticion');
        }

        if(document.getElementById('evento_recurrencia_fin_tipo_2').disabled == false && document.getElementById('evento_recurrencia_fin_tipo_2').checked == true) {
            HabilitaDeshabilitaRangoFrecuencia('evento_frecuencia_fin_fecha');
        }

    }

    
    function HabilitaDeshabilitaRangoFrecuencia(element) {
        deshabilitaRangoFrecuencia();
        document.getElementById(element).disabled=false;
    }

    function deshabilitaRangoFrecuencia() {
        document.getElementById('evento_frecuencia_fin_repeticion').disabled=true;
        document.getElementById('evento_frecuencia_fin_fecha').disabled=true;
    }

    function mostrarRegla(element) {
        deshabilitaReglas();
        document.getElementById(element).style.display = '';
        document.getElementById('evento_recurrencia_dias_0').disabled = false;
        document.getElementById('evento_recurrencia_dias_1').disabled = false;
        document.getElementById('evento_recurrencia_dias_2').disabled = false;
        document.getElementById('evento_recurrencia_dias_3').disabled = false;
        document.getElementById('evento_recurrencia_dias_4').disabled = false;
        document.getElementById('evento_recurrencia_dias_5').disabled = false;
        document.getElementById('evento_recurrencia_dias_6').disabled = false;
        document.getElementById('evento_frecuencia_intervalo_diaria').disabled = false;
        document.getElementById('evento_frecuencia_intervalo_semana').disabled = false; 
    }

    function deshabilitaReglas() {
        document.getElementById('anual').style.display = 'none';
        document.getElementById('mensual').style.display = 'none';
        document.getElementById('semana').style.display = 'none';
        document.getElementById('diaria').style.display = 'none';

        document.getElementById('evento_recurrencia_dias_0').disabled = true;
        document.getElementById('evento_recurrencia_dias_1').disabled = true;
        document.getElementById('evento_recurrencia_dias_2').disabled = true;
        document.getElementById('evento_recurrencia_dias_3').disabled = true;
        document.getElementById('evento_recurrencia_dias_4').disabled = true;
        document.getElementById('evento_recurrencia_dias_5').disabled = true;
        document.getElementById('evento_recurrencia_dias_6').disabled = true;
        document.getElementById('evento_frecuencia_intervalo_diaria').disabled = true;
        document.getElementById('evento_frecuencia_intervalo_semana').disabled = true;
    }   


</script>

<div id="sf_admin_container">
<h1>Evento </h1>

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


<?php echo form_tag('evento/edit', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

<fieldset id="sf_fieldset_index" class="">

            <div class="form-row">
              <?php echo label_for('evento[titulo]', __('Titulo:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('evento{titulo}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('evento{titulo}')): ?>
                <?php echo form_error('evento{titulo}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_tag($evento, 'getTitulo', array (
              'size' => 64,
              'control_name' => 'evento[titulo]',
            )) ?>
                </div>
            </div>

            <h2><?php echo __('Fecha y Hora') ?></h2>

             <div class="form-row">
              <?php echo label_for('evento[fecha_inicio]', __('Inicio:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('evento{fecha_inicio}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('evento{fecha_inicio}')): ?>
                <?php echo form_error('evento{fecha_inicio}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_date_tag($evento, 'getFechaInicio', array (
              'rich' => true,
//              'withtime' => true,
              'calendar_button_img' => sfConfig::get('sf_admin_web_dir').'/images/date.png',
              'control_name' => 'evento[fecha_inicio]',
            )) ?>
                &nbsp;&nbsp;&nbsp;
                <?php include_partial('hora_inicio', array ('evento' => $evento));?>
                </div>
            </div>


             <div class="form-row">
              <?php echo label_for('evento[fecha_fin]', __('Fin:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('evento{fecha_fin}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('evento{fecha_fin}')): ?>
                <?php echo form_error('evento{fecha_fin}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php echo object_input_date_tag($evento, 'getFechaFin', array (
              'rich' => true,
//              'withtime' => true,
              'calendar_button_img' => sfConfig::get('sf_admin_web_dir').'/images/date.png',
              'control_name' => 'evento[fecha_fin]',
            )) ?>
                &nbsp;&nbsp;&nbsp;
                <?php include_partial('hora_fin', array ('evento' => $evento));?>
                </div>
             </div>
            
        <div class="form-row">
            <?php echo label_for('hora_asociada', __('Hora asociada:')) ?>
            <div class="content">
                <?php echo checkbox_tag('evento[hora_asociada]', 1, false, array('onChange'=>'javascrip:HabilitaDeshabilitaHora();')) ?>                
            </div>
        </div>


        
        <br>
        
        <h2>
        <?php echo __('Activar Repetición') ?>
        <?php echo checkbox_tag('evento[activar]', 1, false, array('onChange'=>'javascrip:HabilitaDeshabilitaRepeticion();')) ?>                
        </h2>       
        
        <h4>Regla de recurrencia</h4>
        
        <div class="form-row">
        <?php echo radiobutton_tag('evento[frecuencia][]', '4', true, array('disabled' => true, 'onChange' => 'javascript:mostrarRegla(\'diaria\')') ) ?>Diaria&nbsp;&nbsp;
        <?php echo radiobutton_tag('evento[frecuencia][]', '5', false, array('disabled' => true, 'onChange' => 'javascript:mostrarRegla(\'semana\')')) ?>Semanal&nbsp;&nbsp;
        <?php echo radiobutton_tag('evento[frecuencia][]', '6', false, array('disabled' => true, 'onChange' => 'javascript:mostrarRegla(\'mensual\')')) ?>Mensual&nbsp;&nbsp;
        <?php echo radiobutton_tag('evento[frecuencia][]', '7', false, array('disabled' => true, 'onChange' => 'javascript:mostrarRegla(\'anual\')')) ?>Anual&nbsp;&nbsp;
        </div>

        <div class="form-row" id="diaria" style="display:none">
            Repetir cada <?php echo input_tag('evento[frecuencia_intervalo_diaria]', '1', array('disabled' => true, 'maxlength' => 3, 'size' => 3 )) ?>  d&iacute;a(s)
        </div>

        <div class="form-row" id="semana" style="display:none">
            Repetir cada <?php echo input_tag('evento[frecuencia_intervalo_semana]', '1', array('disabled' => true, 'maxlength' => 2, 'size' => 2 )) ?> semana(s)<br><br>
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '0', false, array('disabled' => true) ) ?>Domingo&nbsp;&nbsp;
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '1', false, array('disabled' => true) ) ?>Lunes&nbsp;&nbsp;
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '2', false, array('disabled' => true) ) ?>Martes&nbsp;&nbsp;
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '3', false, array('disabled' => true) ) ?>Miercoles&nbsp;&nbsp;
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '4', false, array('disabled' => true) ) ?>Jueves&nbsp;&nbsp;
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '5', false, array('disabled' => true) ) ?>Viernes&nbsp;&nbsp;
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '6', false, array('disabled' => true) ) ?>Sabado&nbsp;&nbsp;
        </div>

        <div class="form-row" id="mensual" style="display:none">
        </div>

        <div class="form-row" id="anual" style="display:none">
        </div>


        <h4>Rango de frecuencia</h4>
        <div class="form-row">  
            <?php echo radiobutton_tag('evento[recurrencia_fin_tipo][]', '0', true, array('disabled' => true, 'onClick' => 'javascript:deshabilitaRangoFrecuencia()') ) ?>Sin fecha de Finalizaci&oacute;n&nbsp;&nbsp;<br>
        
            <?php echo radiobutton_tag('evento[recurrencia_fin_tipo][]', '1', false, array('disabled' => true, 'onClick' => 'javascript:HabilitaDeshabilitaRangoFrecuencia(\'evento_frecuencia_fin_repeticion\')') ) ?>Terminar despues: &nbsp;&nbsp;
            <?php echo input_tag('evento[frecuencia_fin_repeticion]', '1', array('disabled' => true, 'maxlength' => 4, 'size' => 4 )) ?>    <br>

            <?php echo radiobutton_tag('evento[recurrencia_fin_tipo][]', '2', false, array('disabled' => true, 'onClick' => 'javascript:HabilitaDeshabilitaRangoFrecuencia(\'evento_frecuencia_fin_fecha\')') ) ?>Terminar el:&nbsp;&nbsp;
            <?php echo input_date_tag('evento[frecuencia_fin_fecha]', '', array ( 'rich' => true, 'calendar_button_img' => sfConfig::get('sf_admin_web_dir').'/images/date.png',
              'control_name' => 'evento[frecuencia_fin_fecha]', 'disabled' => true
            )) ?><br>

        </div>


</fieldset>


<ul class="sf_admin_actions">
  <li><?php echo submit_tag(__('Grabar'), array (
  'name' => 'Grabar',
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>

</form>
</div>