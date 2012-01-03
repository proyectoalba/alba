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

    /**
        actualizar datos de la organizacion id=1

        cargar estalecimiento (primaria)
          necesitamos el distrito escolar

        cargar orientacion (unica es primaria)
        cargar ciclos lectivo 2011

        cargar turno (en principio es jornada completa)
        cargar años 1,2,3,4,5,6,7

        cargar division 1a,1b, 4a, 4b

        por cada alumno

          crear cuenta
          cargar datos del alumno
          cargar padre asociado a cuenta
          cargar madre asociado a cuenta
          cargar hermano 1,2,3 asociado a cuenta
          asociar a anio/division al alumno

     */
     $this->updateOrganizacion();
     $this->cargarEstablecimiento();


  }
}
