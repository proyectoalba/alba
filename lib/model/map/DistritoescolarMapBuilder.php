<?php



class DistritoescolarMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DistritoescolarMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DistritoescolarPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DistritoescolarPeer::TABLE_NAME);
		$tMap->setPhpName('Distritoescolar');
		$tMap->setClassname('Distritoescolar');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DIRECCION', 'Direccion', 'VARCHAR', false, 128);

		$tMap->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 20);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'VARCHAR', false, 128);

	} 
} 