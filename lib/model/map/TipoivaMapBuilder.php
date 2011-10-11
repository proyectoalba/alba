<?php



class TipoivaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TipoivaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(TipoivaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(TipoivaPeer::TABLE_NAME);
		$tMap->setPhpName('Tipoiva');
		$tMap->setClassname('Tipoiva');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('ORDEN', 'Orden', 'INTEGER', false, null);

	} 
} 