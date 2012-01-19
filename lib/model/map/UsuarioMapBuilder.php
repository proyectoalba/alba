<?php



class UsuarioMapBuilder implements MapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap(UsuarioPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(UsuarioPeer::TABLE_NAME);
		$tMap->setPhpName('Usuario');
		$tMap->setClassname('Usuario');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('USUARIO', 'Usuario', 'VARCHAR', true, 32);

		$tMap->addColumn('CLAVE', 'Clave', 'VARCHAR', true, 48);

		$tMap->addColumn('CORREO_PUBLICO', 'CorreoPublico', 'BOOLEAN', false, null);

		$tMap->addColumn('ACTIVO', 'Activo', 'BOOLEAN', true, null);

		$tMap->addColumn('FECHA_CREADO', 'FechaCreado', 'TIMESTAMP', true, null);

		$tMap->addColumn('FECHA_ACTUALIZADO', 'FechaActualizado', 'TIMESTAMP', true, null);

		$tMap->addColumn('SEGURIDAD_PREGUNTA', 'SeguridadPregunta', 'VARCHAR', false, 128);

		$tMap->addColumn('SEGURIDAD_RESPUESTA', 'SeguridadRespuesta', 'VARCHAR', false, 128);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', false, 128);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'INTEGER', 'establecimiento', 'ID', true, null);

		$tMap->addColumn('BORRADO', 'Borrado', 'BOOLEAN', true, null);

	} 
} 