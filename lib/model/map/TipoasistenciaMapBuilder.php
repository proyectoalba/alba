<?php


	
class TipoasistenciaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TipoasistenciaMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('tipoasistencia');
		$tMap->setPhpName('Tipoasistencia');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('VALOR', 'Valor', 'double', CreoleTypes::DECIMAL, true);

		$tMap->addColumn('GRUPO', 'Grupo', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('DEFECTO', 'Defecto', 'boolean', CreoleTypes::BOOLEAN, true);
				
    } 
} 