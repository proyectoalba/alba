<?php
		
require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'usuario' table to 'alba' DatabaseMap object.
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
class UsuarioMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.UsuarioMapBuilder';	

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
		
		$tMap = $this->dbMap->addTable('usuario');
		$tMap->setPhpName('Usuario');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('USUARIO', 'Usuario', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('CLAVE', 'Clave', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('CORREO_PUBLICO', 'CorreoPublico', 'boolean', CreoleTypes::BOOLEAN, false);

		$tMap->addColumn('ACTIVO', 'Activo', 'boolean', CreoleTypes::BOOLEAN, true);

		$tMap->addColumn('FECHA_CREADO', 'FechaCreado', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addColumn('FECHA_ACTUALIZADO', 'FechaActualizado', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addColumn('SEGURIDAD_PREGUNTA', 'SeguridadPregunta', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('SEGURIDAD_RESPUESTA', 'SeguridadRespuesta', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'int', CreoleTypes::INTEGER, 'establecimiento', 'ID', true, null);

		$tMap->addColumn('BORRADO', 'Borrado', 'boolean', CreoleTypes::BOOLEAN, true);
				
    } // doBuild()

} // UsuarioMapBuilder
