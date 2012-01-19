<?php
/*
 * Created on 15/05/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($result) {
	$result_msg =  addslashes(image_tag('../uploads/alumnos/' .$alumno->getLegajo(), array(
  		'width' =>150,
		'class'=>'ajax_link',
		'onClick'=> "Element.show('form_upload')",
		'alt'=>'Foto del alumno / Click para cambiarla:' . $alumno->getLegajo(),
		'title' => 'Click para cambiarla!',
	)));

	$result_msg = image_tag('../uploads/alumnos/' .$alumno->getLegajo() .'.png', array(
  		'width' =>150,
    ));
}
?>
<div id="script-stop">
<script language="javascript" type="text/javascript">
	window.top.window.stopUpload(<?php echo $result?>, '<?php echo $result_msg?>');
</script>
</div>

