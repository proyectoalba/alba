<?php



class AlumnoMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AlumnoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(AlumnoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AlumnoPeer::TABLE_NAME);
		$tMap->setPhpName('Alumno');
		$tMap->setClassname('Alumno');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('LEGAJO_PREFIJO', 'LegajoPrefijo', 'VARCHAR', true, 10);

		$tMap->addColumn('LEGAJO_NUMERO', 'LegajoNumero', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('APELLIDO_MATERNO', 'ApellidoMaterno', 'VARCHAR', false, 128);

		$tMap->addColumn('APELLIDO', 'Apellido', 'VARCHAR', true, 128);

		$tMap->addColumn('FECHA_NACIMIENTO', 'FechaNacimiento', 'TIMESTAMP', false, null);

		$tMap->addColumn('DIRECCION', 'Direccion', 'VARCHAR', false, 128);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'VARCHAR', false, 128);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'VARCHAR', false, 20);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'INTEGER', 'provincia', 'ID', true, null);

		$tMap->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 20);

		$tMap->addColumn('LUGAR_NACIMIENTO', 'LugarNacimiento', 'VARCHAR', false, 128);

		$tMap->addForeignKey('FK_TIPODOCUMENTO_ID', 'FkTipodocumentoId', 'INTEGER', 'tipodocumento', 'ID', true, null);

		$tMap->addColumn('NRO_DOCUMENTO', 'NroDocumento', 'VARCHAR', false, 16);

		$tMap->addColumn('SEXO', 'Sexo', 'CHAR', false, 1);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', false, 128);

		$tMap->addColumn('DISTANCIA_ESCUELA', 'DistanciaEscuela', 'INTEGER', false, null);

		$tMap->addColumn('HERMANOS_ESCUELA', 'HermanosEscuela', 'BOOLEAN', false, null);

		$tMap->addColumn('HIJO_MAESTRO_ESCUELA', 'HijoMaestroEscuela', 'BOOLEAN', false, null);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'INTEGER', 'establecimiento', 'ID', true, null);

		$tMap->addForeignKey('FK_CUENTA_ID', 'FkCuentaId', 'INTEGER', 'cuenta', 'ID', true, null);

		$tMap->addColumn('CERTIFICADO_MEDICO', 'CertificadoMedico', 'BOOLEAN', false, null);

		$tMap->addColumn('ACTIVO', 'Activo', 'BOOLEAN', false, null);

		$tMap->addForeignKey('FK_CONCEPTOBAJA_ID', 'FkConceptobajaId', 'INTEGER', 'conceptobaja', 'ID', false, null);

		$tMap->addForeignKey('FK_PAIS_ID', 'FkPaisId', 'INTEGER', 'pais', 'ID', true, null);

		$tMap->addColumn('PROCEDENCIA', 'Procedencia', 'VARCHAR', false, 128);

		$tMap->addForeignKey('FK_ESTADOALUMNO_ID', 'FkEstadoalumnoId', 'INTEGER', 'estadosalumnos', 'ID', true, null);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'VARCHAR', false, 255);

	} 
} 