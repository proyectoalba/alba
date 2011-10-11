<?php



class RolMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RolMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RolPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RolPeer::TABLE_NAME);
		$tMap->setPhpName('Rol');
		$tMap->setClassname('Rol');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('ACTIVO', 'Activo', 'BOOLEAN', true, null);

	} 
} 