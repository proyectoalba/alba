<?php



class CarreraMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CarreraMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(CarreraPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CarreraPeer::TABLE_NAME);
		$tMap->setPhpName('Carrera');
		$tMap->setClassname('Carrera');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'INTEGER', 'establecimiento', 'ID', true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', true, 255);

		$tMap->addColumn('ORDEN', 'Orden', 'INTEGER', false, null);

	} 
} 