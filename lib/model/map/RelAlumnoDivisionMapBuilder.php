<?php



class RelAlumnoDivisionMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelAlumnoDivisionMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RelAlumnoDivisionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RelAlumnoDivisionPeer::TABLE_NAME);
		$tMap->setPhpName('RelAlumnoDivision');
		$tMap->setClassname('RelAlumnoDivision');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_DIVISION_ID', 'FkDivisionId', 'INTEGER', 'division', 'ID', true, null);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'INTEGER', 'alumno', 'ID', true, null);

	} 
} 