<?php



class EspacioMapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');

		$tMap = $this->dbMap->addTable('espacio');
		$tMap->setPhpName('Espacio');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('M2', 'M2', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('CAPACIDAD', 'Capacidad', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ESTADO', 'Estado', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addForeignKey('FK_TIPOESPACIO_ID', 'FkTipoespacioId', 'int', CreoleTypes::INTEGER, 'tipoespacio', 'ID', false, 11);

		$tMap->addForeignKey('FK_LOCACION_ID', 'FkLocacionId', 'int', CreoleTypes::INTEGER, 'locacion', 'ID', true, null);

	} 
} 