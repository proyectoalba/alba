<?php
/**
 * File containing the abstract ezcGraphDataSetStringProperty class
 *
 * @package Graph
 * @version 1.2
 * @copyright Copyright (C) 2005-2007 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */
/**
 * Class for string properties of datasets
 *
 * @version 1.2
 * @package Graph
 */
class ezcGraphDataSetStringProperty extends ezcGraphDataSetProperty
{
    /**
     * Converts value to an {@link ezcGraphColor} object
     * 
     * @param & $value 
     * @return void
     */
    protected function checkValue( &$value )
    {
        $value = (string) $value;
        return true;
    }
}

?>
