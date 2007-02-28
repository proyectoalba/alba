<?php


	
class PermisoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PermisoMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('permiso');
		$tMap->setPhpName('Permiso');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addForeignKey('FK_MODULO_ID', 'FkModuloId', 'int', CreoleTypes::INTEGER, 'modulo', 'ID', true, null);

		$tMap->addColumn('CREDENCIAL', 'Credencial', 'string', CreoleTypes::VARCHAR, false, 32);
				
    } 
} 