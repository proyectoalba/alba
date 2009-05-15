<?php use_helper('Javascript')?>
<?php
    $foto = 'nofoto.png';
    $archivo_foto = sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.'alumnos'.DIRECTORY_SEPARATOR.$alumno->getLegajo();
    if (file_exists($archivo_foto . '.png')) {
      $foto = '..'.DIRECTORY_SEPARATOR.'alumnos'.DIRECTORY_SEPARATOR.$alumno->getLegajo();
    }
?>
<div id="foto">
<table>
<tr>
<td>
  <?php echo image_tag($foto, array(
    'width' =>150,
    'class'=>'ajax_link',
    'onClick'=> "Element.show('form_upload')",
    'alt'=>'Foto del alumno / Click para cambiarla',
    'title' => 'Click para cambiarla!',
  ))?>
</td>
<td>
  <div id="indicator" style="display: none;position: relative"></div>
  <div id="form_upload" style="display:none; border:1px solid #ccccff; padding: 10px; width:300px">
  <p>Seleccione una im&aacute;gen</p>
  <?php echo form_remote_tag(array(
      'update' => 'foto',
      'url' => 'alumno/addfoto',
      'loading' => "Element.show('indicator')",
      'complete' => "Element.hide('indicator')",
      'multipart'=>true,
      ))?>
      <?php echo input_hidden_tag('id', $alumno->getId())?>
      <?php echo input_file_tag('archivo');?>
      <br/>
      <?php echo submit_tag('Aceptar')?>
  </form>
  </div>
</td>
</tr>
</table>
</div>
