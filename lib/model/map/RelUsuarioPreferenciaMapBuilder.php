<?php



class RelUsuarioPreferenciaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelUsuarioPreferenciaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RelUsuarioPreferenciaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RelUsuarioPreferenciaPeer::TABLE_NAME);
		$tMap->setPhpName('RelUsuarioPreferencia');
		$tMap->setClassname('RelUsuarioPreferencia');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('FK_USUARIO_ID', 'FkUsuarioId', 'INTEGER', true, null);

		$tMap->addColumn('FK_PREFERENCIA_ID', 'FkPreferenciaId', 'INTEGER', true, null);

	} 
} 