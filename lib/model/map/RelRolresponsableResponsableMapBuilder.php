<?php


	
class RelRolresponsableResponsableMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelRolresponsableResponsableMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('rel_rolresponsable_responsable');
		$tMap->setPhpName('RelRolresponsableResponsable');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addForeignKey('FK_ROLRESPONSABLE_ID', 'FkRolresponsableId', 'int', CreoleTypes::INTEGER, 'rol_responsable', 'ID', true, 11);

		$tMap->addForeignKey('FK_RESPONSABLE_ID', 'FkResponsableId', 'int', CreoleTypes::INTEGER, 'responsable', 'ID', true, 11);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 255);
				
    } 
} 