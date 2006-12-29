<?php
		
require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'espacio' table to 'alba' DatabaseMap object.
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
class EspacioMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.EspacioMapBuilder';	

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
		
		$tMap = $this->dbMap->addTable('espacio');
		$tMap->setPhpName('Espacio');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('M2', 'M2', 'double', CreoleTypes::FLOAT, false);

		$tMap->addColumn('CAPACIDAD', 'Capacidad', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addColumn('ESTADO', 'Estado', 'string', CreoleTypes::VARCHAR, false);

		$tMap->addForeignKey('FK_TIPOESPACIO_ID', 'FkTipoespacioId', 'int', CreoleTypes::INTEGER, 'tipoespacio', 'ID', false, 11);

		$tMap->addForeignKey('FK_LOCACION_ID', 'FkLocacionId', 'int', CreoleTypes::INTEGER, 'locacion', 'ID', true, null);
				
    } // doBuild()

} // EspacioMapBuilder
