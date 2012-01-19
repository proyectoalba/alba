<?php



class NivelInstruccionMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NivelInstruccionMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(NivelInstruccionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(NivelInstruccionPeer::TABLE_NAME);
		$tMap->setPhpName('NivelInstruccion');
		$tMap->setClassname('NivelInstruccion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 60);

	} 
} 