<?php



class EscalanotaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EscalanotaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(EscalanotaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(EscalanotaPeer::TABLE_NAME);
		$tMap->setPhpName('Escalanota');
		$tMap->setClassname('Escalanota');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'INTEGER', 'establecimiento', 'ID', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('ORDEN', 'Orden', 'INTEGER', true, null);

		$tMap->addColumn('APROBADO', 'Aprobado', 'BOOLEAN', true, null);

	} 
} 