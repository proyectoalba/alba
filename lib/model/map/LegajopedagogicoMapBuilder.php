<?php



class LegajopedagogicoMapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');

		$tMap = $this->dbMap->addTable('legajopedagogico');
		$tMap->setPhpName('Legajopedagogico');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'int', CreoleTypes::INTEGER, 'alumno', 'ID', true, 11);

		$tMap->addColumn('TITULO', 'Titulo', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('RESUMEN', 'Resumen', 'string', CreoleTypes::BLOB, true, null);

		$tMap->addColumn('TEXTO', 'Texto', 'string', CreoleTypes::BLOB, true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addForeignKey('FK_USUARIO_ID', 'FkUsuarioId', 'int', CreoleTypes::INTEGER, 'usuario', 'ID', true, 11);

		$tMap->addForeignKey('FK_LEGAJOCATEGORIA_ID', 'FkLegajocategoriaId', 'int', CreoleTypes::INTEGER, 'legajocategoria', 'ID', true, 11);

	} 
} 