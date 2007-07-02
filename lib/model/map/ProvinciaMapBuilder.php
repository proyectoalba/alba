<?php



class ProvinciaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ProvinciaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('provincia');
		$tMap->setPhpName('Provincia');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE_CORTO', 'NombreCorto', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NOMBRE_LARGO', 'NombreLargo', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addForeignKey('FK_PAIS_ID', 'FkPaisId', 'int', CreoleTypes::INTEGER, 'pais', 'ID', true, null);

		$tMap->addColumn('ORDEN', 'Orden', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 