<?php



class RelEstablecimientoLocacionMapBuilder implements MapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap(RelEstablecimientoLocacionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RelEstablecimientoLocacionPeer::TABLE_NAME);
		$tMap->setPhpName('RelEstablecimientoLocacion');
		$tMap->setClassname('RelEstablecimientoLocacion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'INTEGER', 'establecimiento', 'ID', true, null);

		$tMap->addForeignKey('FK_LOCACION_ID', 'FkLocacionId', 'INTEGER', 'locacion', 'ID', true, null);

	} 
} 