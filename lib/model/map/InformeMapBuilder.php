<?php



class InformeMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InformeMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(InformePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(InformePeer::TABLE_NAME);
		$tMap->setPhpName('Informe');
		$tMap->setClassname('Informe');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addForeignKey('FK_ADJUNTO_ID', 'FkAdjuntoId', 'INTEGER', 'adjunto', 'ID', true, null);

		$tMap->addForeignKey('FK_TIPOINFORME_ID', 'FkTipoinformeId', 'INTEGER', 'tipoinforme', 'ID', true, null);

		$tMap->addColumn('LISTADO', 'Listado', 'BOOLEAN', true, null);

		$tMap->addColumn('VARIABLES', 'Variables', 'VARCHAR', false, 128);

	} 
} 