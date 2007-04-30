<?php


	
class ResponsableMapBuilder {

	
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
		$this->dbMap = Propel::getDatabaseMap('alba');
		
		$tMap = $this->dbMap->addTable('responsable');
		$tMap->setPhpName('Responsable');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('APELLIDO', 'Apellido', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('DIRECCION', 'Direccion', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('CIUDAD', 'Ciudad', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('CODIGO_POSTAL', 'CodigoPostal', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addForeignKey('FK_PROVINCIA_ID', 'FkProvinciaId', 'int', CreoleTypes::INTEGER, 'provincia', 'ID', true, null);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TELEFONO_MOVIL', 'TelefonoMovil', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NRO_DOCUMENTO', 'NroDocumento', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addForeignKey('FK_TIPODOCUMENTO_ID', 'FkTipodocumentoId', 'int', CreoleTypes::INTEGER, 'tipodocumento', 'ID', true, null);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::CHAR, true);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 128);

		$tMap->addColumn('RELACION', 'Relacion', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('AUTORIZACION_RETIRO', 'AutorizacionRetiro', 'boolean', CreoleTypes::BOOLEAN, true);

		$tMap->addForeignKey('FK_CUENTA_ID', 'FkCuentaId', 'int', CreoleTypes::INTEGER, 'cuenta', 'ID', true, null);

		$tMap->addForeignKey('FK_ROLRESPONSABLE_ID', 'FkRolresponsableId', 'int', CreoleTypes::INTEGER, 'rol_responsable', 'ID', true, null);
				
    } 
} 