<?php



class TipoespacioMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TipoespacioMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(TipoespacioPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(TipoespacioPeer::TABLE_NAME);
		$tMap->setPhpName('Tipoespacio');
		$tMap->setClassname('Tipoespacio');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

	} 
} 