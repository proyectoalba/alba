<?php



class RelRolPermisoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelRolPermisoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');

		$tMap = $this->dbMap->addTable('rel_rol_permiso');
		$tMap->setPhpName('RelRolPermiso');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('FK_ROL_ID', 'FkRolId', 'int', CreoleTypes::INTEGER, 'rol', 'ID', true, null);

		$tMap->addForeignKey('FK_PERMISO_ID', 'FkPermisoId', 'int', CreoleTypes::INTEGER, 'permiso', 'ID', true, null);

	} 
} 