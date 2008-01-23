<?php



class AsistenciaMapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');

		$tMap = $this->dbMap->addTable('asistencia');
		$tMap->setPhpName('Asistencia');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'int', CreoleTypes::INTEGER, 'alumno', 'ID', true, null);

		$tMap->addForeignKey('FK_TIPOASISTENCIA_ID', 'FkTipoasistenciaId', 'int', CreoleTypes::INTEGER, 'tipoasistencia', 'ID', true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 