<?php


	
class RelUsuarioPreferenciaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelUsuarioPreferenciaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('rel_usuario_preferencia');
		$tMap->setPhpName('RelUsuarioPreferencia');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FK_USUARIO_ID', 'FkUsuarioId', 'int', CreoleTypes::INTEGER, true);

		$tMap->addColumn('FK_PREFERENCIA_ID', 'FkPreferenciaId', 'int', CreoleTypes::INTEGER, true);
				
    } 
} 