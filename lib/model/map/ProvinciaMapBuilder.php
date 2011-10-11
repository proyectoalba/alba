<?php



class ProvinciaMapBuilder implements MapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap(ProvinciaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ProvinciaPeer::TABLE_NAME);
		$tMap->setPhpName('Provincia');
		$tMap->setClassname('Provincia');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE_CORTO', 'NombreCorto', 'VARCHAR', true, 32);

		$tMap->addColumn('NOMBRE_LARGO', 'NombreLargo', 'VARCHAR', true, 128);

		$tMap->addForeignKey('FK_PAIS_ID', 'FkPaisId', 'INTEGER', 'pais', 'ID', true, null);

		$tMap->addColumn('ORDEN', 'Orden', 'INTEGER', false, null);

	} 
} 