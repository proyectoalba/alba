<?php



class TipolocacionMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TipolocacionMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(TipolocacionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(TipolocacionPeer::TABLE_NAME);
		$tMap->setPhpName('Tipolocacion');
		$tMap->setClassname('Tipolocacion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

	} 
} 