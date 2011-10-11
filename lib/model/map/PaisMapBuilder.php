<?php



class PaisMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PaisMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(PaisPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(PaisPeer::TABLE_NAME);
		$tMap->setPhpName('Pais');
		$tMap->setClassname('Pais');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE_LARGO', 'NombreLargo', 'VARCHAR', true, 128);

		$tMap->addColumn('NOMBRE_CORTO', 'NombreCorto', 'VARCHAR', true, 32);

		$tMap->addColumn('ORDEN', 'Orden', 'INTEGER', false, null);

	} 
} 