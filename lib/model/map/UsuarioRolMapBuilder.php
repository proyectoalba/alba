<?php



class UsuarioRolMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UsuarioRolMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(UsuarioRolPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(UsuarioRolPeer::TABLE_NAME);
		$tMap->setPhpName('UsuarioRol');
		$tMap->setClassname('UsuarioRol');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('FK_USUARIO_ID', 'FkUsuarioId', 'INTEGER' , 'usuario', 'ID', true, null);

		$tMap->addForeignPrimaryKey('FK_ROL_ID', 'FkRolId', 'INTEGER' , 'rol', 'ID', true, null);

	} 
} 