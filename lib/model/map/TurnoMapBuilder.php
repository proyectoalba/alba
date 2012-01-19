<?php



class TurnoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TurnoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(TurnoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(TurnoPeer::TABLE_NAME);
		$tMap->setPhpName('Turno');
		$tMap->setClassname('Turno');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_CICLOLECTIVO_ID', 'FkCiclolectivoId', 'INTEGER', 'ciclolectivo', 'ID', true, null);

		$tMap->addColumn('HORA_INICIO', 'HoraInicio', 'TIME', true, null);

		$tMap->addColumn('HORA_FIN', 'HoraFin', 'TIME', true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', true, 255);

	} 
} 