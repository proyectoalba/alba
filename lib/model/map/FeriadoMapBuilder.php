<?php


	
class FeriadoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FeriadoMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('feriado');
		$tMap->setPhpName('Feriado');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addColumn('REPETICION_ANUAL', 'RepeticionAnual', 'boolean', CreoleTypes::BOOLEAN, false);

		$tMap->addColumn('INAMOVIBLE', 'Inamovible', 'boolean', CreoleTypes::BOOLEAN, false);

		$tMap->addForeignKey('FK_CICLOLECTIVO_ID', 'FkCiclolectivoId', 'int', CreoleTypes::INTEGER, 'ciclolectivo', 'ID', true, 11);
				
    } 
} 