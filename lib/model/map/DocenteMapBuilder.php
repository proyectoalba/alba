<?php
		
require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'docente' table to 'alba' DatabaseMap object.
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
class DocenteMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.DocenteMapBuilder';	

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
		
		$tMap = $this->dbMap->addTable('docente');
		$tMap->setPhpName('Docente');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('APELLIDO', 'Apellido', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::CHAR, false);

		$tMap->addColumn('FECHA_NACIMIENTO', 'FechaNacimiento', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addForeignKey('FK_TIPODOCUMENTO_ID', 'FkTipodocumentoId', 'int', CreoleTypes::INTEGER, 'tipodocumento', 'ID', true, 11);

		$tMap->addColumn('NRO_DOCUMENTO', 'NroDocumento', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('DIRECCION', 'Direccion', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('TELEFONO_MOVIL', 'TelefonoMovil', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('TITULO', 'Titulo', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('LIBRETA_SANITARIA', 'LibretaSanitaria', 'boolean', CreoleTypes::BOOLEAN, false);

		$tMap->addColumn('PSICOFISICO', 'Psicofisico', 'boolean', CreoleTypes::BOOLEAN, false);

		$tMap->addColumn('ACTIVO', 'Activo', 'boolean', CreoleTypes::BOOLEAN, false);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'int', CreoleTypes::INTEGER, 'provincia', 'ID', true, 11);
				
    } // doBuild()

} // DocenteMapBuilder
