<?php



class ExamenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ExamenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('examen');
		$tMap->setPhpName('Examen');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('FK_ESCALANOTA_ID', 'FkEscalanotaId', 'int', CreoleTypes::INTEGER, 'escalanota', 'ID', true, null);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'int', CreoleTypes::INTEGER, 'alumno', 'ID', true, null);

		$tMap->addForeignKey('FK_ACTIVIDAD_ID', 'FkActividadId', 'int', CreoleTypes::INTEGER, 'actividad', 'ID', true, null);

		$tMap->addForeignKey('FK_PERIODO_ID', 'FkPeriodoId', 'int', CreoleTypes::INTEGER, 'periodo', 'ID', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::BLOB, true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 