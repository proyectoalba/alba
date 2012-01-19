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
 * boletin components
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: actions.class.php 6215 2009-06-01 21:54:47Z josx $
 * @filesource
 * @license GPL
 */

class boletinComponents extends sfComponents
{

    public function executeMostrar() {
        // Inicializar variables
        $optionsConcepto = array();
        $optionsPeriodo = array();
        $optionsActividad = array();
        $alumno = "";
        $division = "";
        $alumno_id = "";
        $division_id = "";
        $notaAlumno = array();
        $conceptoAlumno = array();
        $aAsistencia = array();

        $alumno_id = $this->alumno_id;
        $division_id = $this->division_id;
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $no_cargar = 0;

        if($alumno_id) {
            $alumno = AlumnoPeer::retrieveByPK($alumno_id);

            if(!$division_id) {
                $c = new Criteria();
                $c->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $alumno_id);
                $ad = RelAlumnoDivisionPeer::doSelectOne($c);
                if($ad) {
                    $division_id = $ad->getFkDivisionId();
                } else {
                    $no_cargar = 1;
                }
            }

            if($no_cargar == 0) {

                $division = DivisionPeer::retrieveByPK($division_id);

                $optionsActividad = $division->getActividadesArray();

                $e = EstablecimientoPeer::retrieveByPk($establecimiento_id);
                $optionsConcepto = $e->getConceptosArray();

                $notaAlumno = $alumno->getNotas($this->getUser()->getAttribute('fk_ciclolectivo_id'));
                $conceptoAlumno = $alumno->getNotasConcepto();

                $c = CiclolectivoPeer::retrieveByPk($this->getUser()->getAttribute('fk_ciclolectivo_id'));
                $optionsPeriodo = $c->getPeriodosArray();

                $aAsistencia = $alumno->getAsistenciasPorCiclolectivo($this->getUser()->getAttribute('fk_ciclolectivo_id'));
            } else {
                $this->getUser()->setFlash('notice','Error: el alumno no esta en ninguna división');
            }
        } else {
            $this->getUser()->setFlash('notice','Error: no envio el alumno');
        }


        // variables al template
        $this->establecimiento = EstablecimientoPeer::retrieveByPk($establecimiento_id);
        $this->optionsPeriodo = $optionsPeriodo;
        $this->optionsActividad = $optionsActividad;
        $this->cantOptionsActividad = count($optionsActividad);
        $this->alumno = $alumno;
        $this->division = $division;
        $this->optionsConcepto = $optionsConcepto;
        $this->cantOptionsConcepto = count($optionsConcepto);
        $this->notaAlumno = $notaAlumno;
        $this->conceptoAlumno = $conceptoAlumno;
        $this->aAsistencia = $aAsistencia;
        $this->cantOptionsAsistencia = (count($aAsistencia)>0)?count(current($aAsistencia)):0;
    }


}
