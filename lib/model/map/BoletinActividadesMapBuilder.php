<?php



class BoletinActividadesMapBuilder implements MapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap(BoletinActividadesPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(BoletinActividadesPeer::TABLE_NAME);
		$tMap->setPhpName('BoletinActividades');
		$tMap->setClassname('BoletinActividades');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ESCALANOTA_ID', 'FkEscalanotaId', 'INTEGER', 'escalanota', 'ID', false, null);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'INTEGER', 'alumno', 'ID', true, null);

		$tMap->addForeignKey('FK_ACTIVIDAD_ID', 'FkActividadId', 'INTEGER', 'actividad', 'ID', true, null);

		$tMap->addForeignKey('FK_PERIODO_ID', 'FkPeriodoId', 'INTEGER', 'periodo', 'ID', true, null);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'LONGVARCHAR', false, null);

		$tMap->addColumn('FECHA', 'Fecha', 'TIMESTAMP', true, null);

	} 
} 