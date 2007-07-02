<?php



class RelEstablecimientoLocacionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelEstablecimientoLocacionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rel_establecimiento_locacion');
		$tMap->setPhpName('RelEstablecimientoLocacion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'int', CreoleTypes::INTEGER, 'establecimiento', 'ID', true, null);

		$tMap->addForeignKey('FK_LOCACION_ID', 'FkLocacionId', 'int', CreoleTypes::INTEGER, 'locacion', 'ID', true, null);

	} 
} 