<?php



class LegajoadjuntoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LegajoadjuntoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(LegajoadjuntoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(LegajoadjuntoPeer::TABLE_NAME);
		$tMap->setPhpName('Legajoadjunto');
		$tMap->setClassname('Legajoadjunto');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('FK_LEGAJOPEDAGOGICO_ID', 'FkLegajopedagogicoId', 'INTEGER', 'legajopedagogico', 'ID', true, null);

		$tMap->addForeignKey('FK_ADJUNTO_ID', 'FkAdjuntoId', 'INTEGER', 'adjunto', 'ID', true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} 
} 