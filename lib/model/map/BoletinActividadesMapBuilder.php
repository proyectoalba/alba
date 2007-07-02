<?php



class BoletinActividadesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BoletinActividadesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('boletin_actividades');
		$tMap->setPhpName('BoletinActividades');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addForeignKey('FK_ESCALANOTA_ID', 'FkEscalanotaId', 'int', CreoleTypes::INTEGER, 'escalanota', 'ID', true, 11);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'int', CreoleTypes::INTEGER, 'alumno', 'ID', true, 11);

		$tMap->addForeignKey('FK_ACTIVIDAD_ID', 'FkActividadId', 'int', CreoleTypes::INTEGER, 'actividad', 'ID', true, 11);

		$tMap->addForeignKey('FK_PERIODO_ID', 'FkPeriodoId', 'int', CreoleTypes::INTEGER, 'periodo', 'ID', true, 11);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::BLOB, true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 