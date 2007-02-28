<?php


	
class RepeticionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RepeticionMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('repeticion');
		$tMap->setPhpName('Repeticion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('ORDEN', 'Orden', 'int', CreoleTypes::INTEGER, true);
				
    } 
} 