<?php
		
require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'alumno' table to 'alba' DatabaseMap object.
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
class AlumnoMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.AlumnoMapBuilder';	

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
		
		$tMap = $this->dbMap->addTable('alumno');
		$tMap->setPhpName('Alumno');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('APELLIDO', 'Apellido', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('FECHA_NACIMIENTO', 'FechaNacimiento', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addColumn('DIRECCION', 'Direccion', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'int', CreoleTypes::INTEGER, 'provincia', 'ID', true, null);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('LUGAR_NACIMIENTO', 'LugarNacimiento', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addForeignKey('FK_TIPODOCUMENTO_ID', 'FkTipodocumentoId', 'int', CreoleTypes::INTEGER, 'tipodocumento', 'ID', true, 11);

		$tMap->addColumn('NRO_DOCUMENTO', 'NroDocumento', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::CHAR, true);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('DISTANCIA_ESCUELA', 'DistanciaEscuela', 'int', CreoleTypes::INTEGER, false);

		$tMap->addColumn('HERMANOS_ESCUELA', 'HermanosEscuela', 'boolean', CreoleTypes::BOOLEAN, true);

		$tMap->addColumn('HIJO_MAESTRO_ESCUELA', 'HijoMaestroEscuela', 'boolean', CreoleTypes::BOOLEAN, true);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'int', CreoleTypes::INTEGER, 'establecimiento', 'ID', true, null);

		$tMap->addForeignKey('FK_CUENTA_ID', 'FkCuentaId', 'int', CreoleTypes::INTEGER, 'cuenta', 'ID', true, null);

		$tMap->addColumn('CERTIFICADO_MEDICO', 'CertificadoMedico', 'boolean', CreoleTypes::BOOLEAN, true);

		$tMap->addColumn('ACTIVO', 'Activo', 'boolean', CreoleTypes::BOOLEAN, true);

		$tMap->addForeignKey('FK_CONCEPTOBAJA_ID', 'FkConceptobajaId', 'int', CreoleTypes::INTEGER, 'conceptobaja', 'ID', false, null);

		$tMap->addForeignKey('FK_PAIS_ID', 'FkPaisId', 'int', CreoleTypes::INTEGER, 'pais', 'ID', true, null);
				
    } // doBuild()

} // AlumnoMapBuilder
