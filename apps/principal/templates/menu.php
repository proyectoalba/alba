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
	                    <li><span></span><?php echo link_to("Definir Establecimiento","establecimiento")?></li>
                    </ul>
                </li>
	            <li><span></span><a href="#">Configuraciones Previas</a>
                    <ul>
	                    <li><span></span><a href="#">Generales</a>
                            <ul>
	                            <li><span></span><?php echo link_to("Definir Pa&iacute;ses","pais")?></li>
	                            <li><span></span><?php echo link_to("Definir Provincias",'provincia')?></li>
	                            <li><span></span><?php echo link_to("Definir Distritos Escolares","distritoescolar")?></li>
	                            <li><span></span><?php echo link_to("Definir Categor&iacute;a de IVA","tipoiva")?></li>
	                            <li><span></span><?php echo link_to("Tipo Documento","tipodocumento")?></li>
	                            <li><span></span><?php echo link_to("Tipo Nivel","tiponivel")?></li>
                            </ul>
                        </li>
	                    <li><span></span><a href="#">Alumnos</a>
                            <ul>
	                            <li><span></span><?php echo link_to("Definir tipo de bajas","conceptobaja")?></li>
	                            <li><span></span><?php echo link_to("Definir tipo de asistencia","tipoasistencia")?></li>
	                            <li><span></span><?php echo link_to("Definir Escala de notas","escalanota")?></li>
	                            <li><span></span><?php echo link_to("Tipos de entrada al legajo pedag&oacute;gico","legajocategoria")?></li>
	                            <li><span></span><?php echo link_to("Definir Categor&iacute;as del Bolet&iacute;n de Concepto","concepto")?></li>
                            </ul>
                        </li>
	                    <li><span></span><a href="#">Docentes</a>
                            <ul>
	                            <li><span></span><?php echo link_to("Tipos de docentes",'tipodocente')?></li>
	                            <li><span></span><?php echo link_to("Motivos de baja", "cargobaja")?></li>
                            </ul>
                        </li>
	                    <li><span></span><a href="#">Calendarios y Horarios</a>
                            <ul>
	                            <li><span></span><?php echo link_to("Definir Ciclos Lectivos","ciclolectivo")?></li>
	                            <li><span></span><?php echo link_to("Definir Períodos","ciclolectivo/agregarTurnosYPeriodos")?></li>
	                            <li><span></span><?php echo link_to("Definir turnos","turno")?></li>
	                            <li><span></span><?php echo link_to("Tipos de intevalos de horario escolar","horarioescolartipo")?></li>
	                            <li><span></span><?php echo link_to("Definir feriados del a&ntilde;o","feriado")?></li>
	                            <li><span></span><?php echo link_to("Calendario de vacunas","calendariovacunacion")?></li>
                            </ul>
                        </li>
	                    <li><span></span><a href="#">Gesti&oacute;n de Espacios</a>
                            <ul>
	                            <li><span></span><?php echo link_to("Definir tipos de Locaciones","tipolocacion")?></li>
	                            <li><span></span><?php echo link_to("Definir tipos de Espacios","tipoespacio")?></li>
                            </ul>
                        </li>
                    </ul>
                </li>
<!--	            <li><span></span><?php echo link_to("Preferencias Generales","preferencia")?></li> -->
	            <li><span></span><a href="#">Seguridad</a>
                    <ul>
	                    <li><span></span><?php echo link_to("Usuario","usuario")?></li>
	                    <li><span></span><?php echo link_to("Rol","rol")?></li>
	                    <li><span></span><?php echo link_to("Permiso","permiso")?></li>
	                    <li><span></span><?php echo link_to("M&oacute;dulo","modulo")?></li>
                    </ul>
                </li>
            </ul>
        </li>
	    <li><span></span><a href="#">Cuentas</a>
            <ul>
	            <li><span></span><?php echo link_to("Administrar","cuenta")?></li>
	            <li><span></span><?php echo link_to("Responsables","responsable")?></li>
            </ul>
        </li>
	    <li><span></span><a href="#">Alumnos</a>
            <ul>
	            <li><span></span><?php echo link_to("Ingresar Nuevo","alumno/create")?></li>
	            <li><span></span><?php echo link_to("Listar Todos","alumno/list")?></li>
	            <li><span></span><?php echo link_to("Buscar Alumno para...","legajopedagogico")?></li>
	            <li><span></span><?php echo link_to("Asistencia por Secci&oacute;n/Divisi&oacute;n","asistencia")?></li>
	            <li><span></span><a href="#">Cargar Boletines</a>
                    <ul>
	                    <li><span></span><?php echo link_to("Concepto","boletin/listConcepto")?></li>
	                    <li><span></span><?php echo link_to("Notas","boletin/list")?></li>
                    </ul>


                </li>
            </ul>
        </li>
	    <li><span></span><a href="#">Docentes</a>
            <ul>
	            <li><span></span><?php echo link_to("Administrar","docente")?></li>
            </ul>
        </li>
	    <li><span></span><a href="#">Gesti&oacute;n Escolar</a>
            <ul>
	            <li><span></span><?php echo link_to("Definir Grados/A&ntilde;os","anio")?></li>
                <li><span></span><?php echo link_to("Definir Orientaciones","orientacion")?></li>
	            <li><span></span><?php echo link_to("Definir Secciones/Divisiones","division")?></li>
	            <li><span></span><?php echo link_to("Asignar Alumno a Secci&oacute;n/Divisi&oacute;n","relAlumnoDivision/create")?></li>
	            <li><span></span><?php echo link_to("Ingresar Materias/Actividades","actividad")?></li>
	            <li><span></span><?php echo link_to("Actividades por Grado/A&ntilde;o","relAnioActividad")?></li>
            </ul>
        </li>
	    <li><span></span><a href="#">Horarios</a>
            <ul>
	            <li><span></span><?php echo link_to("Ir a Ciclo Lectivo Actual","ciclolectivo/agregarTurnosYPeriodos")?></li>
	            <li><span></span><a href="#">Horario Escolar</a>
                    <ul>
	                    <li><span></span><?php echo link_to("Definir horario de clases","horarioescolar")?></li>
	                    <li><span></span><?php echo link_to("Generar Horario por secci&oacute;n/divisi&oacute;n","relDivisionActividadDocente")?></li>
                    </ul>
                </li>
	            <li><span></span><a href="#">&iquest; Horario seg&uacute;n...?</a>
                    <ul>
	                    <li><span></span><?php echo link_to("...docentes","calendario/busquedaDocente")?></li>
	                    <li><span></span><?php echo link_to ("...secci&oacute;n/divisi&oacute;n","calendario/busquedaDivision")?></li>
                    </ul>
                </li>
            </ul>
        </li>
	    <li><span></span><a href="#">Gesti&oacute;n de Espacios</a>
            <ul>
	            <li><span></span><?php echo link_to("Listado de Locaciones","locacion")?></li>
	            <li><span></span><?php echo link_to("Listado de Espacios x Locaci&oacute;n","espacios")?></li>
            </ul>
        </li>
	    <li><span></span><a href="#">Informes</a>
            <ul>
                <li><span></span><?php echo link_to("Listado de informes","informes")?></li>
<?php
    $informes = InformePeer::doSelect(new Criteria());
    foreach($informes as $informe) {
?>
    <li><span></span><?php echo link_to($informe->getNombre(),"informes/busqueda?id=".$informe->getId()) ?></li>
<?php
    }
?>
	            <li><span></span><?php echo link_to("Boletines","informes/boletinFormulario","target=_blank")?></li>
	            <li><span></span><?php echo link_to("Biblioteca de contenidos","sfMediaLibrary")?></li>
            </ul>
        </li>
	    <li><span></span><a href="#">Ayuda</a>
            <ul>
	            <li><span></span><?php echo link_to("Indice...", "http://".sfContext::getInstance()->getRequest()->getHost().sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/manual/index.html", 'target=_blank')?></li>
	            <li><span></span><?php echo link_to("Cr&eacute;ditos","creditos")?></li>
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
