<?php



class AnioMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AnioMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(AnioPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AnioPeer::TABLE_NAME);
		$tMap->setPhpName('Anio');
		$tMap->setClassname('Anio');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'INTEGER', 'establecimiento', 'ID', true, null);

		$tMap->addForeignKey('FK_CARRERA_ID', 'FkCarreraId', 'INTEGER', 'carrera', 'ID', true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', true, 255);

		$tMap->addColumn('ORDEN', 'Orden', 'INTEGER', false, null);

	} 
} 