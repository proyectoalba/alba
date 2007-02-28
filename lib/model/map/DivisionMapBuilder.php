<?php


	
class DivisionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DivisionMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('division');
		$tMap->setPhpName('Division');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addForeignKey('FK_ANIO_ID', 'FkAnioId', 'int', CreoleTypes::INTEGER, 'anio', 'ID', true, 11);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('FK_TURNOS_ID', 'FkTurnosId', 'int', CreoleTypes::INTEGER, 'turnos', 'ID', true, 11);
				
    } 
} 