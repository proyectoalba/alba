<?php



class RelUsuarioPermisoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelUsuarioPermisoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RelUsuarioPermisoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RelUsuarioPermisoPeer::TABLE_NAME);
		$tMap->setPhpName('RelUsuarioPermiso');
		$tMap->setClassname('RelUsuarioPermiso');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_USUARIO_ID', 'FkUsuarioId', 'INTEGER', 'usuario', 'ID', true, null);

		$tMap->addForeignKey('FK_PERMISO_ID', 'FkPermisoId', 'INTEGER', 'permiso', 'ID', true, null);

	} 
} 