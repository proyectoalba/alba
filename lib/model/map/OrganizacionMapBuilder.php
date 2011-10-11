<?php



class OrganizacionMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OrganizacionMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(OrganizacionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(OrganizacionPeer::TABLE_NAME);
		$tMap->setPhpName('Organizacion');
		$tMap->setClassname('Organizacion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('RAZON_SOCIAL', 'RazonSocial', 'VARCHAR', true, 128);

		$tMap->addColumn('CUIT', 'Cuit', 'VARCHAR', true, 20);

		$tMap->addColumn('DIRECCION', 'Direccion', 'VARCHAR', true, 128);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'VARCHAR', true, 128);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'VARCHAR', true, 20);

		$tMap->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 20);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'INTEGER', 'provincia', 'ID', true, null);

		$tMap->addForeignKey('FK_TIPOIVA_ID', 'FkTipoivaId', 'INTEGER', 'tipoiva', 'ID', true, null);

	} 
} 