<?php



class TipoasistenciaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TipoasistenciaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(TipoasistenciaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(TipoasistenciaPeer::TABLE_NAME);
		$tMap->setPhpName('Tipoasistencia');
		$tMap->setClassname('Tipoasistencia');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 10);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('VALOR', 'Valor', 'DECIMAL', true, 4);

		$tMap->addColumn('GRUPO', 'Grupo', 'VARCHAR', false, 30);

		$tMap->addColumn('DEFECTO', 'Defecto', 'BOOLEAN', true, null);

	} 
} 