<?php



class UsuarioPermisoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UsuarioPermisoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(UsuarioPermisoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(UsuarioPermisoPeer::TABLE_NAME);
		$tMap->setPhpName('UsuarioPermiso');
		$tMap->setClassname('UsuarioPermiso');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('FK_USUARIO_ID', 'FkUsuarioId', 'INTEGER' , 'usuario', 'ID', true, null);

		$tMap->addForeignPrimaryKey('FK_PERMISO_ID', 'FkPermisoId', 'INTEGER' , 'permiso', 'ID', true, null);

	} 
} 