<?php 

    use_helper('I18N','Object','Validation'); 
    $hora_fin = "";
    $hora_inicio = "";
    $seleccion_4 = true;
    $seleccion_5 = $seleccion_6 = $seleccion_7 = $hora_asociada = $activar_repeticion = false;
    $mostrar_div_anual = $mostrar_div_mensual = $mostrar_div_semana = $mostrar_div_diaria = "display:none";
    $recurrencia_fin_fecha  = '';
    $recurrencia_fin_repeticion = '';
    $recurrencia_fin_0 = true;
    $recurrencia_fin_1 = false;
    $recurrencia_fin_2 = false;
    $numero_binario = "0000000";
    
    if($evento->getId()) {
        $hora_inicio = date( "H:i" , strtotime($evento->getFechaInicio()));
        $hora_fin = date( "H:i" , strtotime($evento->getFechaFin()));

        if($hora_inicio == "00:00" AND $hora_fin == "00:00")  {
            $hora_asociada = false;
        } else {
            $hora_asociada = true;
        }
	
        switch($evento->getFrecuencia()) {
            case '0': $activar_repeticion = false; break;
            case '4': $activar_repeticion = true; $seleccion_4 = true; $seleccion_5 = $seleccion_6 = $seleccion_7 = false; $mostrar_div_diaria = ""; break;
            case '5': $activar_repeticion = true; $seleccion_5 = true; $seleccion_4 = $seleccion_6 = $seleccion_7 = false; $mostrar_div_semana = ""; break;
            case '6': $activar_repeticion = true; $seleccion_6 = true; $seleccion_5 = $seleccion_4 = $seleccion_7 = false; $mostrar_div_mensual = ""; break;
            case '7': $activar_repeticion = true; $seleccion_7 = true; $seleccion_5 = $seleccion_6 = $seleccion_4 = false; $mostrar_div_anual = ""; break;
        }
        
        
        if($evento->getRecurrenciaFin() != "") {
            if(is_numeric($evento->getRecurrenciaFin())) {
                $recurrencia_fin_fecha  = '';
                $recurrencia_fin_repeticion = $evento->getRecurrenciaFin();            
                $recurrencia_fin_2 = $recurrencia_fin_0 = false;
                $recurrencia_fin_1 = true;
            } else {
//                 $dateFormat = new sfDateFormat($sf_user->getCulture());
//                 $value = $dateFormat->format($evento->getRecurrenciaFin()." 00:00:00", 'I', $dateFormat->getInputPattern('g'));
                $value = $evento->getRecurrenciaFin();
                $recurrencia_fin_fecha  = $value;
                $recurrencia_fin_repeticion = '';            
                $recurrencia_fin_2 = true;
                $recurrencia_fin_0 = $recurrencia_fin_1 = false;
            }
        } 
            

             $numero_binario = str_pad(decbin($evento->getRecurrenciaDias()), 7, "0", STR_PAD_LEFT);
        


    }
	else { //esto es un parche para que funcione el check de hora asociada
		// esta logica tiene que ir en la logica de un component
		// y hay que modiicar las incluciones de esto que ahora son 
		// include_partial a getComponent
	if ($evento_tmp = $sf_request->getParameter('evento')) {
		if (isset($evento_tmp['hora_asociada']))
			$hora_asociada = $evento_tmp['hora_asociada'];
		if (isset($evento_tmp['activar_repeticion']))
			$activar_repeticion = $evento_tmp['activar_repeticion'];
	}
	}
?>

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
            HabilitaDeshabilitaRangoFrecuencia('evento_recurrencia_fin_repeticion');
        }

        if(document.getElementById('evento_recurrencia_fin_tipo_2').disabled == false && document.getElementById('evento_recurrencia_fin_tipo_2').checked == true) {
            HabilitaDeshabilitaRangoFrecuencia('evento_recurrencia_fin_fecha');
        }

    }

    
    function HabilitaDeshabilitaRangoFrecuencia(element) {
        deshabilitaRangoFrecuencia();
        document.getElementById(element).disabled=false;
    }

    function deshabilitaRangoFrecuencia() {
        document.getElementById('evento_recurrencia_fin_repeticion').disabled=true;
        document.getElementById('evento_recurrencia_fin_fecha').disabled=true;
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

        if(element == 'diaria') {
            document.getElementById('evento_frecuencia_intervalo_diaria').disabled = false;
            document.getElementById('evento_frecuencia_intervalo_semana').disabled = true; 
        } 

        if(element == 'semana') {
            document.getElementById('evento_frecuencia_intervalo_diaria').disabled = true;
            document.getElementById('evento_frecuencia_intervalo_semana').disabled = false;
        }

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
<!-- <h1>Evento </h1> -->
<!--
 <?php if ($sf_request->hasErrors()): ?>
    <div class="form-errors">
        <h2><?php echo __('There are some errors that prevent the form to validate') ?></h2>
        <ul>
            <?php foreach ($sf_request->getErrorNames() as $name): ?>
              <li><?php echo $sf_request->getError($name) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php elseif ($sf_user->hasFlash('notice')): ?>
    <div class="save-ok">
        <h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
    </div>
    <?php endif; ?>


<?php echo form_tag('evento/edit', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>
-->
<fieldset id="sf_fieldset_index" class="">
<!--
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
-->
            <h2><?php echo __('Fecha y Hora') ?></h2>

             <div class="form-row">
              <?php echo label_for('evento[fecha_inicio]', __('Inicio:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('evento{fecha_inicio}') OR $sf_request->hasError('evento{hora_inicio}') ): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('evento{fecha_inicio}')): ?>
                <?php echo form_error('evento{fecha_inicio}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>
              
               <?php if ($sf_request->hasError('evento{hora_inicio}')): ?>
                <?php echo form_error('evento{hora_inicio}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              

              <?php echo object_input_date_tag($evento, 'getFechaInicio', array (
              'rich' => true,
//              'withtime' => true,
              'calendar_button_img' => sfConfig::get('sf_admin_web_dir').'/images/date.png',
              'control_name' => 'evento[fecha_inicio]',
            )) ?>
                &nbsp;&nbsp;&nbsp;
                <?php include_partial('evento/hora_inicio', array ('evento' => $evento,  'hora_inicio' => $hora_inicio, 'hora_asociada' => $hora_asociada ));?>
                </div>
            </div>


             <div class="form-row">
              <?php echo label_for('evento[fecha_fin]', __('Fin:'), 'class="required" ') ?>

              <div class="content<?php if ($sf_request->hasError('evento{fecha_fin}') OR $sf_request->hasError('evento{hora_fin}')): ?> form-error<?php endif; ?>">

              <?php if ($sf_request->hasError('evento{fecha_fin}')): ?>
                <?php echo form_error('evento{fecha_fin}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php if ($sf_request->hasError('evento{hora_fin}')): ?>
                <?php echo form_error('evento{hora_fin}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>


              <?php echo object_input_date_tag($evento, 'getFechaFin', array (
              'rich' => true,
//              'withtime' => true,
              'calendar_button_img' => sfConfig::get('sf_admin_web_dir').'/images/date.png',
              'control_name' => 'evento[fecha_fin]',
            )) ?>
                &nbsp;&nbsp;&nbsp;
                <?php include_partial('evento/hora_fin', array ('evento' => $evento, 'hora_fin' => $hora_fin, 'hora_asociada' => $hora_asociada ));?>
                </div>
             </div>
            
        <div class="form-row">
            <?php echo label_for('hora_asociada', __('Hora asociada:')) ?>
            <div class="content">
                <?php echo checkbox_tag('evento[hora_asociada]', 1, $hora_asociada , array('onChange'=>'javascrip:HabilitaDeshabilitaHora();')) ?>                
            </div>
        </div>


        
        <br>
        
        <h2>
        <?php echo __('Activar Repetición') ?>
        <?php echo checkbox_tag('evento[activar_repeticion]', 1, $activar_repeticion, array('onChange'=>'javascrip:HabilitaDeshabilitaRepeticion();')) ?>                
        </h2>       
        
        <h4>Regla de recurrencia</h4>
        
        <div class="form-row">
        <?php echo radiobutton_tag('evento[frecuencia][]', '4', $seleccion_4, array('disabled' => !$activar_repeticion, 'onChange' => 'javascript:mostrarRegla(\'diaria\')') ) ?>Diaria&nbsp;&nbsp;
        <?php echo radiobutton_tag('evento[frecuencia][]', '5', $seleccion_5, array('disabled' => !$activar_repeticion, 'onChange' => 'javascript:mostrarRegla(\'semana\')')) ?>Semanal&nbsp;&nbsp;
        <?php echo radiobutton_tag('evento[frecuencia][]', '6', $seleccion_6, array('disabled' => !$activar_repeticion, 'onChange' => 'javascript:mostrarRegla(\'mensual\')')) ?>Mensual&nbsp;&nbsp;
        <?php echo radiobutton_tag('evento[frecuencia][]', '7', $seleccion_7, array('disabled' => !$activar_repeticion, 'onChange' => 'javascript:mostrarRegla(\'anual\')')) ?>Anual&nbsp;&nbsp;
        </div>

        <div class="form-row" id="diaria" style="<?php echo $mostrar_div_diaria; ?>">
            Repetir cada <?php echo object_input_tag($evento, 'getFrecuenciaIntervalo', array('disabled' => !$seleccion_4, 'maxlength' => 3, 'size' => 3, 'control_name' => 'evento[frecuencia_intervalo_diaria]' )); ?> d&iacute;a(s)
        </div>

        <div class="form-row" id="semana" style="<?php echo $mostrar_div_semana?>">
            Repetir cada <?php echo object_input_tag($evento, 'getFrecuenciaIntervalo', array('disabled' => !$seleccion_5, 'maxlength' => 3, 'size' => 3, 'control_name' => 'evento[frecuencia_intervalo_semana]')); ?> semana(s)<br><br>

            <?php echo checkbox_tag('evento[recurrencia_dias][]', '0', ($numero_binario[6])?true:false, array('disabled' => !$seleccion_5) ) ?>Domingo&nbsp;&nbsp;
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '1', ($numero_binario[5])?true:false, array('disabled' => !$seleccion_5) ) ?>Lunes&nbsp;&nbsp;
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '2', ($numero_binario[4])?true:false, array('disabled' => !$seleccion_5) ) ?>Martes&nbsp;&nbsp;
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '3', ($numero_binario[3])?true:false, array('disabled' => !$seleccion_5) ) ?>Miercoles&nbsp;&nbsp;
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '4', ($numero_binario[2])?true:false, array('disabled' => !$seleccion_5) ) ?>Jueves&nbsp;&nbsp;
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '5', ($numero_binario[1])?true:false, array('disabled' => !$seleccion_5) ) ?>Viernes&nbsp;&nbsp;
            <?php echo checkbox_tag('evento[recurrencia_dias][]', '6', ($numero_binario[0])?true:false, array('disabled' => !$seleccion_5) ) ?>Sabado&nbsp;&nbsp;
        </div>

        <div class="form-row" id="mensual" style="<?php echo $mostrar_div_mensual?>">
        </div>

        <div class="form-row" id="anual" style="<?php echo $mostrar_div_anual?>">
        </div>


        <h4>Rango de frecuencia</h4>
        <div class="form-row">  
            <?php echo radiobutton_tag('evento[recurrencia_fin_tipo][]', '0', $recurrencia_fin_0, array('disabled' => !$activar_repeticion, 'onClick' => 'javascript:deshabilitaRangoFrecuencia()') ) ?>Sin fecha de Finalizaci&oacute;n&nbsp;&nbsp;<br>
        
            <?php echo radiobutton_tag('evento[recurrencia_fin_tipo][]', '1', $recurrencia_fin_1, array('disabled' => !$activar_repeticion, 'onClick' => 'javascript:HabilitaDeshabilitaRangoFrecuencia(\'evento_recurrencia_fin_repeticion\')') ) ?>Terminar despu&eacute;s de 
            <?php echo input_tag('evento[recurrencia_fin_repeticion]', $recurrencia_fin_repeticion, array('disabled' => !$activar_repeticion, 'maxlength' => 4, 'size' => 4 )) ?>veces.<br>

            <?php echo radiobutton_tag('evento[recurrencia_fin_tipo][]', '2', $recurrencia_fin_2, array('disabled' => !$activar_repeticion, 'onClick' => 'javascript:HabilitaDeshabilitaRangoFrecuencia(\'evento_recurrencia_fin_fecha\')') ) ?>Terminar el:&nbsp;&nbsp;
            <?php echo input_date_tag('evento[recurrencia_fin_fecha]', $recurrencia_fin_fecha, array ( 'rich' => true, 'calendar_button_img' => sfConfig::get('sf_admin_web_dir').'/images/date.png',
              'control_name' => 'evento[recurrencia_fin_fecha]', 'disabled' => !$activar_repeticion
            )) ?><br>

        </div>

        <?php echo object_input_hidden_tag($evento, 'getId', array ('control_name' => 'id_evento') ) ?>
</fieldset>

<!--
<ul class="sf_admin_actions">
  <li><?php echo submit_tag(__('Grabar'), array (
  'name' => 'Grabar',
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>

</form> -->
</div>