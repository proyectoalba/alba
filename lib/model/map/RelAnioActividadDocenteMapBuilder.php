<?php



class RelAnioActividadDocenteMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelAnioActividadDocenteMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RelAnioActividadDocentePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RelAnioActividadDocentePeer::TABLE_NAME);
		$tMap->setPhpName('RelAnioActividadDocente');
		$tMap->setClassname('RelAnioActividadDocente');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('FK_ANIO_ACTIVIDAD_ID', 'FkAnioActividadId', 'INTEGER' , 'rel_anio_actividad', 'ID', true, null);

		$tMap->addForeignPrimaryKey('FK_DOCENTE_ID', 'FkDocenteId', 'INTEGER' , 'docente', 'ID', true, null);

	} 
} 