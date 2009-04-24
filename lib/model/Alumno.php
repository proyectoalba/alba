<?php

require_once 'lib/model/om/BaseAlumno.php';


/**
 * Skeleton subclass for representing a row from the 'alumno' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class Alumno extends BaseAlumno {
    public function __toString() {
        return $this->getApellido() . " ".$this->getApellidoMaterno()." ". $this->getNombre() ;
    } 
        
    public function getApellidos(){
        return $this->getApellido().' '.$this->getApellidoMaterno();
    }

    public function toArrayInforme($keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = AlumnoPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNombre(),
            $keys[2] => $this->getApellidoMaterno(),
            $keys[3] => $this->getApellido(),
            $keys[4] => $this->getFechaNacimiento(),
            $keys[5] => $this->getDireccion(),
            $keys[6] => $this->getCiudad(),
            $keys[7] => $this->getCodigoPostal(),
            'Provincia' => ($this->getProvincia())?$this->getProvincia()->getNombreCorto():'' ,
            $keys[9] => $this->getTelefono(),
            $keys[10] => $this->getLugarNacimiento(),
            'TipoDocumento' => ($this->getTipodocumento())?$this->getTipodocumento()->getNombre():'',
            $keys[12] => $this->getNroDocumento(),
            $keys[13] => $this->getSexo(),
            $keys[14] => $this->getEmail(),
            $keys[15] => $this->getDistanciaEscuela(),
            $keys[16] => $this->getHermanosEscuela(),
            $keys[17] => $this->getHijoMaestroEscuela(),
            'Establecimiento' => ($this->getEstablecimiento())?$this->getEstablecimiento()->getNombre():'',
            'Cuenta' => ($this->getCuenta())?$this->getCuenta()->getNombre():'',
            $keys[20] => $this->getCertificadoMedico(),
            $keys[21] => $this->getActivo(),
            $keys[22] => $this->getFkConceptobajaId(),
            'Pais' => ($this->getPais())?$this->getPais()->getNombreLargo():'',
        );
        return $result;
    }



} // Alumno
