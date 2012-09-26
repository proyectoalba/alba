<div id="sf_admin_content">
  <h1>Recuperaci&oacute;n de clave del usuario: <?php echo $usuario->getUsuario() ?></h1>
  <div id="sf_admin_container">
  <?php include_partial('global/flashes')?>
    <p>Ingrese la respuesta de su pregunta secreta a continuaci&oacute;n:</p>
    <form name="pregunta" method="post" action="<?php echo url_for('seguridad/pregunta') ?>">
      <?php echo $form->renderHiddenFields()?>
      <input type="hidden" name="comprobar" value="1"/>
      <table>
        <tr>
          <th><label for="pregunta">Pregunta:</label></th>
          <td><span id="pregunta"><?php echo $usuario->getSeguridadPregunta() ?></span></td>
        </tr>
        <?php echo $form ?>
      </table>
      <input type="submit" name="enviar" value="Enviar nueva clave por correo electr&oacute;nico"/>
    </form>
  </div>
</div>

