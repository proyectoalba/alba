<?php



class AsistenciaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AsistenciaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(AsistenciaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AsistenciaPeer::TABLE_NAME);
		$tMap->setPhpName('Asistencia');
		$tMap->setClassname('Asistencia');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'INTEGER', 'alumno', 'ID', true, null);

		$tMap->addForeignKey('FK_TIPOASISTENCIA_ID', 'FkTipoasistenciaId', 'INTEGER', 'tipoasistencia', 'ID', true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'TIMESTAMP', true, null);

	} 
} 