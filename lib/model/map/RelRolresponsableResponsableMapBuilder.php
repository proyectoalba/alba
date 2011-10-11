<?php



class RelRolresponsableResponsableMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelRolresponsableResponsableMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RelRolresponsableResponsablePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RelRolresponsableResponsablePeer::TABLE_NAME);
		$tMap->setPhpName('RelRolresponsableResponsable');
		$tMap->setClassname('RelRolresponsableResponsable');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ROLRESPONSABLE_ID', 'FkRolresponsableId', 'INTEGER', 'rol_responsable', 'ID', true, null);

		$tMap->addForeignKey('FK_RESPONSABLE_ID', 'FkResponsableId', 'INTEGER', 'responsable', 'ID', true, null);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'INTEGER', 'alumno', 'ID', true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

	} 
} 