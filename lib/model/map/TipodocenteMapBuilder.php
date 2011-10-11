<?php



class TipodocenteMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TipodocenteMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(TipodocentePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(TipodocentePeer::TABLE_NAME);
		$tMap->setPhpName('Tipodocente');
		$tMap->setClassname('Tipodocente');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

	} 
} 