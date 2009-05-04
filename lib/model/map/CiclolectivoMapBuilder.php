<?php



class CiclolectivoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CiclolectivoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(CiclolectivoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CiclolectivoPeer::TABLE_NAME);
		$tMap->setPhpName('Ciclolectivo');
		$tMap->setClassname('Ciclolectivo');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'INTEGER', 'establecimiento', 'ID', true, null);

		$tMap->addColumn('FECHA_INICIO', 'FechaInicio', 'TIMESTAMP', true, null);

		$tMap->addColumn('FECHA_FIN', 'FechaFin', 'TIMESTAMP', true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', true, 255);

		$tMap->addColumn('ACTUAL', 'Actual', 'BOOLEAN', true, null);

	} 
} 