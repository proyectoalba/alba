<?php



class EspacioMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EspacioMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(EspacioPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(EspacioPeer::TABLE_NAME);
		$tMap->setPhpName('Espacio');
		$tMap->setClassname('Espacio');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('M2', 'M2', 'FLOAT', false, null);

		$tMap->addColumn('CAPACIDAD', 'Capacidad', 'VARCHAR', false, 255);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('ESTADO', 'Estado', 'VARCHAR', false, 255);

		$tMap->addForeignKey('FK_TIPOESPACIO_ID', 'FkTipoespacioId', 'INTEGER', 'tipoespacio', 'ID', false, null);

		$tMap->addForeignKey('FK_LOCACION_ID', 'FkLocacionId', 'INTEGER', 'locacion', 'ID', true, null);

	} 
} 