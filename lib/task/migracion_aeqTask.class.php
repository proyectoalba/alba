<?php

class migracion_aeqTask extends sfBaseTask
{
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

  private function updateOrganizacion($connection){
    $org = OrganizacionPeer::retrieveByPK(1);
    $org->setNombre('Aequalis');
    $org->setDescripcion('Organización principal');
    $org->setRazonSocial('Razón social');
    $org->setDireccion('Crámer 1222');
    $org->setCiudad('Colegiales');
    $org->setCodigoPostal('C1426AOB');
    $org->setFkProvinciaId(2);
    $org->save();
    print "Organización actualizada...\n";
    
  }

  private function cargarEstablecimiento($connection){
    $est = EstablecimientoPeer::retrieveByPK(3);
    if(is_null($est)){
      $est = new Establecimiento();
    }
    $est->setNombre('Aequalis escuela primaria A-950');
    $est->setDescripcion('Aequalis escuela primaria A-950');
    $est->setLegajoprefijo('');
    $est->setFkDistritoescolarId(1);
    $est->setFkOrganizacionId(1);
    $est->setFkNiveltipoId(2);
    $est->setDireccion('Crámer 1222');
    $est->setCiudad('Colegiales');
    $est->setCodigoPostal('C1426AOB');
    $est->setFkProvinciaId(2);
    $est->save();
    print "Establecimiento actualizado...\n";
  }

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

  private function cargarCiclosLectivos($connection){
    $cl = CiclolectivoPeer::retrieveByPK(2);
    if(is_null($cl)){
    $cl = new Ciclolectivo();
    }
    $cl->setFkEstablecimientoId(3);
    $cl->setFechainicio('2011-01-01');
    $cl->setFechafin('2011-12-31');
    $cl->setDescripcion('Ciclo lectivo 2011');
    $cl->setActual(1);
    $cl->save();
    print "Ciclos lectivos cargados...\n";
  }

  private function cargarTurnos($connection){
    $c = new Criteria();
    $c->add(TurnoPeer::ID, 4);
    $t = TurnoPeer::doSelectOne($c);
    if(is_null($t)){
      $t = new Turno();
    }
    $t->setFkCiclolectivoId(2);
    $t->setHoraInicio('07:30:00');
    $t->setHoraFin('17:00:00');
    $t->setDescripcion('Jornada completa');
    $t->save();
    print "Turnos cargados...\n";
  }
  
  private function cargarCarrera($connection){
    $c = new Criteria();
    $c->add(CarreraPeer::DESCRIPCION, 'Primaria');
    $c->add(CarreraPeer::FK_ESTABLECIMIENTO_ID, 3);
    $c = CarreraPeer::doSelectOne($c);
    if(is_null($c)){
      $c = new Carrera();
    }
    $c->setFkEstablecimientoId(3);
    $c->setDescripcion('Primaria');
    $c->save();
    print "Carrera cargada...\n";
  }

  private function cargarAnios($connection){
    
    $anios_array = array(
        8 => array('Primer grado', 10),
        9 => array('Segundo grado', 20),
        10 => array('Tercer grado', 30),
        11 => array('Cuarto grado', 40),
        12 => array('Quinto grado', 50),
        13 => array('Sexto grado', 60),
        14 => array('Séptimo grado', 70),
    );
    foreach($anios_array as $i => $anio){
        $a = AnioPeer::retrieveByPK($i);
        if(is_null($a)){
          $a = new Anio();
        }
        $a->setFkEstablecimientoId(3);
        $a->setFkCarreraId(2);
        $a->setDescripcion($anio[0]);
        $a->setOrden($anio[1]);
        $a->save();
    }
    print "Años cargados...\n";
    
  }

  private function cargarDivisiones($connection){
    $orientacion_id = 2;
    $turno_id = 4;
    $divisiones_array = array(
        15 => array(8, 'A'), // 1a
        16 => array(8, 'B'), // 1b
        17 => array(9, 'A'), // 2
        18 => array(10, 'A'), // 3
        19 => array(11, 'A'), // 4a
        20 => array(11, 'B'), // 4b
        21 => array(12, 'A'), // 5
        22 => array(13, 'A'), // 6
        23 => array(14, 'A'), // 7
    );
    foreach($divisiones_array as $i => $division){
        $d = DivisionPeer::retrieveByPK($i);
        if(is_null($d)){
          $d = new Division();
        }
        $d->setFkAnioId($division[0]);
        $d->setDescripcion($division[1]);
        $d->setFkTurnoId($turno_id);
        $d->setFkOrientacionId($orientacion_id);
        $d->save();
    }
    print "Divisiones cargadas...\n";
  }

  private function importarAlumnos($connection){
        /*
         por cada alumno

          crear cuenta
          cargar datos del alumno
          cargar padre asociado a cuenta
          cargar madre asociado a cuenta
          cargar hermano 1,2,3 asociado a cuenta
          asociar a anio/division al alumno
          */ 
  }

}
