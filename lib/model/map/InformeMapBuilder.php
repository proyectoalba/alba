<?php



class InformeMapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');

		$tMap = $this->dbMap->addTable('informe');
		$tMap->setPhpName('Informe');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addForeignKey('FK_ADJUNTO_ID', 'FkAdjuntoId', 'int', CreoleTypes::INTEGER, 'adjunto', 'ID', true, null);

		$tMap->addForeignKey('FK_TIPOINFORME_ID', 'FkTipoinformeId', 'int', CreoleTypes::INTEGER, 'tipoinforme', 'ID', true, null);

		$tMap->addColumn('LISTADO', 'Listado', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addColumn('VARIABLES', 'Variables', 'string', CreoleTypes::VARCHAR, false, 128);

	} 
} 