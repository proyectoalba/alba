<?php
		
require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'cuenta' table to 'alba' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an 
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive 
 * (i.e. if it's a text column type).
 *
 * @package model.map
 */	
class CuentaMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.CuentaMapBuilder';	

    /**
     * The database map.
     */
    private $dbMap;

	/**
     * Tells us if this DatabaseMapBuilder is built so that we
     * don't have to re-build it every time.
     *
     * @return boolean true if this DatabaseMapBuilder is built, false otherwise.
     */
    public function isBuilt()
    {
        return ($this->dbMap !== null);
    }

	/**
     * Gets the databasemap this map builder built.
     *
     * @return the databasemap
     */
    public function getDatabaseMap()
    {
        return $this->dbMap;
    }

    /**
     * The doBuild() method builds the DatabaseMap
     *
	 * @return void
     * @throws PropelException
     */
    public function doBuild()
    {
		$this->dbMap = Propel::getDatabaseMap('alba');
		
		$tMap = $this->dbMap->addTable('cuenta');
		$tMap->setPhpName('Cuenta');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('RAZON_SOCIAL', 'RazonSocial', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('CUIT', 'Cuit', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('DIRECCION', 'Direccion', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'int', CreoleTypes::INTEGER, 'provincia', 'ID', true, null);

		$tMap->addForeignKey('FK_TIPOIVA_ID', 'FkTipoivaId', 'int', CreoleTypes::INTEGER, 'tipoiva', 'ID', true, null);
				
    } // doBuild()

} // CuentaMapBuilder
