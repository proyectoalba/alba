<?php


	
class RelUsuarioPermisoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelUsuarioPermisoMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('rel_usuario_permiso');
		$tMap->setPhpName('RelUsuarioPermiso');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('FK_USUARIO_ID', 'FkUsuarioId', 'int', CreoleTypes::INTEGER, 'usuario', 'ID', true, null);

		$tMap->addForeignKey('FK_PERMISO_ID', 'FkPermisoId', 'int', CreoleTypes::INTEGER, 'permiso', 'ID', true, null);
				
    } 
} 