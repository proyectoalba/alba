<?php

class migracion_inicial_aeqTask extends sfBaseTask {

 
  private $ESTABLECIMIENTO_ID;
  private $CARRERA_ID;
  private $ORIENTACION_ID;

  private $PROVINCIA_ID_NODEF = 1;
  private $TIPODOCUMENTO_ID_NODEF = 1;
  private $ESTADOALUMNO_ID_REGULAR = 1;
  private $PAIS_ID_NODEF = 1;
  private $ROLRESPONSABLE_ID_PADRE = 1;
  private $ROLRESPONSABLE_ID_MADRE = 2;
  private $TIPOIVA_ID_NODEF = 1;

  const ORGANIZACION_ID = 1;
  const BUENOS_AIRES_ID = 2;
  const NIVEL_INICIAL_ID = 1;


  protected function configure() {
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

    $this->namespace = 'aeq';
    $this->name = 'migracion-inicial';
    $this->briefDescription = 'Importar datos tabla AEQ - Nivel inicial';
    $this->detailedDescription = <<<EOF
The [migracion_aeq|INFO] task does things.
Call it with:

  [php symfony migracion_aeq|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array()) {
    // initialize the database connection
    try {
      $databaseManager = new sfDatabaseManager($this->configuration);
      $this->connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();
      $con = Propel::getConnection();
      $con->beginTransaction();
      $this->cargarEstablecimiento();
      $this->cargarOrientaciones();
      $this->cargarCiclosLectivos();
      $this->cargarCarrera();
      $this->cargarAnios();
      $this->cargarTurnosDivisiones();
      $this->importarAlumnos();

      $con->commit();
    } catch (Exception $e) {
      $con->rollBack();
      throw $e;
    }
  }

  //
  private function cargarEstablecimiento() {
    $est = new Establecimiento();
    $est->setNombre('Aequalis Nivel Inicial');
    $est->setDescripcion('Aequalis Nivel Inicial');
    $est->setLegajoprefijo('');
    $est->setFkDistritoescolarId(1);
    $est->setFkOrganizacionId(self::ORGANIZACION_ID);
    $est->setFkNiveltipoId(self::NIVEL_INICIAL_ID);
    $est->setDireccion('Crámer 1222');
    $est->setCiudad('Colegiales');
    $est->setCodigoPostal('C1426AOB');
    $est->setFkProvinciaId(self::BUENOS_AIRES_ID);
    $est->save();
    $this->ESTABLECIMIENTO_ID = $est->getId();
    print "Establecimiento actualizado...\n";
  }

  //
  //
  private function cargarOrientaciones() {
    $or = new Orientacion();
    $or->setNombre('Inicial');
    $or->setDescripcion('Inicial');
    $or->save();
    $this->ORIENTACION_ID = $or->getId();
    print "Orientación actualizada...\n";
  }

  //
  //
  private function cargarCiclosLectivos() {
    $ciclos = array('2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012');
    foreach ($ciclos as $ciclo) {
      $cl = new Ciclolectivo();

      $cl->setFkEstablecimientoId($this->ESTABLECIMIENTO_ID);
      $cl->setDescripcion('Ciclo lectivo ' . $ciclo);
      $cl->setFechainicio($ciclo . '-01-01');
      $cl->setFechafin($ciclo . '-12-31');
      $cl->setActual(1);
      $cl->save();
    }
    print "Ciclos lectivos cargados...\n";
  }

  //
  //
  private function cargarCarrera() {
    $c = new Carrera();
    $c->setFkEstablecimientoId($this->ESTABLECIMIENTO_ID);
    $c->setDescripcion('Inicial');
    $c->save();
    $this->CARRERA_ID = $c->getId();
    print "Carrera cargada...\n";
  }

  //
  //
  private function cargarAnios() {

    $anios_array = array(
        1 => array('2', 10),
        2 => array('3', 20),
        3 => array('4', 30),
        4 => array('5', 40),
    );
    foreach ($anios_array as $i => $anio) {
      $a = new Anio();
      $a->setFkEstablecimientoId($this->ESTABLECIMIENTO_ID);
      $a->setFkCarreraId($this->CARRERA_ID);
      $a->setDescripcion($anio[0]);
      $a->setOrden($anio[1]);
      $a->save();
    }
    print "Años cargados...\n";
  }
  //
  //
  private function cargarTurnosDivisiones() {
    $c = new Criteria();
    $c->add(CiclolectivoPeer::FK_ESTABLECIMIENTO_ID, $this->ESTABLECIMIENTO_ID);
    $ciclos = CiclolectivoPeer::doSelect($c);
    foreach ($ciclos as $ciclo) {
      $t = new Turno();
      $t->setFkCiclolectivoId($ciclo->getId());
      $t->setHoraInicio('07:30:00');
      $t->setHoraFin('17:00:00');
      $t->setDescripcion('Jornada completa');
      $t->save();
      //por  cada turno creo las divisones 0,a,b de cada año
      $canios = new Criteria();
      $canios->add(AnioPeer::FK_ESTABLECIMIENTO_ID,$this->ESTABLECIMIENTO_ID);
      $canios->add(AnioPeer::FK_CARRERA_ID,$this->CARRERA_ID);
      $anios = AnioPeer::doSelect($canios);
      foreach($anios as $anio) {
         foreach(array('a','b') as $seccion) {
           $d = new Division();
           $d->setFkAnioId($anio->getId());
           $d->setDescripcion($seccion);
           $d->setFkTurnoId($t->getId());
           $d->setFkOrientacionId($this->ORIENTACION_ID);
           $d->save();
         }
      }
    }
    print "Turnos y divisiones cargados...\n";
  }


  //
  //
  private function importarAlumnos() {
    $s = "SELECT * FROM inicial ORDER BY apellido, domicilio, nombre";
    $statement = $this->connection->prepare($s);
    $statement->execute();
    $inicial = $statement->fetchAll(PDO::FETCH_ASSOC);
    $cnt_legajo = 0;
    print "Cargando alumnos...\n";
    foreach ($inicial as $row) {
      print $row['APELLIDO'] . "\n";
      $cnt_legajo++;
      //alta cuenta
      $cuenta = $this->FindOrCreateCuenta($row);

      //alta de alumno
      $a = new Alumno();

      $a->setLegajoPrefijo('AEQ');
      $a->setLegajoNumero($cnt_legajo);
      $a->setApellido($row['APELLIDO']);
      $a->setNombre($row['NOMBRE']);
      if ($row['FechaNacim'] != '') {
        list($d,$m,$y) = explode('/',$row['FechaNacim']);
        $a->setFechaNacimiento("$y-$m-$d 00:00:00");
      }
      $a->setDireccion($row['domicilio']);
      $a->setCiudad($row['localidad']);
      $a->setCodigoPostal($row['codigopostal']);
      $a->setTelefono($row['telefono']);
      $a->setFkProvinciaId($this->PROVINCIA_ID_NODEF);
      $a->setFkTipodocumentoId($this->TIPODOCUMENTO_ID_NODEF);
      $a->setNroDocumento($row['DNI']);
      $a->setEmail($row['e-mail']);
      $a->setFkEstablecimientoId($this->ESTABLECIMIENTO_ID);
      $a->setFkcuentaId($cuenta->getId());
      $a->setActivo(true);
      $a->setFkEstadoalumnoId($this->ESTADOALUMNO_ID_REGULAR);
      $a->setFkPaisId($this->PAIS_ID_NODEF);
      $obs = "Movil:" . $row['celular'] . ";";
      $a->setObservacion($obs);
      $a->save();

      //cargo cobertura medica
      $cm = new AlumnoSalud();
      $cm->setFkAlumnoId($a->getId());
      $cm->setCoberturaMedica($row['Coberturamedica']);
      $cm->save();

      //asocio a division
      $c = new Criteria();
      $c->add(DivisionPeer::DESCRIPCION, $row['seccion']);
      $c->addJoin(DivisionPeer::FK_ANIO_ID,AnioPeer::ID);
      $c->add(AnioPeer::DESCRIPCION,$row['sala']);
      $c->add(AnioPeer::FK_ESTABLECIMIENTO_ID,$this->ESTABLECIMIENTO_ID);
      $c->addJoin(DivisionPeer::FK_TURNO_ID,TurnoPeer::ID);
      $c->addJoin(TurnoPeer::FK_CICLOLECTIVO_ID,  CiclolectivoPeer::ID);
      $c->add(CiclolectivoPeer::DESCRIPCION, 'Ciclo lectivo ' . $row['ciclo']);
      $division = DivisionPeer::doSelectOne($c);
      if ($division) {
        $rad = new RelAlumnoDivision();
        $rad->setFkAlumnoId($a->getId());
        $rad->setFkDivisionId($division->getId());
        $rad->save();
        $this->logSection('relAlumnoDivision','Asignado a ' . $division->getAnio()->getDescripcion() . " " . $division->getDescripcion());
      }
      else {
        $this->logSection('relAlumnoDivision', "No se encuentra sala:" . $row['sala']. " seccion:".$row['seccion'],0,'ERROR');
      }
    }
    print "Alumnos cargados...\n";
  }

 

  private function FindOrCreateCuenta($row){
    $c = new Criteria();
    $c->add(CuentaPeer::NOMBRE,$row['APELLIDO'] . " / " . $row['domicilio']);
    $found = CuentaPeer::doSelectOne($c);
    if ($found) {
      return $found;
    }
    else {
      // solo al crear la cuenta cargo los responsables
      $cuenta = new Cuenta();
      $cuenta->setNombre($row['APELLIDO'] . ' / ' . $row['domicilio']);
      $cuenta->setFkTipoivaId($this->TIPOIVA_ID_NODEF);
      $cuenta->save();

      //cargo padre
      $r = new Responsable();
      $r->setNombre($row['nombrepadre']);
      $r->setApellido('(no asignado)');
      $r->setFkProvinciaId($this->PROVINCIA_ID_NODEF);
      $r->setFkTipodocumentoId($this->TIPODOCUMENTO_ID_NODEF);
      $r->setSexo('M');
      $r->setFkCuentaId($cuenta->getId());
      $r->setFkRolresponsableId($this->ROLRESPONSABLE_ID_PADRE);
      $r->setOcupacion($row['ocupacionpadre']. ' / '.$row['Profesionpadre']);
      $r->save();

      //cargo madre
      $r = new Responsable();
      $r->setNombre($row['nombremadre']);
      $r->setApellido('(no asignado)');
      $r->setFkProvinciaId($this->PROVINCIA_ID_NODEF);
      $r->setFkTipodocumentoId($this->TIPODOCUMENTO_ID_NODEF);
      $r->setSexo('F');
      $r->setFkCuentaId($cuenta->getId());
      $r->setFkRolresponsableId($this->ROLRESPONSABLE_ID_MADRE);
      $r->setOcupacion($row['ocupacionmadre']. ' / '.$row['Profesionmadre']);
      $r->save();

      return $cuenta;

    }
  }

}
