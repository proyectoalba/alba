<?php



class RelAnioActividadMapBuilder implements MapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap(RelAnioActividadPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RelAnioActividadPeer::TABLE_NAME);
		$tMap->setPhpName('RelAnioActividad');
		$tMap->setClassname('RelAnioActividad');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ANIO_ID', 'FkAnioId', 'INTEGER', 'anio', 'ID', true, null);

		$tMap->addForeignKey('FK_ACTIVIDAD_ID', 'FkActividadId', 'INTEGER', 'actividad', 'ID', true, null);

		$tMap->addForeignKey('FK_ORIENTACION_ID', 'FkOrientacionId', 'INTEGER', 'orientacion', 'ID', false, null);

		$tMap->addColumn('HORAS', 'Horas', 'DECIMAL', true, 10);

	} 
} 