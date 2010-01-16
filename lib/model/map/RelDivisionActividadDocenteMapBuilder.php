<?php



class RelDivisionActividadDocenteMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelDivisionActividadDocenteMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RelDivisionActividadDocentePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RelDivisionActividadDocentePeer::TABLE_NAME);
		$tMap->setPhpName('RelDivisionActividadDocente');
		$tMap->setClassname('RelDivisionActividadDocente');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rel_division_actividad_docente_id_seq');

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_DIVISION_ID', 'FkDivisionId', 'INTEGER', 'division', 'ID', false, null);

		$tMap->addForeignKey('FK_ACTIVIDAD_ID', 'FkActividadId', 'INTEGER', 'actividad', 'ID', true, null);

		$tMap->addForeignKey('FK_DOCENTE_ID', 'FkDocenteId', 'INTEGER', 'docente', 'ID', false, null);

		$tMap->addForeignKey('FK_EVENTO_ID', 'FkEventoId', 'INTEGER', 'evento', 'ID', false, null);

	} 
} 