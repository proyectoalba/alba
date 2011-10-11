<?php



class RelCalendariovacunacionAlumnoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelCalendariovacunacionAlumnoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RelCalendariovacunacionAlumnoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RelCalendariovacunacionAlumnoPeer::TABLE_NAME);
		$tMap->setPhpName('RelCalendariovacunacionAlumno');
		$tMap->setClassname('RelCalendariovacunacionAlumno');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'INTEGER', 'alumno', 'ID', true, null);

		$tMap->addForeignKey('FK_CALENDARIOVACUNACION_ID', 'FkCalendariovacunacionId', 'INTEGER', 'calendariovacunacion', 'ID', true, null);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'VARCHAR', false, 255);

		$tMap->addColumn('COMPROBANTE', 'Comprobante', 'BOOLEAN', true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'TIMESTAMP', false, null);

	} 
} 