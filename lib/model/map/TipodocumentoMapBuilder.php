<?php



class TipodocumentoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TipodocumentoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(TipodocumentoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(TipodocumentoPeer::TABLE_NAME);
		$tMap->setPhpName('Tipodocumento');
		$tMap->setClassname('Tipodocumento');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('ORDEN', 'Orden', 'INTEGER', false, null);

	} 
} 