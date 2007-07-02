<?php



class HorarioescolarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.HorarioescolarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('horarioescolar');
		$tMap->setPhpName('Horarioescolar');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addColumn('DIA', 'Dia', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addColumn('HORA_INICIO', 'HoraInicio', 'int', CreoleTypes::TIME, true, null);

		$tMap->addColumn('HORA_FIN', 'HoraFin', 'int', CreoleTypes::TIME, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'int', CreoleTypes::INTEGER, 'establecimiento', 'ID', true, null);

		$tMap->addForeignKey('FK_TURNOS_ID', 'FkTurnosId', 'int', CreoleTypes::INTEGER, 'turnos', 'ID', true, null);

		$tMap->addForeignKey('FK_HORARIOESCOLARTIPO_ID', 'FkHorarioescolartipoId', 'int', CreoleTypes::INTEGER, 'horarioescolartipo', 'ID', true, null);

	} 
} 