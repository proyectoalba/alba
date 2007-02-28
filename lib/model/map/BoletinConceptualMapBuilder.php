<?php


	
class BoletinConceptualMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BoletinConceptualMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('boletin_conceptual');
		$tMap->setPhpName('BoletinConceptual');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, 11);

		$tMap->addForeignKey('FK_ESCALANOTA_ID', 'FkEscalanotaId', 'int', CreoleTypes::INTEGER, 'escalanota', 'ID', true, 11);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'int', CreoleTypes::INTEGER, 'alumno', 'ID', true, 11);

		$tMap->addForeignKey('FK_CONCEPTO_ID', 'FkConceptoId', 'int', CreoleTypes::INTEGER, 'concepto', 'ID', true, 11);

		$tMap->addForeignKey('FK_PERIODO_ID', 'FkPeriodoId', 'int', CreoleTypes::INTEGER, 'periodo', 'ID', true, 11);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::BLOB, true);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::TIMESTAMP, true);
				
    } 
} 