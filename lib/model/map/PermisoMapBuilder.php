<?php



class PermisoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PermisoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(PermisoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(PermisoPeer::TABLE_NAME);
		$tMap->setPhpName('Permiso');
		$tMap->setClassname('Permiso');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

	} 
} 