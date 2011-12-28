<script>
	var my<?php echo sfConfig::get("app_alba_menutheme")?>Base = "<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot() . '/js/jsmenu/themes/' .sfConfig::get("app_alba_menutheme"). '/'?>";
</script>
<script src="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot() . '/js/jsmenu/themes/'.sfConfig::get("app_alba_menutheme").'/theme.js'?>">
</script>

<div id="menu" align="center">
	<ul>
    <li><span></span><a href="#">Administraci&oacute;n</a>
        <ul>
          <li><span></span><a href="#">General</a>
              <ul>
                <li><span></span><?php echo link_to("Definir Organizaci&oacute;n","organizacion/edit?id=1")?></li>
                <li><span></span><?php echo link_to("Definir Establecimiento","establecimiento/index")?></li>
              </ul>
          </li>
          <li><span></span><a href="#">Configuraciones Previas</a>
            <ul>
              <li><span></span><a href="#">Generales</a>
                <ul>
                  <li><span></span><?php echo link_to("Definir Pa&iacute;ses","pais/index")?></li>
                  <li><span></span><?php echo link_to("Definir Provincias",'provincia/index')?></li>
                  <li><span></span><?php echo link_to("Definir Distritos Escolares","distritoescolar/index")?></li>
                  <li><span></span><?php echo link_to("Definir Categor&iacute;a de IVA","tipoiva/index")?></li>
                  <li><span></span><?php echo link_to("Tipo Documento","tipodocumento/index")?></li>
                  <li><span></span><?php echo link_to("Tipo Nivel","tiponivel/index")?></li>
                </ul>
              </li>
              <li><span></span><a href="#">Alumnos</a>
                <ul>
                  <li><span></span><?php echo link_to("Definir Roles de responsables","rolResponsable/index")?></li>
                  <li><span></span><?php echo link_to("Definir tipo de bajas","conceptobaja/index")?></li>
                  <li><span></span><?php echo link_to("Definir tipo de asistencia","tipoasistencia/index")?></li>
                  <li><span></span><?php echo link_to("Definir Escala de notas","escalanota/index")?></li>
                  <li><span></span><?php echo link_to("Definir Estados de alumnos","estadosalumnos/index")?></li>
                  <li><span></span><?php echo link_to("Tipos de entrada al legajo pedag&oacute;gico","legajocategoria/index")?></li>
                  <li><span></span><?php echo link_to("Definir Categor&iacute;as del Bolet&iacute;n de Concepto","concepto/index")?></li>
                </ul>
              </li>
              <li><span></span><a href="#">Docentes</a>
                <ul>
                  <li><span></span><?php echo link_to("Tipos de docentes",'tipodocente/index')?></li>
                  <li><span></span><?php echo link_to("Motivos de baja", "cargobaja/index")?></li>
                </ul>
              </li>
              <li><span></span><a href="#">Calendarios y Horarios</a>
                <ul>
                  <li><span></span><?php echo link_to("Definir Ciclos Lectivos","ciclolectivo/index")?></li>
                  <li><span></span><?php echo link_to("Definir Períodos","ciclolectivo/agregarTurnosYPeriodos/index")?></li>
                  <li><span></span><?php echo link_to("Definir turnos","turno/index")?></li>
                  <li><span></span><?php echo link_to("Tipos de intevalos de horario escolar","horarioescolartipo/index")?></li>
                  <li><span></span><?php echo link_to("Definir feriados del a&ntilde;o","feriado/index")?></li>
                  <li><span></span><?php echo link_to("Calendario de vacunas","calendariovacunacion/index")?></li>
                </ul>
              </li>
              <li><span></span><a href="#">Gesti&oacute;n de Espacios</a>
                <ul>
                  <li><span></span><?php echo link_to("Definir tipos de Locaciones","tipolocacion/index")?></li>
                  <li><span></span><?php echo link_to("Definir tipos de Espacios","tipoespacio/index")?></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><span></span><a href="#">Seguridad</a>
            <ul>
              <li><span></span><?php echo link_to("Usuarios","usuario/index")?></li>
              <li><span></span><?php echo link_to("Roles","rol/index")?></li>
            </ul>
          </li>
      </ul>
    </li>
    <li><span></span><a href="#">Cuentas</a>
      <ul>
        <li><span></span><?php echo link_to("Administrar","cuenta/index")?></li>
        <li><span></span><?php echo link_to("Listar Responsables","responsable/index")?></li>
      </ul>
    </li>
    <li><span></span><a href="#">Alumnos</a>
      <ul>
        <li><span></span><?php echo link_to("Ingresar Nuevo","alumno/create")?></li>
        <li><span></span><?php echo link_to("Listar Todos","alumno/list")?></li>
        <li><span></span><?php echo link_to("Buscar Alumno para...","legajopedagogico/index")?></li>
        <li><span></span><?php echo link_to("Gestionar Asistencias","asistencia/index")?></li>
        <li><span></span><a href="#">Cargar Boletines</a>
          <ul>
            <li><span></span><?php echo link_to("Concepto","boletin/listConcepto")?></li>
            <li><span></span><?php echo link_to("Notas","boletin/list")?></li>
          </ul>
        </li>
        <li><span></span><?php echo link_to("Pasar de a&ntilde;o","ciclolectivo/pasajeAlumnosForm")?></li>
      </ul>
    </li>
    <li><span></span><a href="#">Docentes</a>
      <ul>
        <li><span></span><?php echo link_to("Administrar","docente/index")?></li>
      </ul>
    </li>
    <li><span></span><a href="#">Gesti&oacute;n Escolar</a>
      <ul>
        <li><span></span><?php echo link_to("Definir Carreras","carrera/index")?></li>
        <li><span></span><?php echo link_to("Definir Grados/A&ntilde;os","anio/index")?></li>
        <li><span></span><?php echo link_to("Definir Orientaciones","orientacion/index")?></li>
        <li><span></span><?php echo link_to("Definir Secciones/Divisiones","division/index")?></li>
        <li><span></span><?php echo link_to("Asignar Alumno a Secci&oacute;n/Divisi&oacute;n","relAlumnoDivision/list")?></li>
        <li><span></span><?php echo link_to("Ingresar Materias/Actividades","actividad/index")?></li>
        <li><span></span><?php echo link_to("Listar Actividades por Grado/A&ntilde;o","relAnioActividad/index")?></li>
      </ul>
    </li>
    <li><span></span><a href="#">Horarios</a>
      <ul>
        <li><span></span><?php echo link_to("Ir a Ciclo Lectivo Actual","ciclolectivo/agregarTurnosYPeriodos")?></li>
        <li><span></span><a href="#">Gestionar Horario Escolar</a>
          <ul>
            <li><span></span><?php echo link_to("Definir horario de clases","horarioescolar/index")?></li>
            <li><span></span><?php echo link_to("Generar Horario por secci&oacute;n/divisi&oacute;n","relDivisionActividadDocente/index")?></li>
          </ul>
        </li>
        <li><span></span><a href="#">Ver Horario seg&uacute;n:</a>
          <ul>
            <li><span></span><?php echo link_to("...docentes","calendario/busquedaDocente")?></li>
            <li><span></span><?php echo link_to ("...secci&oacute;n/divisi&oacute;n","calendario/busquedaDivision")?></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><span></span><a href="#">Gesti&oacute;n de Espacios</a>
      <ul>
        <li><span></span><?php echo link_to("Listar Locaciones","locacion/index")?></li>
        <li><span></span><?php echo link_to("Listar Espacios x Locaci&oacute;n","espacios/index")?></li>
      </ul>
    </li>
    <li><span></span><a href="#">Informes</a>
      <ul>
        <li><span></span><?php echo link_to("Listar informes","informes/index")?></li>
        <?php $informes = InformePeer::doSelect(new Criteria()); ?>
        <?php foreach($informes as $informe): ?>
          <li><span></span><?php echo link_to("- ".$informe->getNombre(),"informes/busqueda?id=".$informe->getId()) ?></li>
        <?php endforeach;?>
        <li><span></span><?php echo link_to("Boletines","informes/boletinFormulario","target=_blank")?></li>
      </ul>
    </li>
    <li><span></span><?php echo link_to("Archivos","sfMediaLibrary/index")?></li>
    <li><span></span><a href="#">Ayuda</a>
      <ul>
        <li><span></span><?php echo link_to("Manual", "http://".sfContext::getInstance()->getRequest()->getHost().sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/manual/index.html", 'target=_blank')?></li>
          <li><span></span><?php echo link_to("Ayuda v&iacute;a IRC",'http://webchat.freenode.net/?channels=proyectoalba&uio=d4', array('target'=>'blank'))?></li>
        <li><span></span><?php echo link_to("Cr&eacute;ditos","creditos/index")?></li>
      </ul>
    </li>
    <li><span></span><?php echo link_to("Salir","seguridad/logout")?></li>
  </ul>
</div>
<SCRIPT LANGUAGE="JavaScript">
<!--
cmDrawFromText ('menu', 'hbr', cm<?php echo sfConfig::get("app_alba_menutheme")?>, '<?php echo sfConfig::get("app_alba_menutheme")?>');
-->
</SCRIPT>
