<?php


	
class DocenteHorarioMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DocenteHorarioMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('docente_horario');
		$tMap->setPhpName('DocenteHorario');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addForeignKey('FK_DOCENTE_ID', 'FkDocenteId', 'int', CreoleTypes::INTEGER, 'docente', 'ID', true, 11);

		$tMap->addForeignKey('FK_REPETICION_ID', 'FkRepeticionId', 'int', CreoleTypes::INTEGER, 'repeticion', 'ID', true, 11);

		$tMap->addColumn('HORA_INICIO', 'HoraInicio', 'int', CreoleTypes::TIME, true);

		$tMap->addColumn('HORA_FIN', 'HoraFin', 'int', CreoleTypes::TIME, true);

		$tMap->addColumn('DIA', 'Dia', 'int', CreoleTypes::INTEGER, true);
				
    } 
} 