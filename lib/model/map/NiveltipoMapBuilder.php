<?php



class NiveltipoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NiveltipoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(NiveltipoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(NiveltipoPeer::TABLE_NAME);
		$tMap->setPhpName('Niveltipo');
		$tMap->setClassname('Niveltipo');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

	} 
} 