<?php

class migracion_aeqTask extends sfBaseTask
{
  const ORGANIZACION_ID = 1;
  const ESTABLECIMIENTO_ID = 1;
  const TURNO_ID = 1;
  const BUENOS_AIRES_ID = 2;
  const ARGENTINA_ID = 2;
  const NIVEL_PRIMARIO_ID = 2;
  const CICLO_LECTIVO_ID = 1;
  const CARRERA_ID = 1;
  const ORIENTACION_ID = 1;
  const ROL_PADRE_ID = 1;
  const ROL_MADRE_ID = 2;
  const ROL_HERMANO_ID = 3;
  const DNI_ID = 2;
  
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = 'aeq';
    $this->name             = 'migracion';
    $this->briefDescription = 'Importar datos tabla AEQ';
    $this->detailedDescription = <<<EOF
The [migracion_aeq|INFO] task does things.
Call it with:

  [php symfony migracion_aeq|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

    $this->crearPais('Argentina', 'ARG');
    $this->crearPais('España', 'ESP');
    $this->crearPais('Estados Unidos', 'EUA');
    $this->crearPais('Colombia', 'COL');
    $this->crearPais('Francia', 'FRA');
    $this->crearPais('Paraguay', 'PAR');
    $this->crearPais('Uruguay', 'URU');

    $this->crearProvincia('Buenos Aires', 'BA', self::ARGENTINA_ID);

    $this->crearTipodocumento('DNI', 'Documento nacional de identidad');
    
    $this->updateOrganizacion($connection);
    $this->cargarEstablecimiento($connection);
    $this->cargarOrientaciones($connection);
    $this->cargarCiclosLectivos($connection);
    $this->cargarTurnos($connection);
    $this->cargarCarrera($connection);
    $this->cargarAnios($connection);
    $this->cargarDivisiones($connection);
    $this->importarAlumnos($connection);

  }
  //
  //
  private function updateOrganizacion($connection){
    $org = OrganizacionPeer::retrieveByPK(self::ORGANIZACION_ID);
    $org->setNombre('Aequalis');
    $org->setDescripcion('Organización principal');
    $org->setRazonSocial('Razón social');
    $org->setDireccion('Crámer 1222');
    $org->setCiudad('Colegiales');
    $org->setCodigoPostal('C1426AOB');
    $org->setFkProvinciaId(self::BUENOS_AIRES_ID);
    $org->save();
    print "Organización actualizada...\n";
    
  }
  //
  //
  private function cargarEstablecimiento($connection){
    $est = EstablecimientoPeer::retrieveByPK(self::ESTABLECIMIENTO_ID);
    if(is_null($est)){
      $est = new Establecimiento();
    }
    $est->setNombre('Aequalis escuela primaria A-950');
    $est->setDescripcion('Aequalis escuela primaria A-950');
    $est->setLegajoprefijo('');
    $est->setFkDistritoescolarId(1);
    $est->setFkOrganizacionId(self::ORGANIZACION_ID);
    $est->setFkNiveltipoId(self::NIVEL_PRIMARIO_ID);
    $est->setDireccion('Crámer 1222');
    $est->setCiudad('Colegiales');
    $est->setCodigoPostal('C1426AOB');
    $est->setFkProvinciaId(self::BUENOS_AIRES_ID);
    $est->save();
    print "Establecimiento actualizado...\n";
  }
  //
  //
  private function cargarOrientaciones($connection){
    $c = new Criteria();
    $c->add(OrientacionPeer::NOMBRE, 'Primaria');
    $or = OrientacionPeer::doSelectOne($c);
    if(is_null($or)){
      $or = new Orientacion();
    }
    $or->setNombre('Primaria');
    $or->setDescripcion('Primaria');
    $or->save();
    print "Orientación actualizada...\n";
  }
  //
  //
  private function cargarCiclosLectivos($connection){
    $cl = CiclolectivoPeer::retrieveByPK(self::CICLO_LECTIVO_ID);
    if(is_null($cl)){
    $cl = new Ciclolectivo();
    }
    $cl->setFkEstablecimientoId(self::ESTABLECIMIENTO_ID);
    $cl->setFechainicio('2011-01-01');
    $cl->setFechafin('2011-12-31');
    $cl->setDescripcion('Ciclo lectivo 2011');
    $cl->setActual(1);
    $cl->save();
    print "Ciclos lectivos cargados...\n";
  }
  //
  //
  private function cargarTurnos($connection){
    $c = new Criteria();
    $c->add(TurnoPeer::ID, self::TURNO_ID);
    $t = TurnoPeer::doSelectOne($c);
    if(is_null($t)){
      $t = new Turno();
    }
    $t->setFkCiclolectivoId(self::CICLO_LECTIVO_ID);
    $t->setHoraInicio('07:30:00');
    $t->setHoraFin('17:00:00');
    $t->setDescripcion('Jornada completa');
    $t->save();
    print "Turnos cargados...\n";
  }
  //
  //
  private function cargarCarrera($connection){
    $c = new Criteria();
    $c->add(CarreraPeer::DESCRIPCION, 'Primaria');
    $c->add(CarreraPeer::FK_ESTABLECIMIENTO_ID, self::ESTABLECIMIENTO_ID);
    $c = CarreraPeer::doSelectOne($c);
    if(is_null($c)){
      $c = new Carrera();
    }
    $c->setFkEstablecimientoId(self::ESTABLECIMIENTO_ID);
    $c->setDescripcion('Primaria');
    $c->save();
    print "Carrera cargada...\n";
  }
  //
  //
  private function cargarAnios($connection){
    
    $anios_array = array(
        1 => array('Primer grado', 10),
        2 => array('Segundo grado', 20),
        3 => array('Tercer grado', 30),
        4 => array('Cuarto grado', 40),
        5 => array('Quinto grado', 50),
        6 => array('Sexto grado', 60),
        7 => array('Séptimo grado', 70),
    );
    foreach($anios_array as $i => $anio){
        $a = AnioPeer::retrieveByPK($i);
        if(is_null($a)){
          $a = new Anio();
        }
        $a->setFkEstablecimientoId(self::ESTABLECIMIENTO_ID);
        $a->setFkCarreraId(self::CARRERA_ID);
        $a->setDescripcion($anio[0]);
        $a->setOrden($anio[1]);
        $a->save();
    }
    print "Años cargados...\n";
    
  }
  //
  //
  private function cargarDivisiones($connection){
    $divisiones_array = array(
        1 => array(1, 'A'), // 1a
        2 => array(1, 'B'), // 1b
        3 => array(2, 'A'), // 2
        4 => array(3, 'A'), // 3
        5 => array(4, 'A'), // 4a
        6 => array(4, 'B'), // 4b
        7 => array(5, 'A'), // 5
        8 => array(6, 'A'), // 6
        9 => array(7, 'A'), // 7
    );
    foreach($divisiones_array as $i => $division){
        $d = DivisionPeer::retrieveByPK($i);
        if(is_null($d)){
          $d = new Division();
        }
        $d->setFkAnioId($division[0]);
        $d->setDescripcion($division[1]);
        $d->setFkTurnoId(self::TURNO_ID);
        $d->setFkOrientacionId(self::ORIENTACION_ID);
        $d->save();
    }
    print "Divisiones cargadas...\n";
  }
  //
  //
  private function importarAlumnos($connection){
    include(sfConfig::get('sf_data_dir').'/AEQ.php');
    foreach($AEQ as $i => $row){
        $cuenta = $this->crearCuenta($row);
        $this->cargarAlumno($connection, $row, $cuenta);
        $this->cargarPadre($row, $cuenta);
        $this->cargarMadre($row, $cuenta);
        $this->cargarHermanos($row, $cuenta);
    }
    print "Alumnos cargados...\n";
  }
  //
  //
  private function cargarHermanos($row, $cuenta){
    $this->cargarHermano($row['HERMANO 1'], $row['EDAD1'], $row['ESTUDIOS 1'], $cuenta->getId());
    $this->cargarHermano($row['HERMANO 2'], $row['EDAD 2'], $row['ESTUDIOS 2'], $cuenta->getId());
    $this->cargarHermano($row['HERMANO 3'], $row['EDAD 3'], $row['ESTUDIOS 3'], $cuenta->getId());
  }
  //
  //
  private function cargarHermano($nombre, $edad, $estudios, $cuenta_id){
    if(is_null($nombre)){
        return;
    }
    $c = new Criteria();
    $c->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, self::ROL_HERMANO_ID);
    $c->add(ResponsablePeer::NOMBRE, $nombre);
    $c->add(ResponsablePeer::FK_CUENTA_ID, $cuenta_id);
    $hermano = ResponsablePeer::doSelectOne($c);
    if(is_null($hermano)){
        $hermano = new Responsable();
    }
    $hermano->setNombre($nombre);
    $hermano->setFkCuentaId($cuenta_id);
    $hermano->setFkRolresponsableId(self::ROL_HERMANO_ID);

    $hermano->setFkProvinciaId(self::BUENOS_AIRES_ID);
    $hermano->setFkTipoDocumentoId(self::DNI_ID);

    // Observaciones
    $edad = (!is_null($edad) && intval($edad) > 0)  ? 'Edad: '.$edad : NULL;
    $observaciones = $edad;

    // Nivel de instrucción
    // si está en la tabla de niveles de instrucción, meterlo ahí
    // sino, cargarlo como observación
    $nivel_instruccion_id = null;
    if(!is_null($estudios)){
        $nivel_instruccion = $this->getNivelInstruccionFromDescripcion($estudios);
        if(is_null($nivel_instruccion)){
            $observaciones .= ' - Estudios: '.$estudios;
        } else {
            $nivel_instruccion_id = $nivel_instruccion->getId();
        }
    }
    $hermano->setFkNivelInstruccionId($nivel_instruccion_id);
    $hermano->setObservacion($observaciones);

    $hermano->save();
  }
  //
  private function getNombreUnicoParaCuenta($row){
    return implode(' ', array($row['APELLIDO'], $row['NOMBRE1'], '('.$row['ID'].')'));
  }
  //
  //
  private function crearCuenta($row){
    // id 	nombre 	razon_social 	cuit 	direccion 	ciudad 	codigo_postal 	telefono 	fk_provincia_id 	fk_tipoiva_id
    $c = new Criteria();
    $nombre = $this->getNombreUnicoParaCuenta($row);
    $c->add(CuentaPeer::NOMBRE, $nombre);
    $cuenta = CuentaPeer::doSelectOne($c);
    if(is_null($cuenta)){
        $cuenta = new Cuenta();
    }
    $cuenta->setNombre($nombre);
    $cuenta->setRazonSocial('');
    $cuenta->setDireccion($row['DOMICILIO']);
    $cuenta->setCiudad($row['LOCALIDAD']);
    $cuenta->setCodigoPostal($row['CP']);
    $cuenta->setTelefono($row['TEL']);
    $cuenta->setFkProvinciaId(self::BUENOS_AIRES_ID);
    $cuenta->setFkTipoivaId(1);
    $cuenta->save();
    return $cuenta;
  }
  //
  //
  private function crearPais($nombre, $nombre_corto){
    $c = new Criteria();
    $c->add(PaisPeer::NOMBRE_LARGO, $nombre);
    $pais = PaisPeer::doSelectOne($c);
    if(is_null($pais)){
        $pais = new Pais();
    }
    $pais->setNombreLargo($nombre);
    $pais->setNombreCorto($nombre_corto);
    $pais->save();
  }
  //
  //
  private function crearTipodocumento($nombre, $descripcion){
    $c = new Criteria();
    $c->add(TipodocumentoPeer::NOMBRE, $nombre);
    $tipodoc = TipodocumentoPeer::doSelectOne($c);
    if(is_null($tipodoc)){
        $tipodoc = new TipoDocumento();
    }
    $tipodoc->setNombre($nombre);
    $tipodoc->setDescripcion($descripcion);
    $tipodoc->save();
  }
  //
  //
  private function crearProvincia($nombre, $nombre_corto, $pais_id){
    $c = new Criteria();
    $c->add(ProvinciaPeer::NOMBRE_LARGO, $nombre);
    $provincia = ProvinciaPeer::doSelectOne($c);
    if(is_null($provincia)){
        $provincia = new Provincia();
    }
    $provincia->setNombreLargo($nombre);
    $provincia->setNombreCorto($nombre_corto);
    $provincia->setFKPaisId($pais_id);
    $provincia->save();
  }
  //
  //
  private function getPaisFromNombre($nombre){
    $c = new Criteria();
    $c->add(PaisPeer::NOMBRE_LARGO, $nombre);
    $pais = PaisPeer::doSelectOne($c);
    return $pais;
  }
  //
  //
  private function getNivelInstruccionFromDescripcion($descripcion){
    $c = new Criteria();
    $c->add(NivelInstruccionPeer::DESCRIPCION, $descripcion);
    $nivel_instruccion = NivelInstruccionPeer::doSelectOne($c);
    return $nivel_instruccion;
  }
  //
  //
  private function cargarPadre($row, Cuenta $cuenta){
    if(is_null($row['APPADRE']) && is_null($row['NOMPADRE'])){
        return;
    }
    $c = new Criteria();
    $c->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, self::ROL_PADRE_ID);
    $c->add(ResponsablePeer::FK_CUENTA_ID, $cuenta->getId());
    $padre = ResponsablePeer::doSelectOne($c);
    if(is_null($padre)){
        $padre = new Responsable();
    }
    $padre->setNombre($row['NOMPADRE']);
    $padre->setApellido($row['APPADRE']);
    $padre->setFkCuentaId($cuenta->getId());
    $padre->setFkRolresponsableId(self::ROL_PADRE_ID);
    $padre->setDireccion($row['DOMPADRE']);
    $padre->setFkTipoDocumentoId(self::DNI_ID);
    $padre->setNroDocumento(str_replace('.', '', $row['DNIPADRE']));
    $padre->setTelefono($row['TEL PADRE']);
    $padre->setTelefonoMovil($row['CELULAR PADRE']);
    $padre->setOcupacion($row['OCUPACION ACTUAL']);
    $padre->setDireccionLaboral($row['DOMICILIO LABORAL']);
    $padre->setSexo('M');

    // Teléfono laboral 
    $telefono_laboral = $row['TEL TRAB PAD1'];
    if(!is_null($row['TEL TRAB PAD 2'])){
        // sólo agregar el punto y coma si el primer teléfono existe
        if(!is_null($telefono_laboral)){
            $telefono_laboral .= '; ';
        }
        $telefono_laboral .= $row['TEL TRAB PAD 2'];
    }
    $padre->setTelefonoLaboral($telefono_laboral);
    //
    $padre->setEmail($row['E-MAIL PADRE']);
    $padre->setFkProvinciaId(self::BUENOS_AIRES_ID);

    // Observaciones
    $edad_padre = (!is_null($row['EDADPADRE']) && intval($row['EDADPADRE']) > 0)  ? 'Edad: '.$row['EDADPADRE'] : NULL;
    $loc_trab_padre = !is_null($row['LOC TRAB PAD']) ? ' - Localida del trabajo: '.$row['LOC TRAB PAD'] : NULL;
    $observaciones = $edad_padre . $loc_trab_padre;

    // Nivel de instrucción
    // si está en la tabla de niveles de instrucción, meterlo ahí
    // sino, cargarlo como observación
    $nivel_instruccion_id = null;
    if(!is_null($row['ESTPADRE'])){
        $nivel_instruccion = $this->getNivelInstruccionFromDescripcion($row['ESTPADRE']);
        if(is_null($nivel_instruccion)){
            $observaciones .= ' - Estudios: '.$row['ESTPADRE'];
        } else {
            $nivel_instruccion_id = $nivel_instruccion->getId();
        }
    }
    $padre->setFkNivelInstruccionId($nivel_instruccion_id);
    $padre->setObservacion($observaciones);

    $padre->save();
    
  }
  //
  //
  private function cargarMadre($row, Cuenta $cuenta){
    if(is_null($row['APMADRE']) && is_null($row['NOMMADRE'])){
        return;
    }
    $c = new Criteria();
    $c->add(ResponsablePeer::FK_ROLRESPONSABLE_ID, self::ROL_MADRE_ID);
    $c->add(ResponsablePeer::FK_CUENTA_ID, $cuenta->getId());
    $madre = ResponsablePeer::doSelectOne($c);
    if(is_null($madre)){
        $madre = new Responsable();
    }
    $madre->setNombre($row['NOMMADRE']);
    $madre->setApellido($row['APMADRE']);
    $madre->setFkCuentaId($cuenta->getId());
    $madre->setFkRolresponsableId(self::ROL_MADRE_ID);
    $madre->setDireccion($row['DOMMADRE']);
    $madre->setFkTipoDocumentoId(self::DNI_ID);
    $madre->setNroDocumento(str_replace('.', '', $row['DNIMADRE']));
    $madre->setTelefonoMovil($row['CELULAR MADRE']);
    $madre->setOcupacion($row['OCUPACION ACTUAL1']);
    $madre->setDireccionLaboral($row['DOM LABORAL']);
    $madre->setSexo('F');

    // Teléfono laboral 
    $telefono_laboral = $row['TEL TRAB MAD 1'];
    if(!is_null($row['TEL TRAB MAD 2'])){
        // sólo agregar el punto y coma si el primer teléfono existe
        if(!is_null($telefono_laboral)){
            $telefono_laboral .= '; ';
        }
        $telefono_laboral .= $row['TEL TRAB MAD 2'];
    }
    $madre->setTelefonoLaboral($telefono_laboral);
    //
    $madre->setEmail($row['E-MAIL MADRE']);
    $madre->setFkProvinciaId(2);

    // Observaciones
    $pais = is_null($row['NACMADRE']) ? null : 'País: ' . $row['NACMADRE'];
    $edad_madre = (!is_null($row['EDADMADRE']) && intval($row['EDADMADRE']) > 0) ? ' - Edad: '. $row['EDADMADRE'] : NULL;
    $loc_trab_madre = !is_null($row['LOC TRAB MAD']) ? ' - Localida del trabajo: ' . $row['LOC TRAB MAD'] : NULL;
    $observaciones = $edad_madre . $loc_trab_madre;

    // Nivel de instrucción
    // si está en la tabla de niveles de instrucción, meterlo ahí
    // sino, cargarlo como observación
    $nivel_instruccion_id = null;
    if(!is_null($row['ESTMADRE'])){
        $nivel_instruccion = $this->getNivelInstruccionFromDescripcion($row['ESTMADRE']);
        if(is_null($nivel_instruccion)){
            $observaciones .= ' - Estudios: '.$row['ESTMADRE'];
        } else {
            $nivel_instruccion_id = $nivel_instruccion->getId();
        }
    }
    $madre->setFkNivelInstruccionId($nivel_instruccion_id);
    $madre->setObservacion($observaciones);

    $madre->save();
    
  }
  //
  //
  private function asignarAlumnoDivision($alumno_id, $division_id){
    $c = new Criteria();
    $c->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $alumno_id);
    $c->add(RelAlumnoDivisionPeer::FK_DIVISION_ID, $division_id);
    $al_div = RelAlumnoDivisionPeer::doSelectOne($c);
    if(is_null($al_div)){
        $al_div = new RelAlumnoDivision();
    }
    $al_div->setFkAlumnoId($alumno_id);
    $al_div->setFkDivisionId($division_id);
    $al_div->save();
    
  }
  //
  //
  private function cargarDatosSalud($row, $alumno_id){
    $c = new Criteria();
    $c->add(AlumnoSaludPeer::FK_ALUMNO_ID, $alumno_id);
    $alumno_salud = AlumnoSaludPeer::doSelectOne($c);
    if(is_null($alumno_salud)){
        $alumno_salud = new AlumnoSalud();
    }
    $alumno_salud->setFkAlumnoId($alumno_id);
    $alumno_salud->setCoberturaTelefono(implode('; ', array($row['TELEFONO'], $row['TELEFONO'])));
    $alumno_salud->setCoberturaObservaciones($row['OBSERVACIONES']);
    $alumno_salud->setMedicoNombre($row['PADRIATRA CABECERA']);
    $alumno_salud->setMedicoDomicilio($row['DOM PEDIATRA']);
    $alumno_salud->setMedicoTelefono($row['TEL PEDIATRA']);
    $alumno_salud->save();
  }
  //
  private function cargarAlumno($connection, $row, Cuenta $cuenta){
      
    // grado -> id
    $divisiones_array = array(
        '1 A' => 1,
        '1 B' => 2,
        '2' => 3, 
        '3' => 4, 
        '4 A' => 5,
        '4 B' => 6,
        '5' => 7,
        '6' => 8,
        '7' => 9,
    );
    //
    $c = new Criteria();
    $c->add(AlumnoPeer::FK_CUENTA_ID, $cuenta->getId());
    $al = AlumnoPeer::doSelectOne($c);
    if(is_null($al)){
        $al = new Alumno();
    }
    $al->setNombre($row['NOMBRE1']);
    $al->setApellido($row['APELLIDO']);
    //
    if(!is_null($row['FECHANAC'])){
        $fecha_nac = explode('/', $row['FECHANAC']);
        $anio = $fecha_nac[2];
        // Cuando el año viene en dos dígitos
        if(strlen($anio) <= 2){
            if(intval($anio) < 10){
                $anio = '20' . $anio;
            } else {
                $anio = '19' . $anio;
            }
        }
        $fecha_nac = implode('-', array($anio, $fecha_nac[1], $fecha_nac[0]));
        $al->setFechaNacimiento($fecha_nac);
    }
    //
    $al->setDireccion($row['DOMICILIO']);
    $al->setCiudad($row['LOCALIDAD']);
    $al->setCodigoPostal($row['CP']);
    $al->setTelefono($row['TEL']);
    $al->setFkProvinciaId(self::BUENOS_AIRES_ID);
    $al->setLugarNacimiento($row['LUGAR']);
    $al->setFkTipoDocumentoId(self::DNI_ID);
    $al->setNroDocumento(str_replace('.', '', $row['DNI']));
    $al->setSexo($row['sexo']);
    $al->setEmail($row['E-MAIL ALUMNO']);
    //
    $al->setFkEstablecimientoId(self::ESTABLECIMIENTO_ID);
    $al->setFkCuentaId($cuenta->getId());
    $al->setActivo(1);
    $pais = is_null($this->getPaisFromNombre($row['NAC'])) ? 1 : $this->getPaisFromNombre($row['NAC'])->getId();
    $al->setFkPaisId($pais);
    //
    switch($row['GRADO']){
        case 'Egresado':
            $estado_id = 3;
            break;
        case 'Ex-alumno':
            $estado_id = 4;
            break;
        default:
            $estado_id = 1;
    }
    $al->setFkEstadoalumnoId($estado_id);
    //
    $al->save();
    if($estado_id == 1){
        $division_id = $divisiones_array[$row['GRADO']];
        $this->asignarAlumnoDivision($al->getId(), $division_id);
    }
    $this->cargarDatosSalud($row, $al->getId());
    // Actualizar legajos    
    $sql = "UPDATE alumno SET legajo_prefijo = id, legajo_numero = 1;";
    $statement = $connection->prepare($sql);
    $res = $statement->execute();

  }
}
