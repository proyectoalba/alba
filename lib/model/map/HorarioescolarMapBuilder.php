<?php



class HorarioescolarMapBuilder implements MapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap(HorarioescolarPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(HorarioescolarPeer::TABLE_NAME);
		$tMap->setPhpName('Horarioescolar');
		$tMap->setClassname('Horarioescolar');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addForeignKey('FK_EVENTO_ID', 'FkEventoId', 'INTEGER', 'evento', 'ID', false, null);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'INTEGER', 'establecimiento', 'ID', true, null);

		$tMap->addForeignKey('FK_TURNO_ID', 'FkTurnoId', 'INTEGER', 'turno', 'ID', true, null);

		$tMap->addForeignKey('FK_HORARIOESCOLARTIPO_ID', 'FkHorarioescolartipoId', 'INTEGER', 'horarioescolartipo', 'ID', true, null);

	} 
} 