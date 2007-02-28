<?php


	
class MenuMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MenuMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('menu');
		$tMap->setPhpName('Menu');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('LINK', 'Link', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('PERM', 'Perm', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TARGET', 'Target', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('FK_PADRE_MENU_ID', 'FkPadreMenuId', 'int', CreoleTypes::INTEGER, 'menu', 'ID', false, null);

		$tMap->addColumn('ORDEN', 'Orden', 'int', CreoleTypes::INTEGER, false);
				
    } 
} 