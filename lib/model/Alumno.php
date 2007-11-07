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
         return $this->getApellido() . " " . $this->getNombre() ;
	}		 

    public function toArrayInforme($keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = AlumnoPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNombre(),
            $keys[2] => $this->getApellido(),
            $keys[3] => $this->getFechaNacimiento(),
            $keys[4] => $this->getDireccion(),
            $keys[5] => $this->getCiudad(),
            $keys[6] => $this->getCodigoPostal(),
            'Provincia' => ($this->getProvincia())?$this->getProvincia()->getNombreCorto():'' ,
            $keys[8] => $this->getTelefono(),
            $keys[9] => $this->getLugarNacimiento(),
            'TipoDocumento' => ($this->getTipodocumento())?$this->getTipodocumento()->getNombre():'',
            $keys[11] => $this->getNroDocumento(),
            $keys[12] => $this->getSexo(),
            $keys[13] => $this->getEmail(),
            $keys[14] => $this->getDistanciaEscuela(),
            $keys[15] => $this->getHermanosEscuela(),
            $keys[16] => $this->getHijoMaestroEscuela(),
            'Establecimiento' => ($this->getEstablecimiento())?$this->getEstablecimiento()->getNombre():'',
            'Cuenta' => ($this->getCuenta())?$this->getCuenta()->getNombre():'',
            $keys[19] => $this->getCertificadoMedico(),
            $keys[20] => $this->getActivo(),
            $keys[21] => $this->getFkConceptobajaId(),
            'Pais' => ($this->getPais())?$this->getPais()->getNombreLargo():'',
        );
        return $result;
    }



} // Alumno
