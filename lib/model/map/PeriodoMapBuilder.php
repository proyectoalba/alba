<?php



class PeriodoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PeriodoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(PeriodoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(PeriodoPeer::TABLE_NAME);
		$tMap->setPhpName('Periodo');
		$tMap->setClassname('Periodo');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_CICLOLECTIVO_ID', 'FkCiclolectivoId', 'INTEGER', 'ciclolectivo', 'ID', true, null);

		$tMap->addColumn('FECHA_INICIO', 'FechaInicio', 'TIMESTAMP', true, null);

		$tMap->addColumn('FECHA_FIN', 'FechaFin', 'TIMESTAMP', true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', true, 255);

		$tMap->addColumn('CALCULAR', 'Calcular', 'BOOLEAN', true, null);

		$tMap->addColumn('FORMULA', 'Formula', 'VARCHAR', false, 1000);

	} 
} 