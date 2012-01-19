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
 * boletin actions
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class boletinActions extends sfActions
{

    public function executeGrabarNotas() {

        // inicializando variables
        $aDatosTablaEscalaNota = array();

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');
        $actividad_id = $this->getRequestParameter('actividad_id');
        $periodo_id = $this->getRequestParameter('periodo_id');
        $carrera_id = $this->getRequestParameter('carrera_id');
        $aNota = $this->getRequestParameter('nota');

        $cantNotas = count($aNota);
        if($cantNotas > 0) {
            // tomo escala notas
            $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
            $aDatosTablaEscalaNota = $this->getEscalanota($establecimiento_id);

            //grabo al disco
            $con = Propel::getConnection();
            try {
                //$con->begin();
                $criteria = new Criteria();

                foreach($aNota as $alumno_id => $aPeriodo ) {
                    foreach($aPeriodo as $periodoid => $nota) {
                        $cton1 = $criteria->getNewCriterion(BoletinActividadesPeer::FK_ALUMNO_ID, $alumno_id);
                        $cton2 = $criteria->getNewCriterion(BoletinActividadesPeer::FK_PERIODO_ID, $periodoid);
                        $cton3 = $criteria->getNewCriterion(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $actividad_id);
                        $cton1->addAnd($cton2)->addAnd($cton3);
                        $criteria->addOr($cton1);
                    }
                }
                BoletinActividadesPeer::doDelete($criteria);

                foreach($aNota as $alumno_id => $aPeriodo ) {
                    foreach($aPeriodo as $periodoid => $nota) {
                        // estaria bueno hacer todos los insert en una sola query
                        $boletin = new BoletinActividades();
                        $boletin->setFkAlumnoId($alumno_id);
                        $boletin->setFkPeriodoId($periodoid);
                        $boletin->setFkActividadId($actividad_id);
                        if(array_key_exists($nota[0], $aDatosTablaEscalaNota)) {
                            $boletin->setFkEscalanotaId($aDatosTablaEscalaNota[$nota[0]]);
                        }
                        $boletin->setFecha(date("Y-m-d"));
                        $boletin->save();
                    }
                }

                //$con->commit(); 
             }             
             catch (Exception $e){
                 //$con->rollback();
                 throw $e;  
            }
        }
        return $this->redirect("boletin/list?carrera_id=$carrera_id&division_id=$division_id&actividad_id=$actividad_id&periodo_id=$periodo_id");
    }   

    protected function getCarreras($establecimiento_id) {
        $optionsCarrera = array();
        $criteria = new Criteria();
        $criteria->add(CarreraPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $carreras = CarreraPeer::doSelect($criteria);
        $optionsCarrera[]  = "";
        foreach($carreras as $carrera) {
            $optionsCarrera[$carrera->getId()] = $carrera->__toString();
        }
        asort($optionsCarrera);
        return $optionsCarrera;
    }

    protected function getDivisiones($establecimiento_id, $carrera_id = '') {
        $optionsDivision = array();
        $criteria = new Criteria();
        $criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        if($carrera_id != '') {
            $criteria->add(AnioPeer::FK_CARRERA_ID, $carrera_id);
        }
        $divisiones = DivisionPeer::doSelectJoinAnio($criteria);
        $optionsDivision[]  = "";
        foreach($divisiones as $division) {
            $optionsDivision[$division->getId()] = $division->__toString();
        }
        asort($optionsDivision);
        return $optionsDivision;
    }

    protected function getAlumnos($division_id) {
        $aAlumno = array();
        $criteria = new Criteria();
        $criteria->add(DivisionPeer::ID, $division_id);
        $criteria->addJoin(RelAlumnoDivisionPeer::FK_ALUMNO_ID, AlumnoPeer::ID);
        $criteria->addJoin(RelAlumnoDivisionPeer::FK_DIVISION_ID, DivisionPeer::ID);
        $criteria->addAscendingOrderbyColumn(AlumnoPeer::APELLIDO);
        $aAlumno = AlumnoPeer::doSelect($criteria);
        return $aAlumno;

    }

    public function executeList() {

        // inicializando variables
        $optionsActividad = array();
        $optionsDivision = array();
        $optionsCarrera = array();
        $aAlumno = array();    
        $division_id = "";
        $actividad_id = "";
        $periodo_id = "";
        $carrera_id = "";
        $aPeriodo = array();
        $aPosiblesNotas = array();
        $optionsPeriodo = array();
        $aNotaAlumno = array();
        $sizeNota = 0;

        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');
        $periodo_id = $this->getRequestParameter('periodo_id');
        $carrera_id = $this->getRequestParameter('carrera_id');

        // llenando el combo de division segun establecimiento
        $optionsDivision = $this->getDivisiones($establecimiento_id, $carrera_id);
        $optionsCarrera = $this->getCarreras($establecimiento_id);

        if($division_id) {
            $actividad_id = $this->getRequestParameter('actividad_id');
            $d = DivisionPeer::retrieveByPk($division_id);
            $optionsActividad = $d->getActividadesArray();
        }

            $aAlumno = $this->getAlumnos($division_id);
            $criteria = new Criteria();
            $criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->getUser()->getAttribute('fk_ciclolectivo_id'));
            $criteria->add(PeriodoPeer::CALCULAR, false);
            $aPeriodo = PeriodoPeer::doSelect($criteria);

            $optionsPeriodo[] = "";
            foreach($aPeriodo as $periodo) {
                $optionsPeriodo[$periodo->getId()] = $periodo->getDescripcion();
            }          

            if($periodo_id) {
                $aPeriodo = array();
                $aPeriodo[] = PeriodoPeer::retrieveByPK($periodo_id);
            }

           
            if(count($aAlumno) > 0) {
                // esto puede ser mejorado con solo una query bastante facilmente
                foreach($aAlumno as $alumno) {
                    foreach($aPeriodo as $periodo) {
                        $criteria = new Criteria();
                        $criteria->add(BoletinActividadesPeer::FK_ALUMNO_ID, $alumno->getId());
                        $criteria->add(BoletinActividadesPeer::FK_PERIODO_ID, $periodo->getId());
                        $criteria->add(BoletinActividadesPeer::FK_ACTIVIDAD_ID, $actividad_id);
                        $criteria->addJoin(BoletinActividadesPeer::FK_ESCALANOTA_ID, EscalanotaPeer::ID);
                        $criteria->addAsColumn("boletinActividades_periodo_id", BoletinActividadesPeer::FK_PERIODO_ID);
                        $criteria->addAsColumn("boletinActividades_id", BoletinActividadesPeer::ID);
                        $criteria->addAsColumn("escalanota_nombre", EscalanotaPeer::NOMBRE);
                        $criteria->addAsColumn("escalanota_id", EscalanotaPeer::ID);
                        $aBoletinActividades = BasePeer::doSelect($criteria);
                        $aNotaAlumno[$alumno->getId()][$periodo->getId()]  = "";
                        foreach($aBoletinActividades as $boletinActividades) {
                            $aNotaAlumno[$alumno->getId()][$periodo->getId()] = $boletinActividades[2];
                        }
                    }
                }
            }

            $criteria = new Criteria();
            $criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
            $aPosiblesNotas = EscalanotaPeer::doSelect($criteria);
            foreach($aPosiblesNotas as $p) {
                $actual = strlen($p->getNombre());
                if($actual > $sizeNota) {
                    $sizeNota = $actual;
                }
            }
     

        // llenar variables a mostrar en el template
        $this->optionsDivision = $optionsDivision;
        $this->optionsActividad =$optionsActividad;
        $this->aAlumno = $aAlumno;
        $this->division_id = $division_id;
        $this->actividad_id = $actividad_id;
        $this->carrera_id = $carrera_id;
        $this->optionsCarrera = $optionsCarrera;
        $this->periodo_id = $periodo_id;
        $this->aPeriodo = $aPeriodo;
        $this->aPosiblesNotas = $aPosiblesNotas;
        $this->optionsPeriodo = $optionsPeriodo;
        $this->aNotaAlumno = $aNotaAlumno;
        $this->sizeNota = $sizeNota;
    }

    public function executeListConcepto() {
        // inicializando variables
        $optionsConcepto = array();
        $optionsDivision = array();
        $optionsCarrera = array();
        $aAlumno = array();    
        $division_id = "";
        $concepto_id = "";
        $periodo_id = "";
        $carrera_id = "";
        $aPeriodo = array();
        $aPosiblesNotas = array();
        $optionsPeriodo = array();
        $aNotaAlumno = array();
        $aNotaAlumnoObs = array();
        $sizeNota = 0;

        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        
        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');
        $periodo_id = $this->getRequestParameter('periodo_id');
        $concepto_id = $this->getRequestParameter('concepto_id');
        $carrera_id = $this->getRequestParameter('carrera_id');

        // llenando el combo de division segun establecimiento
        $optionsDivision = $this->getDivisiones($establecimiento_id, $carrera_id);

        $optionsCarrera = $this->getCarreras($establecimiento_id);

        $optionsConcepto [] = "";
        $e = EstablecimientoPeer::retrieveByPk($establecimiento_id);
        $optionsConcepto = array_merge($optionsConcepto, $e->getConceptosArray());

        $aAlumno = $this->getAlumnos($division_id);

        $criteria = new Criteria();
        $criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->getUser()->getAttribute('fk_ciclolectivo_id'));
        $criteria->add(PeriodoPeer::CALCULAR, false);
        $aPeriodo = PeriodoPeer::doSelect($criteria);
        $optionsPeriodo[] = "Todos";
        foreach($aPeriodo as $periodo) {
            $optionsPeriodo[$periodo->getId()] = $periodo->getDescripcion();
        }          

        if($periodo_id) {
            $aPeriodo = array();
            $aPeriodo[] = PeriodoPeer::retrieveByPK($periodo_id);
        }

        if(count($aAlumno) > 0) {
// esto puede ser mejorado con solo una query bastante facilmente
            foreach($aAlumno as $alumno) {
                foreach($aPeriodo as $periodo) {
                    $criteria = new Criteria();
                    $criteria->add(BoletinConceptualPeer::FK_ALUMNO_ID, $alumno->getId());
                    $criteria->add(BoletinConceptualPeer::FK_PERIODO_ID, $periodo->getId());
                    $criteria->add(BoletinConceptualPeer::FK_CONCEPTO_ID, $concepto_id);
                    $aBoletinConceptual = BoletinConceptualPeer::doSelect($criteria);
                    $aNotaAlumno[$alumno->getId()][$periodo->getId()]  = "";
                    $aNotaAlumnoObs[$alumno->getId()][$periodo->getId()]  = "";
                    foreach($aBoletinConceptual as $boletinConceptual ) {
//if(method_exists($legajopedagogico->getResumen(),'getContents')) {
                        if($boletinConceptual->getFkEscalanotaId()) {
                            $aNotaAlumno[$alumno->getId()][$periodo->getId()] = $boletinConceptual->getEscalanota()->getNombre();
                        }
                        if($boletinConceptual->getObservacion()) {
                            if($boletinConceptual->getObservacion()!=null) {
                                $aNotaAlumnoObs[$alumno->getId()][$periodo->getId()] = $boletinConceptual->getObservacion();
                            }
                        }
                    }
                }
            }

        }

        $criteria = new Criteria();
        $criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $aPosiblesNotas = EscalanotaPeer::doSelect($criteria);
        foreach($aPosiblesNotas as $p) {
            $actual = strlen($p->getNombre());
            if($actual > $sizeNota) {
                $sizeNota = $actual;
            }
        }

        // llenar variables a mostrar en el template
        $this->optionsDivision = $optionsDivision;
        $this->optionsConcepto =$optionsConcepto;
        $this->aAlumno = $aAlumno;
        $this->division_id = $division_id;
        $this->concepto_id = $concepto_id;
        $this->periodo_id = $periodo_id;
        $this->carrera_id = $carrera_id;
        $this->optionsCarrera = $optionsCarrera;
        $this->aPeriodo = $aPeriodo;
        $this->aPosiblesNotas = $aPosiblesNotas;
        $this->optionsPeriodo = $optionsPeriodo;
        $this->aNotaAlumno = $aNotaAlumno;
        $this->aNotaAlumnoObs = $aNotaAlumnoObs;
        $this->sizeNota = $sizeNota;
    }


    public function executeIndex() {
       return $this->forward('boletin', 'list');
    }

    public function executeMostrar() {
        $this->alumno_id = $this->getRequestParameter('alumno_id');
        $this->division_id = $this->getRequestParameter('division_id');
    }

    protected function getEscalanota($establecimiento_id) {
        $aDatosTablaEscalaNota = array();
        $criteria = new Criteria();
        $criteria->add(EscalanotaPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $aEscalanota = EscalanotaPeer::doSelect($criteria);
        foreach($aEscalanota as $escalanota) {
            $aDatosTablaEscalaNota[$escalanota->getNombre()] = $escalanota->getId();
        }
        return $aDatosTablaEscalaNota;
    }

    public function executeGrabarNotasConcepto() {

        // inicializando variables
        $aDatosTablaEscalaNota = array();

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');
        $concepto_id = $this->getRequestParameter('concepto_id');
        $periodo_id = $this->getRequestParameter('periodo_id');
        $carrera_id = $this->getRequestParameter('carrera_id');
        $aNota = $this->getRequestParameter('nota');
        $aNotaObs = $this->getRequestParameter('notaObs');

        $cantNotas = count($aNota);
        if($cantNotas > 0) {
            // tomo escala notas
            $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');

            $aDatosTablaEscalaNota = $this->getEscalanota($establecimiento_id);
 
            //grabo al disco
            $con = Propel::getConnection();
            try {
                //$con->begin();
                $criteria = new Criteria();

                foreach($aNota as $alumno_id => $aPeriodo ) {
                    foreach($aPeriodo as $periodoid => $nota) {
                        $cton1 = $criteria->getNewCriterion(BoletinConceptualPeer::FK_ALUMNO_ID, $alumno_id);
                        $cton2 = $criteria->getNewCriterion(BoletinConceptualPeer::FK_PERIODO_ID, $periodoid);
                        $cton3 = $criteria->getNewCriterion(BoletinConceptualPeer::FK_CONCEPTO_ID, $concepto_id);
                        $cton1->addAnd($cton2)->addAnd($cton3);
                        $criteria->addOr($cton1);
                    }
                }
                BoletinActividadesPeer::doDelete($criteria);

                foreach($aNota as $alumno_id => $aPeriodo ) {
                    foreach($aPeriodo as $periodoid => $nota) {
                        // estaria bueno hacer todos los insert en una sola query
                        $boletin = new BoletinConceptual();
                        $boletin->setFkAlumnoId($alumno_id);
                        $boletin->setFkPeriodoId($periodoid);
                        $boletin->setFkConceptoId($concepto_id);
                        if($nota) {
                             if(array_key_exists($nota, $aDatosTablaEscalaNota)) {
                                 $boletin->setFkEscalanotaId($aDatosTablaEscalaNota[$nota]);
                             }
                        }
                        if($aNotaObs[$alumno_id][$periodoid]) {
                            $boletin->setObservacion($aNotaObs[$alumno_id][$periodoid]);
                        }
                        $boletin->setFecha(date("Y-m-d"));
                        $boletin->save();
                    }
                }
                //$con->commit(); 
             }             
             catch (Exception $e){
                 //$con->rollback();
                 throw $e;  
            }
        }
        return $this->redirect("boletin/listConcepto?division_id=$division_id&concepto_id=$concepto_id&periodo_id=$periodo_id&carrera_id=$carrera_id");
    }   

}
