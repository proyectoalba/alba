<?php


	
class RelDivisionActividadDocenteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelDivisionActividadDocenteMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('rel_division_actividad_docente');
		$tMap->setPhpName('RelDivisionActividadDocente');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addForeignKey('FK_DIVISION_ID', 'FkDivisionId', 'int', CreoleTypes::INTEGER, 'division', 'ID', false, 11);

		$tMap->addForeignKey('FK_ACTIVIDAD_ID', 'FkActividadId', 'int', CreoleTypes::INTEGER, 'actividad', 'ID', true, 11);

		$tMap->addForeignKey('FK_DOCENTE_ID', 'FkDocenteId', 'int', CreoleTypes::INTEGER, 'docente', 'ID', false, 11);

		$tMap->addForeignKey('FK_EVENTO_ID', 'FkEventoId', 'int', CreoleTypes::INTEGER, 'evento', 'ID', false, 11);

		$tMap->addForeignKey('FK_REPETICION_ID', 'FkRepeticionId', 'int', CreoleTypes::INTEGER, 'repeticion', 'ID', false, 11);

		$tMap->addColumn('FECHA_INICIO', 'FechaInicio', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addColumn('FECHA_FIN', 'FechaFin', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addColumn('HORA_INICIO', 'HoraInicio', 'int', CreoleTypes::TIME, true);

		$tMap->addColumn('HORA_FIN', 'HoraFin', 'int', CreoleTypes::TIME, true);
				
    } 
} 