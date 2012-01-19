<?php



class DocenteMapBuilder implements MapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap(DocentePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DocentePeer::TABLE_NAME);
		$tMap->setPhpName('Docente');
		$tMap->setClassname('Docente');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('APELLIDO', 'Apellido', 'VARCHAR', true, 128);

		$tMap->addColumn('APELLIDO_MATERNO', 'ApellidoMaterno', 'VARCHAR', false, 128);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('ESTADO_CIVIL', 'EstadoCivil', 'CHAR', true, 1);

		$tMap->addColumn('SEXO', 'Sexo', 'CHAR', true, 1);

		$tMap->addColumn('FECHA_NACIMIENTO', 'FechaNacimiento', 'TIMESTAMP', true, null);

		$tMap->addForeignKey('FK_TIPODOCUMENTO_ID', 'FkTipodocumentoId', 'INTEGER', 'tipodocumento', 'ID', true, null);

		$tMap->addColumn('NRO_DOCUMENTO', 'NroDocumento', 'VARCHAR', true, 16);

		$tMap->addColumn('LUGAR_NACIMIENTO', 'LugarNacimiento', 'VARCHAR', false, 128);

		$tMap->addColumn('DIRECCION', 'Direccion', 'VARCHAR', false, 128);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'VARCHAR', false, 128);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'VARCHAR', false, 20);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255);

		$tMap->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 20);

		$tMap->addColumn('TELEFONO_MOVIL', 'TelefonoMovil', 'VARCHAR', false, 20);

		$tMap->addColumn('TITULO', 'Titulo', 'VARCHAR', true, 128);

		$tMap->addColumn('LIBRETA_SANITARIA', 'LibretaSanitaria', 'BOOLEAN', false, null);

		$tMap->addColumn('PSICOFISICO', 'Psicofisico', 'BOOLEAN', false, null);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'VARCHAR', false, 255);

		$tMap->addColumn('ACTIVO', 'Activo', 'BOOLEAN', false, null);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'INTEGER', 'provincia', 'ID', true, null);

		$tMap->addForeignKey('FK_PAIS_ID', 'FkPaisId', 'INTEGER', 'pais', 'ID', true, null);

	} 
} 