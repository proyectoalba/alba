<?php

require_once 'lib/model/om/BaseLegajopedagogico.php';


/**
 * Skeleton subclass for representing a row from the 'legajopedagogico' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Legajopedagogico extends BaseLegajopedagogico {

    public function getResumen() {
        if (is_null(parent::getResumen())) {
            return ""; }
        else {    
            return stream_get_contents(parent::getResumen());
        }
    }
    public function getTexto() {
        if (is_null(parent::getTexto())) {
            return ""; }
        else { 
            return stream_get_contents(parent::getTexto());
        }
    }
}
