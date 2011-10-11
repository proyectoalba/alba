<?php



class LocacionMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LocacionMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(LocacionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(LocacionPeer::TABLE_NAME);
		$tMap->setPhpName('Locacion');
		$tMap->setClassname('Locacion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('DIRECCION', 'Direccion', 'VARCHAR', true, 128);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'VARCHAR', true, 128);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'VARCHAR', false, 20);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'INTEGER', 'provincia', 'ID', true, null);

		$tMap->addForeignKey('FK_TIPOLOCACION_ID', 'FkTipolocacionId', 'INTEGER', 'tipolocacion', 'ID', true, null);

		$tMap->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 20);

		$tMap->addColumn('FAX', 'Fax', 'VARCHAR', false, 20);

		$tMap->addColumn('ENCARGADO', 'Encargado', 'VARCHAR', false, 128);

		$tMap->addColumn('ENCARGADO_TELEFONO', 'EncargadoTelefono', 'VARCHAR', false, 20);

		$tMap->addColumn('PRINCIPAL', 'Principal', 'BOOLEAN', true, null);

	} 
} 