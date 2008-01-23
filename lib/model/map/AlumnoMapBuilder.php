<?php



class AlumnoMapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');

		$tMap = $this->dbMap->addTable('alumno');
		$tMap->setPhpName('Alumno');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('APELLIDO', 'Apellido', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('FECHA_NACIMIENTO', 'FechaNacimiento', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('DIRECCION', 'Direccion', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'int', CreoleTypes::INTEGER, 'provincia', 'ID', true, null);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('LUGAR_NACIMIENTO', 'LugarNacimiento', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addForeignKey('FK_TIPODOCUMENTO_ID', 'FkTipodocumentoId', 'int', CreoleTypes::INTEGER, 'tipodocumento', 'ID', true, null);

		$tMap->addColumn('NRO_DOCUMENTO', 'NroDocumento', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::CHAR, true, 1);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('DISTANCIA_ESCUELA', 'DistanciaEscuela', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('HERMANOS_ESCUELA', 'HermanosEscuela', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addColumn('HIJO_MAESTRO_ESCUELA', 'HijoMaestroEscuela', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'int', CreoleTypes::INTEGER, 'establecimiento', 'ID', true, null);

		$tMap->addForeignKey('FK_CUENTA_ID', 'FkCuentaId', 'int', CreoleTypes::INTEGER, 'cuenta', 'ID', true, null);

		$tMap->addColumn('CERTIFICADO_MEDICO', 'CertificadoMedico', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addColumn('ACTIVO', 'Activo', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addForeignKey('FK_CONCEPTOBAJA_ID', 'FkConceptobajaId', 'int', CreoleTypes::INTEGER, 'conceptobaja', 'ID', false, null);

		$tMap->addForeignKey('FK_PAIS_ID', 'FkPaisId', 'int', CreoleTypes::INTEGER, 'pais', 'ID', true, null);

	} 
} 