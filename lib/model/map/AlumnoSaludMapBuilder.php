<?php



class AlumnoSaludMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AlumnoSaludMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(AlumnoSaludPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AlumnoSaludPeer::TABLE_NAME);
		$tMap->setPhpName('AlumnoSalud');
		$tMap->setClassname('AlumnoSalud');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'INTEGER', 'alumno', 'ID', true, null);

		$tMap->addColumn('COBERTURA_MEDICA', 'CoberturaMedica', 'VARCHAR', false, 255);

		$tMap->addColumn('COBERTURA_TELEFONO', 'CoberturaTelefono', 'VARCHAR', false, 40);

		$tMap->addColumn('COBERTURA_OBSERVACIONES', 'CoberturaObservaciones', 'VARCHAR', false, 255);

		$tMap->addColumn('MEDICO_NOMBRE', 'MedicoNombre', 'VARCHAR', false, 255);

		$tMap->addColumn('MEDICO_DOMICILIO', 'MedicoDomicilio', 'VARCHAR', false, 255);

		$tMap->addColumn('MEDICO_TELEFONO', 'MedicoTelefono', 'VARCHAR', false, 20);

	} 
} 