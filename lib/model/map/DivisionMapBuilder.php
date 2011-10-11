<?php



class DivisionMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DivisionMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DivisionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DivisionPeer::TABLE_NAME);
		$tMap->setPhpName('Division');
		$tMap->setClassname('Division');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ANIO_ID', 'FkAnioId', 'INTEGER', 'anio', 'ID', true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', true, 255);

		$tMap->addForeignKey('FK_TURNO_ID', 'FkTurnoId', 'INTEGER', 'turno', 'ID', true, null);

		$tMap->addForeignKey('FK_ORIENTACION_ID', 'FkOrientacionId', 'INTEGER', 'orientacion', 'ID', false, null);

		$tMap->addColumn('ORDEN', 'Orden', 'INTEGER', false, null);

	} 
} 