<?php



class LegajoadjuntoMapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');

		$tMap = $this->dbMap->addTable('legajoadjunto');
		$tMap->setPhpName('Legajoadjunto');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignKey('FK_LEGAJOPEDAGOGICO_ID', 'FkLegajopedagogicoId', 'int', CreoleTypes::INTEGER, 'legajopedagogico', 'ID', true, 11);

		$tMap->addForeignKey('FK_ADJUNTO_ID', 'FkAdjuntoId', 'int', CreoleTypes::INTEGER, 'adjunto', 'ID', true, 11);

	} 
} 