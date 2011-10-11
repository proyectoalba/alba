<?php



class LegajocategoriaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LegajocategoriaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(LegajocategoriaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(LegajocategoriaPeer::TABLE_NAME);
		$tMap->setPhpName('Legajocategoria');
		$tMap->setClassname('Legajocategoria');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', true, 255);

	} 
} 