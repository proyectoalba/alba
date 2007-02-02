<?php
/**
 *    This file is part of Alba.
 *
 *    Alba is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 2 of the License, or
 *    (at your option) any later version.
 *
 *    Alba is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with Alba; if not, write to the Free Software
 *    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


/**
 * informes actions
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 4099 2007-01-29 18:59:24Z josx $
 * @filesource
 * @license GPL
 */

class InformesActions extends sfActions
{

    public function preExecute() {
        $this->vista = $this->getRequestParameter('vista');
    }


/**
 *  Informe: Alumnos por Division 
 *
 */

     public function handleErrorAlumnosPorDivisionListado() {
        $this->forward('informes','alumnosPorDivisionFormulario');
     }

    public function executeAlumnosPorDivisionFormulario() {
        // inicializando variables
        $optionsDivision = array();
        
        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');

        // llenando el combo de division segun establecimiento
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $criteria = new Criteria();
        $criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $divisiones = DivisionPeer::doSelectJoinAnio($criteria);
        $optionsDivision['']  = "";
        foreach($divisiones as $division) {
            $optionsDivision[$division->getId()] = $division->getAnio()->getDescripcion()." ".$division->getDescripcion();
        }
        asort($optionsDivision);
        
        // asignando variables para ser usadas en el template
        $this->optionsDivision = $optionsDivision;
        $this->division_id = $division_id;
    }
    
    public function executeAlumnosPorDivisionListado() {

        // inicializando variables
        $aAlumno  = array();        

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');

        // buscando division
        $division = DivisionPeer::retrieveByPK($division_id);
        
        // buscando alumnos
        $criteria = new Criteria();
        $criteria->add(DivisionPeer::ID, $division_id);
        $criteria->addJoin(RelAlumnoDivisionPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
        $criteria->addJoin(RelAlumnoDivisionPeer::FK_DIVISION_ID, DivisionPeer::ID);
        $criteria->addAscendingOrderByColumn(AlumnoPeer::APELLIDO);

        $alumnos = AlumnoPeer::doSelect($criteria);

        // asignando variables para ser usadas en el template        
        $this->aAlumno = $alumnos;
        $this->division = $division;

        $this->vista = "imprimir";

    }    

}