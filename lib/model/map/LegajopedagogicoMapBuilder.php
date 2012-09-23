<?php



class LegajopedagogicoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LegajopedagogicoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(LegajopedagogicoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(LegajopedagogicoPeer::TABLE_NAME);
		$tMap->setPhpName('Legajopedagogico');
		$tMap->setClassname('Legajopedagogico');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'INTEGER', 'alumno', 'ID', true, null);

		$tMap->addColumn('TITULO', 'Titulo', 'VARCHAR', true, 255);

		$tMap->addColumn('RESUMEN', 'Resumen', 'LONGVARCHAR', true, null);

		$tMap->addColumn('TEXTO', 'Texto', 'LONGVARCHAR', true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'TIMESTAMP', true, null);

		$tMap->addForeignKey('FK_USUARIO_ID', 'FkUsuarioId', 'INTEGER', 'usuario', 'ID', true, null);

		$tMap->addForeignKey('FK_LEGAJOCATEGORIA_ID', 'FkLegajocategoriaId', 'INTEGER', 'legajocategoria', 'ID', true, null);

	} 
} 