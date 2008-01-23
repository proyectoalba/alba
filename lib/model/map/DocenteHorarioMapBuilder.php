<?php



class DocenteHorarioMapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');

		$tMap = $this->dbMap->addTable('docente_horario');
		$tMap->setPhpName('DocenteHorario');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('FK_DOCENTE_ID', 'FkDocenteId', 'int' , CreoleTypes::INTEGER, 'docente', 'ID', true, 11);

		$tMap->addForeignPrimaryKey('FK_EVENTO_ID', 'FkEventoId', 'int' , CreoleTypes::INTEGER, 'evento', 'ID', true, 11);

	} 
} 