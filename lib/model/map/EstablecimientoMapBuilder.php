<?php


	
class EstablecimientoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EstablecimientoMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('establecimiento');
		$tMap->setPhpName('Establecimiento');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addForeignKey('FK_DISTRITOESCOLAR_ID', 'FkDistritoescolarId', 'int', CreoleTypes::INTEGER, 'distritoescolar', 'ID', true, null);

		$tMap->addForeignKey('FK_ORGANIZACION_ID', 'FkOrganizacionId', 'int', CreoleTypes::INTEGER, 'organizacion', 'ID', true, null);

		$tMap->addForeignKey('FK_NIVELTIPO_ID', 'FkNiveltipoId', 'int', CreoleTypes::INTEGER, 'niveltipo', 'ID', true, null);
				
    } 
} 