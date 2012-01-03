<?php



class ResponsableMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ResponsableMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(ResponsablePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ResponsablePeer::TABLE_NAME);
		$tMap->setPhpName('Responsable');
		$tMap->setClassname('Responsable');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('APELLIDO', 'Apellido', 'VARCHAR', true, 128);

		$tMap->addColumn('APELLIDO_MATERNO', 'ApellidoMaterno', 'VARCHAR', false, 128);

		$tMap->addColumn('DIRECCION', 'Direccion', 'VARCHAR', false, 128);

		$tMap->addColumn('DIRECCION_LABORAL', 'DireccionLaboral', 'VARCHAR', false, 128);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'VARCHAR', false, 128);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'VARCHAR', false, 20);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'INTEGER', 'provincia', 'ID', true, null);

		$tMap->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 20);

		$tMap->addColumn('TELEFONO_LABORAL', 'TelefonoLaboral', 'VARCHAR', false, 20);

		$tMap->addColumn('TELEFONO_MOVIL', 'TelefonoMovil', 'VARCHAR', false, 20);

		$tMap->addColumn('NRO_DOCUMENTO', 'NroDocumento', 'VARCHAR', true, 20);

		$tMap->addForeignKey('FK_TIPODOCUMENTO_ID', 'FkTipodocumentoId', 'INTEGER', 'tipodocumento', 'ID', true, null);

		$tMap->addColumn('SEXO', 'Sexo', 'CHAR', true, 1);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', false, 128);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'VARCHAR', false, 255);

		$tMap->addColumn('AUTORIZACION_RETIRO', 'AutorizacionRetiro', 'BOOLEAN', true, null);

		$tMap->addColumn('LLAMAR_EMERGENCIA', 'LlamarEmergencia', 'BOOLEAN', true, null);

		$tMap->addForeignKey('FK_CUENTA_ID', 'FkCuentaId', 'INTEGER', 'cuenta', 'ID', true, null);

		$tMap->addForeignKey('FK_ROLRESPONSABLE_ID', 'FkRolresponsableId', 'INTEGER', 'rol_responsable', 'ID', true, null);

		$tMap->addColumn('OCUPACION', 'Ocupacion', 'VARCHAR', false, 255);

		$tMap->addColumn('FECHA_NACIMIENTO', 'FechaNacimiento', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('FK_NIVEL_INSTRUCCION_ID', 'FkNivelInstruccionId', 'INTEGER', 'nivel_instruccion', 'ID', false, null);

	} 
} 