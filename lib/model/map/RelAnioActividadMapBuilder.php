<?php



class RelAnioActividadMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelAnioActividadMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');

		$tMap = $this->dbMap->addTable('rel_anio_actividad');
		$tMap->setPhpName('RelAnioActividad');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('FK_ANIO_ID', 'FkAnioId', 'int', CreoleTypes::INTEGER, 'anio', 'ID', true, null);

		$tMap->addForeignKey('FK_ACTIVIDAD_ID', 'FkActividadId', 'int', CreoleTypes::INTEGER, 'actividad', 'ID', true, null);

		$tMap->addForeignKey('FK_ORIENTACION_ID', 'FkOrientacionId', 'int', CreoleTypes::INTEGER, 'orientacion', 'ID', false, null);

		$tMap->addColumn('HORAS', 'Horas', 'double', CreoleTypes::DECIMAL, true, 10);

	} 
} 