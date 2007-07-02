<?php



class RelCalendariovacunacionAlumnoMapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');

		$tMap = $this->dbMap->addTable('rel_calendariovacunacion_alumno');
		$tMap->setPhpName('RelCalendariovacunacionAlumno');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'int', CreoleTypes::INTEGER, 'alumno', 'ID', true, 11);

		$tMap->addForeignKey('FK_CALENDARIOVACUNACION_ID', 'FkCalendariovacunacionId', 'int', CreoleTypes::INTEGER, 'calendariovacunacion', 'ID', true, 11);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('COMPROBANTE', 'Comprobante', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 