<?php



class DocenteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DocenteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('docente');
		$tMap->setPhpName('Docente');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('APELLIDO', 'Apellido', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::CHAR, true, 1);

		$tMap->addColumn('FECHA_NACIMIENTO', 'FechaNacimiento', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addForeignKey('FK_TIPODOCUMENTO_ID', 'FkTipodocumentoId', 'int', CreoleTypes::INTEGER, 'tipodocumento', 'ID', true, 11);

		$tMap->addColumn('NRO_DOCUMENTO', 'NroDocumento', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('LUGAR_NACIMIENTO', 'LugarNacimiento', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('DIRECCION', 'Direccion', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TELEFONO_MOVIL', 'TelefonoMovil', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TITULO', 'Titulo', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('LIBRETA_SANITARIA', 'LibretaSanitaria', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PSICOFISICO', 'Psicofisico', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ACTIVO', 'Activo', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'int', CreoleTypes::INTEGER, 'provincia', 'ID', true, 11);

		$tMap->addForeignKey('FK_PAIS_ID', 'FkPaisId', 'int', CreoleTypes::INTEGER, 'pais', 'ID', true, null);

	} 
} 