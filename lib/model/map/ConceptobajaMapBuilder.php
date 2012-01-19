<?php



class ConceptobajaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ConceptobajaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(ConceptobajaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ConceptobajaPeer::TABLE_NAME);
		$tMap->setPhpName('Conceptobaja');
		$tMap->setClassname('Conceptobaja');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

	} 
} 