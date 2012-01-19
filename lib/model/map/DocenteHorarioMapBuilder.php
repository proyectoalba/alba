<?php



class DocenteHorarioMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DocenteHorarioMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DocenteHorarioPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DocenteHorarioPeer::TABLE_NAME);
		$tMap->setPhpName('DocenteHorario');
		$tMap->setClassname('DocenteHorario');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('FK_DOCENTE_ID', 'FkDocenteId', 'INTEGER' , 'docente', 'ID', true, null);

		$tMap->addForeignPrimaryKey('FK_EVENTO_ID', 'FkEventoId', 'INTEGER' , 'evento', 'ID', true, null);

	} 
} 