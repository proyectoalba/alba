<?php



class CalendariovacunacionMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CalendariovacunacionMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(CalendariovacunacionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CalendariovacunacionPeer::TABLE_NAME);
		$tMap->setPhpName('Calendariovacunacion');
		$tMap->setClassname('Calendariovacunacion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('PERIODO', 'Periodo', 'VARCHAR', false, 128);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'VARCHAR', false, 255);

	} 
} 