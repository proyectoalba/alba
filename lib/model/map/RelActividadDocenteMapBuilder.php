<?php


	
class RelActividadDocenteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelActividadDocenteMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('rel_actividad_docente');
		$tMap->setPhpName('RelActividadDocente');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addForeignKey('FK_ACTIVIDAD_ID', 'FkActividadId', 'int', CreoleTypes::INTEGER, 'actividad', 'ID', true, 11);

		$tMap->addForeignKey('FK_DOCENTE_ID', 'FkDocenteId', 'int', CreoleTypes::INTEGER, 'docente', 'ID', true, 11);
				
    } 
} 