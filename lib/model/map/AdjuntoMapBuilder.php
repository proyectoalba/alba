<?php



class AdjuntoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AdjuntoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(AdjuntoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AdjuntoPeer::TABLE_NAME);
		$tMap->setPhpName('Adjunto');
		$tMap->setClassname('Adjunto');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('TITULO', 'Titulo', 'VARCHAR', false, 255);

		$tMap->addColumn('NOMBRE_ARCHIVO', 'NombreArchivo', 'VARCHAR', true, 255);

		$tMap->addColumn('TIPO_ARCHIVO', 'TipoArchivo', 'VARCHAR', true, 64);

		$tMap->addColumn('RUTA', 'Ruta', 'VARCHAR', true, 255);

		$tMap->addColumn('FECHA', 'Fecha', 'TIMESTAMP', true, null);

	} 
} 