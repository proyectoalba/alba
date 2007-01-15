<?php
		
require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'responsable' table to 'alba' DatabaseMap object.
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
class ResponsableMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.ResponsableMapBuilder';	

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
		
		$tMap = $this->dbMap->addTable('responsable');
		$tMap->setPhpName('Responsable');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('APELLIDO', 'Apellido', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('DIRECCION', 'Direccion', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'int', CreoleTypes::INTEGER, 'provincia', 'ID', true, null);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('TELEFONO_MOVIL', 'TelefonoMovil', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('NRO_DOCUMENTO', 'NroDocumento', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addForeignKey('FK_TIPODOCUMENTO_ID', 'FkTipodocumentoId', 'int', CreoleTypes::INTEGER, 'tipodocumento', 'ID', true, null);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::CHAR, true);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('RELACION', 'Relacion', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('AUTORIZACION_RETIRO', 'AutorizacionRetiro', 'boolean', CreoleTypes::BOOLEAN, true);

		$tMap->addForeignKey('FK_CUENTA_ID', 'FkCuentaId', 'int', CreoleTypes::INTEGER, 'cuenta', 'ID', true, null);
				
    } // doBuild()

} // ResponsableMapBuilder
