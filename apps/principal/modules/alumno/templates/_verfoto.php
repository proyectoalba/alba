<?php use_helper('Javascript')?>

<script language="Javascript">
	function startUpload(){

      document.getElementById('foto').innerHTML =
      '<?php echo image_tag('medium/ajax_loading.gif', array('title'=>'Cargando...','alt'=>'Cargando', 'width'=>150))?>';
      return true;
    }

	function stopUpload(success, msg){
    	var result = '';
      	if (success == 1){
			document.getElementById('foto').innerHTML = msg;
			document.getElementById('form_upload').style.visibility = 'hidden';
      	}
      	else {
      		document.getElementById('result').innerHTML =
      		'<span class="error">Error al subir el archivo!<\/span><br/>' +msg+ '<br/>';
      		document.getElementById('foto').innerHTML='';
      	}
      	return true;
	}
</script>
<style>
	form .ajax_upload{
	  	text-align:center;
	  	width:390px;
	  	margin:0px;
	  	padding:5px;
	  	background-color:#fff;
	  	border:1px solid #ccc;
	  }
</style>
<?php if (sfConfig::get('sf_debug')):?>
	<p>Ajax Upload debug!</p>
	<iframe id ="framefoto" name="framefoto" src="#" style="width:600px;border:1px solid #ff0000;"></iframe>
<?php else:?>
	<iframe id ="framefoto" name="framefoto" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
<?php endif;?>
<div id="foto" style="">
	<?php echo image_tag($foto, array(
  		'width' =>150,
		'class'=>'ajax_link',
		'onClick'=> "Element.show('form_upload')",
		'alt'=>'Foto del alumno / Click para cambiarla',
		'title' => 'Click para cambiarla!',
	))?>
</div>
<div id="result"></div>
<div id="form_upload" style="display:none; border:1px solid #ccccff; padding: 10px; width:300px">
  <p>Seleccione una im&aacute;gen</p>
	<?php echo form_tag('alumno/addfoto',array(
		'multipart' => true,
		'target' => 'framefoto',
		'onSubmit' => 'startUpload()',
		'class' =>'ajax_upload',
	))?>
  		<?php echo input_hidden_tag('id', $alumno->getId())?>
  		<?php echo input_file_tag('archivo');?>
  		<br/>
  		<?php echo submit_tag('Aceptar')?>
	</form>
</div>
