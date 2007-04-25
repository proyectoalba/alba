<?php


	
class EventoMapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');
		
		$tMap = $this->dbMap->addTable('evento');
		$tMap->setPhpName('Evento');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TITULO', 'Titulo', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('FECHA_INICIO', 'FechaInicio', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addColumn('FECHA_FIN', 'FechaFin', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addColumn('TIPO', 'Tipo', 'int', CreoleTypes::INTEGER, true);

		$tMap->addColumn('FRECUENCIA', 'Frecuencia', 'int', CreoleTypes::INTEGER, true);

		$tMap->addColumn('FRECUENCIA_INTERVALO', 'FrecuenciaIntervalo', 'int', CreoleTypes::INTEGER, true);

		$tMap->addColumn('RECURRENCIA_FIN', 'RecurrenciaFin', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('RECURRENCIA_DIAS', 'RecurrenciaDias', 'int', CreoleTypes::INTEGER, true);

		$tMap->addColumn('ESTADO', 'Estado', 'int', CreoleTypes::INTEGER, true);
				
    } 
} 