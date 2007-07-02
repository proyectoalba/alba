<?php



class UsuarioMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UsuarioMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('usuario');
		$tMap->setPhpName('Usuario');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('USUARIO', 'Usuario', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CLAVE', 'Clave', 'string', CreoleTypes::VARCHAR, true, 48);

		$tMap->addColumn('CORREO_PUBLICO', 'CorreoPublico', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('ACTIVO', 'Activo', 'boolean', CreoleTypes::BOOLEAN, true, null);

		$tMap->addColumn('FECHA_CREADO', 'FechaCreado', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('FECHA_ACTUALIZADO', 'FechaActualizado', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('SEGURIDAD_PREGUNTA', 'SeguridadPregunta', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('SEGURIDAD_RESPUESTA', 'SeguridadRespuesta', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'int', CreoleTypes::INTEGER, 'establecimiento', 'ID', true, null);

		$tMap->addColumn('BORRADO', 'Borrado', 'boolean', CreoleTypes::BOOLEAN, true, null);

	} 
} 