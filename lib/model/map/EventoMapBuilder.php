<?php



class EventoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EventoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(EventoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(EventoPeer::TABLE_NAME);
		$tMap->setPhpName('Evento');
		$tMap->setClassname('Evento');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('TITULO', 'Titulo', 'VARCHAR', true, 128);

		$tMap->addColumn('FECHA_INICIO', 'FechaInicio', 'TIMESTAMP', true, null);

		$tMap->addColumn('FECHA_FIN', 'FechaFin', 'TIMESTAMP', true, null);

		$tMap->addColumn('TIPO', 'Tipo', 'INTEGER', true, null);

		$tMap->addColumn('FRECUENCIA', 'Frecuencia', 'INTEGER', true, null);

		$tMap->addColumn('FRECUENCIA_INTERVALO', 'FrecuenciaIntervalo', 'INTEGER', true, null);

		$tMap->addColumn('RECURRENCIA_FIN', 'RecurrenciaFin', 'VARCHAR', false, 32);

		$tMap->addColumn('RECURRENCIA_DIAS', 'RecurrenciaDias', 'INTEGER', true, null);

		$tMap->addColumn('ESTADO', 'Estado', 'INTEGER', true, null);

	} 
} 