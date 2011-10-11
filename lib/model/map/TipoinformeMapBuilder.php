<?php



class TipoinformeMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TipoinformeMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(TipoinformePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(TipoinformePeer::TABLE_NAME);
		$tMap->setPhpName('Tipoinforme');
		$tMap->setClassname('Tipoinforme');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

	} 
} 