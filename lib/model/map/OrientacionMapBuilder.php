<?php



class OrientacionMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OrientacionMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(OrientacionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(OrientacionPeer::TABLE_NAME);
		$tMap->setPhpName('Orientacion');
		$tMap->setClassname('Orientacion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

	} 
} 