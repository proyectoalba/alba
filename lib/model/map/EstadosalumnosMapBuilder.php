<?php



class EstadosalumnosMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EstadosalumnosMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(EstadosalumnosPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(EstadosalumnosPeer::TABLE_NAME);
		$tMap->setPhpName('Estadosalumnos');
		$tMap->setClassname('Estadosalumnos');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

	} 
} 