<?php



class AlbaConfigMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AlbaConfigMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(AlbaConfigPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AlbaConfigPeer::TABLE_NAME);
		$tMap->setPhpName('AlbaConfig');
		$tMap->setClassname('AlbaConfig');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 200);

		$tMap->addColumn('VALOR', 'Valor', 'LONGVARCHAR', false, null);

	} 
} 