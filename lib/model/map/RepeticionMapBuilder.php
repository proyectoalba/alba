<?php



class RepeticionMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RepeticionMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RepeticionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RepeticionPeer::TABLE_NAME);
		$tMap->setPhpName('Repeticion');
		$tMap->setClassname('Repeticion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', true, 255);

		$tMap->addColumn('ORDEN', 'Orden', 'INTEGER', true, null);

	} 
} 