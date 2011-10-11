<?php



class RolPermisoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RolPermisoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RolPermisoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RolPermisoPeer::TABLE_NAME);
		$tMap->setPhpName('RolPermiso');
		$tMap->setClassname('RolPermiso');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ROL_ID', 'FkRolId', 'INTEGER', 'rol', 'ID', true, null);

		$tMap->addForeignKey('FK_PERMISO_ID', 'FkPermisoId', 'INTEGER', 'permiso', 'ID', true, null);

	} 
} 