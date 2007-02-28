<?php


	
class LocacionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LocacionMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('locacion');
		$tMap->setPhpName('Locacion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DIRECCION', 'Direccion', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'int', CreoleTypes::INTEGER, 'provincia', 'ID', true, null);

		$tMap->addForeignKey('FK_TIPOLOCACION_ID', 'FkTipolocacionId', 'int', CreoleTypes::INTEGER, 'tipolocacion', 'ID', true, null);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FAX', 'Fax', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ENCARGADO', 'Encargado', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('ENCARGADO_TELEFONO', 'EncargadoTelefono', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('PRINCIPAL', 'Principal', 'boolean', CreoleTypes::BOOLEAN, true);
				
    } 
} 