<?php



class RelDocenteEstablecimientoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelDocenteEstablecimientoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RelDocenteEstablecimientoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RelDocenteEstablecimientoPeer::TABLE_NAME);
		$tMap->setPhpName('RelDocenteEstablecimiento');
		$tMap->setClassname('RelDocenteEstablecimiento');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'INTEGER', 'establecimiento', 'ID', true, null);

		$tMap->addForeignKey('FK_DOCENTE_ID', 'FkDocenteId', 'INTEGER', 'docente', 'ID', true, null);

	} 
} 