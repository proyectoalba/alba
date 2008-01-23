<?php



class AdjuntoMapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');

		$tMap = $this->dbMap->addTable('adjunto');
		$tMap->setPhpName('Adjunto');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TITULO', 'Titulo', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('NOMBRE_ARCHIVO', 'NombreArchivo', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TIPO_ARCHIVO', 'TipoArchivo', 'string', CreoleTypes::VARCHAR, true, 64);

		$tMap->addColumn('RUTA', 'Ruta', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 