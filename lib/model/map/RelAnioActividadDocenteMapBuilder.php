<?php



class RelAnioActividadDocenteMapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');

		$tMap = $this->dbMap->addTable('rel_anio_actividad_docente');
		$tMap->setPhpName('RelAnioActividadDocente');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('FK_ANIO_ACTIVIDAD_ID', 'FkAnioActividadId', 'int' , CreoleTypes::INTEGER, 'rel_anio_actividad', 'ID', true, null);

		$tMap->addForeignPrimaryKey('FK_DOCENTE_ID', 'FkDocenteId', 'int' , CreoleTypes::INTEGER, 'docente', 'ID', true, null);

	} 
} 