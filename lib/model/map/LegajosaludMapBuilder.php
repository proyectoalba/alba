<?php



class LegajosaludMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LegajosaludMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(LegajosaludPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(LegajosaludPeer::TABLE_NAME);
		$tMap->setPhpName('Legajosalud');
		$tMap->setClassname('Legajosalud');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'INTEGER', 'alumno', 'ID', true, null);

		$tMap->addColumn('TITULO', 'Titulo', 'VARCHAR', true, 255);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'LONGVARCHAR', true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'TIMESTAMP', true, null);

		$tMap->addForeignKey('FK_USUARIO_ID', 'FkUsuarioId', 'INTEGER', 'usuario', 'ID', true, null);

	} 
} 