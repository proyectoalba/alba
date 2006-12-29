<?php

class myUser extends sfBasicSecurityUser
{
    public function getEstablecimientos() {
        
        $establecimientos = array();
        $e = EstablecimientoPeer::retrieveByPk($this->getAttribute('fk_establecimiento_id'));
        array_push($establecimientos,$e);    
        return  $establecimientos;
        
    
    
    }

    /**
    * obtiene el tema del la interfaz del usuario
    */
    public function getTheme() {
        return $this->getAttribute('theme');
    }

    /**
    * Asigna un tema al usuario
    */
    public function setTheme($theme) {
        $this->setAttribute('theme',$theme);
    }
}

?>