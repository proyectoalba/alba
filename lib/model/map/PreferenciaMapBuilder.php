<?php



class PreferenciaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PreferenciaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(PreferenciaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(PreferenciaPeer::TABLE_NAME);
		$tMap->setPhpName('Preferencia');
		$tMap->setClassname('Preferencia');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('VALOR_POR_DEFECTO', 'ValorPorDefecto', 'VARCHAR', false, 128);

		$tMap->addColumn('ACTIVO', 'Activo', 'BOOLEAN', true, null);

	} 
} 