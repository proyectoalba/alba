<?php
		
require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'legajopedagogico' table to 'alba' DatabaseMap object.
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
class LegajopedagogicoMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.LegajopedagogicoMapBuilder';	

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
		
		$tMap = $this->dbMap->addTable('legajopedagogico');
		$tMap->setPhpName('Legajopedagogico');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'int', CreoleTypes::INTEGER, 'alumno', 'ID', true, 11);

		$tMap->addColumn('TITULO', 'Titulo', 'string', CreoleTypes::VARCHAR, true);

		$tMap->addColumn('RESUMEN', 'Resumen', 'string', CreoleTypes::BLOB, true);

		$tMap->addColumn('TEXTO', 'Texto', 'string', CreoleTypes::BLOB, true);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::TIMESTAMP, true);

		$tMap->addForeignKey('FK_USUARIO_ID', 'FkUsuarioId', 'int', CreoleTypes::INTEGER, 'usuario', 'ID', true, 11);

		$tMap->addForeignKey('FK_LEGAJOCATEGORIA_ID', 'FkLegajocategoriaId', 'int', CreoleTypes::INTEGER, 'legajocategoria', 'ID', true, 11);
				
    } // doBuild()

} // LegajopedagogicoMapBuilder
