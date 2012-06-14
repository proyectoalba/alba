<?php



class CuentaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CuentaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(CuentaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CuentaPeer::TABLE_NAME);
		$tMap->setPhpName('Cuenta');
		$tMap->setClassname('Cuenta');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('RAZON_SOCIAL', 'RazonSocial', 'VARCHAR', false, 128);

		$tMap->addColumn('CUIT', 'Cuit', 'VARCHAR', false, 20);

		$tMap->addColumn('DIRECCION', 'Direccion', 'VARCHAR', false, 128);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'VARCHAR', false, 128);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'VARCHAR', false, 20);

		$tMap->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 20);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'INTEGER', 'provincia', 'ID', false, null);

		$tMap->addForeignKey('FK_TIPOIVA_ID', 'FkTipoivaId', 'INTEGER', 'tipoiva', 'ID', true, null);

	} 
} 