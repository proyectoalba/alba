<?php



class FeriadoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FeriadoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(FeriadoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(FeriadoPeer::TABLE_NAME);
		$tMap->setPhpName('Feriado');
		$tMap->setClassname('Feriado');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('FECHA', 'Fecha', 'TIMESTAMP', true, null);

		$tMap->addColumn('REPETICION_ANUAL', 'RepeticionAnual', 'BOOLEAN', false, null);

		$tMap->addColumn('INAMOVIBLE', 'Inamovible', 'BOOLEAN', false, null);

		$tMap->addForeignKey('FK_CICLOLECTIVO_ID', 'FkCiclolectivoId', 'INTEGER', 'ciclolectivo', 'ID', true, null);

	} 
} 