<?php



class HorarioescolartipoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.HorarioescolartipoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(HorarioescolartipoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(HorarioescolartipoPeer::TABLE_NAME);
		$tMap->setPhpName('Horarioescolartipo');
		$tMap->setClassname('Horarioescolartipo');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

	} 
} 