<?php if ($sf_user->isAuthenticated()): ?>
  <div align="center">
  <h1>&iexcl;Bienvenidos al Sistema Libre de Gesti&oacute;n Educativa ALBA!</h1>
  <h3>Versi&oacute;n <?php echo link_to(sfConfig::get("app_alba_version"),"http://www.proyectoalba.com.ar/",array('title'=> 'Comprobar Versi&oacute;n...')) ?><h3>
  </div>
  <br/>
  <div align="center">
  El Proyecto Alba, es un proyecto de desarrollo de Software para la realizaci&oacute;n de un<br><b>&quot;Sistema Libre de Gesti&oacute;n Educativa&quot;</b>
  </div>
  <br>
  <br>
  <table align="center">
      <tr>
          <td>
              <?php echo image_tag("gnu-head-banner.png");?>
          </td>
          <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </td>
          <td>
              &Eacute;ste aplicativo es <b><a href="http://es.wikipedia.org/wiki/Software_Libre">Software Libre</a></b>, de acuerdo con tal definici&oacute;n, el software es <b>"libre"</b> si garantiza las siguientes libertades:
              <ul>
                  <li><b>"libertad 0"</b>, ejecutar el programa con cualquier prop&oacute;sito (privado, educativo, p&uacute;blico, comercial, etc.)</li>
                  <li><b>"libertad 1"</b>, estudiar y modificar el programa (para lo cual es necesario poder acceder al c&oacute;digo fuente)</li>
                  <li><b>"libertad 2"</b>, copiar el programa de manera que se pueda ayudar al vecino o a cualquiera</li>
                  <li><b>"libertad 3"</b>, mejorar el programa, y hacer p&uacute;blicas las mejoras, de forma que se beneficie toda la comunidad.</li>
              </ul>
          </td>
      </tr>
  </table>

  <br>
  <br>

  <table align="center">
      <tr>
          <td>
              <?php echo image_tag("bug.jpg");?>
          </td>
          <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </td>
          <td>
              Como est&aacute; en continuo desarrollo, puede encontrar errores que todav&iacute;a no han sido descubiertos. <br>
              Si encuentra alguno, por favor rep&oacute;rtelo en nuestro sitio de seguimientos de errores: <b><a target="_blank" href="http://alba.pressenter.com.ar">http://alba.pressenter.com.ar</a></b>
              <br/>
          </td>
      </tr>

      <tr>
          <td>

          </td>
          <td>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </td>
          <td>
              <i>Para m&aacute;s informaci&oacute;n visite el Sitio Web del Proyecto Alba. <b><a href="http://www.proyectoalba.com.ar">P&aacute;gina Web del Proyecto.</a></b></i>
          </td>
      </tr>

  </table>
  <?php if (sfConfig::get('sf_debug')):?>
  <ul>
      <li>Informaci&oacute;n del Sistema
          <ul>
              <li>PHP: <?php echo phpversion()?></li>
          </ul>
      </li>
      <li>Roles:
        <ul>
          <?php foreach ($sf_user->getAttribute('roles') as $rol):?>
          <li><?php printf("[%d] %s",$rol['id'],$rol['nombre'])?></li>
          <?php endforeach;?>
        </ul>
      </li>
      <li>Permisos efectivos:
          <ul>
          <?php foreach ($sf_user->listCredentials() as $permiso):?>
          <li><?php echo $permiso?></li>
          <?php endforeach;?>
          </ul>
      </li>
      <li>Establecimientos:
          <ul>
              <?php $establecimientos = $sf_user->getEstablecimientos()?>
              <?php foreach ($establecimientos as $establecimiento): ?>
                  <li><?php echo $establecimiento?></li>
              <?php endforeach; ?>
          </ul>
      </li>
      <li>Organizaci&oacute;n
          <ul>
              <?php echo "[" .$sf_user->getAttribute('fk_organizacion_id'). "] " . $sf_user->getAttribute('organizacion_nombre')?>
          </ul>
      </li>
      <li>Tema (interfaz):
          <ul>
              <?php echo $sf_user->getTheme()?>
          </ul>
      </li>
  </ul>
  <?php endif;?>

<?php endif; ?>
