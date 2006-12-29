<?php
		
require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'boletin_conceptual' table to 'alba' DatabaseMap object.
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
class BoletinConceptualMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.BoletinConceptualMapBuilder';	

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
		
		$tMap = $this->dbMap->addTable('boletin_conceptual');
		$tMap->setPhpName('BoletinConceptual');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addForeignKey('FK_ESCALANOTA_ID', 'FkEscalanotaId', 'int', CreoleTypes::INTEGER, 'escalanota', 'ID', true, 11);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'int', CreoleTypes::INTEGER, 'alumno', 'ID', true, 11);

		$tMap->addForeignKey('FK_CONCEPTO_ID', 'FkConceptoId', 'int', CreoleTypes::INTEGER, 'concepto', 'ID', true, 11);

		$tMap->addForeignKey('FK_PERIODO_ID', 'FkPeriodoId', 'int', CreoleTypes::INTEGER, 'periodo', 'ID', true, 11);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::BLOB, true);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::TIMESTAMP, true);
				
    } // doBuild()

} // BoletinConceptualMapBuilder
