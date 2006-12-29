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
 * asistencia actions.
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class asistenciaActions extends sfActions
{
    
    /**
    * Executes index action
    *
    */
    public function executeIndex() {
        Misc::use_helper('Misc');   
    
        //Datos por default 
        $alumno_id = -1;
        $cuenta_id = -1;
        $fechainicio = date("d/m/Y");        
        $datos = array();
        $idxAlumno= array(); 
        $this->vista_id = 1;         
        $this->division_id =0;
        $aFeriado = array();
        
        //Asignacion por parametro    
        if ($this->getRequestParameter('alumno_id')) {
            $alumno_id = $this->getRequestParameter('alumno_id');   
            $a = AlumnoPeer::retrieveByPK($alumno_id);
            $cuenta_id = $a->getFkCuentaId();
        }

        if ($this->getRequestParameter('vistas'))
            $this->vista_id  = $this->getRequestParameter('vistas');              

        if ($this->getRequestParameter('fechainicio'))
            $fechainicio = $this->getRequestParameter('fechainicio');
          
       // if (!dateValidate($fechainicio))
       //     $fechainicio = date("d/m/Y");        
           
        list($d, $m, $y) = split("[/. -]",$fechainicio);
        list($y, $m, $d) = split("[/. -]",date ("Y-m-d", mktime (0,0,0,$m,$d,$y)));        
        $this->fechainicio = "$y-$m-$d";
        
        $aIntervalo = array();               
        $aIntervalo = diasxintervalo($d,$m,$y,$this->vista_id);      
        $establecimiento_id = $this->getUser()->getAttribute('fk_establecimiento_id');
        $criteria = new Criteria();
        $criteria->add(AnioPeer::FK_ESTABLECIMIENTO_ID, $establecimiento_id);
        $divisiones = DivisionPeer::doSelectJoinAnio($criteria);        
        
        $optionsDivision = array();
        foreach ($divisiones as $division)
             $optionsDivision[$division->getId()] = $division->getAnio()->getDescripcion()." ".$division->getDescripcion();        
        asort($optionsDivision);

        if ($this->getRequestParameter('division_id')) {
            $this->division_id = $this->getRequestParameter('division_id');    
        } else {
            if ($this->getRequestParameter('alumno_id')) 
                $this->division_id = 1;
            else{
                $d = array_keys($optionsDivision);        
                $this->division_id = $d[0];
            }     
        }

        $criteria = new Criteria();
        $feriados = FeriadoPeer::doSelect($criteria);        
        foreach($feriados as $feriado) {
            $aFeriado[$feriado->getFecha()] = $feriado->getNombre(); 
        }

        //Obtener los alumnos de la division y asistencias en el rango de fecha
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel'); 
        $s = "SELECT alumno.id, alumno.nombre, alumno.apellido,";
        $s .= "tipoasistencia.descripcion, tipoasistencia.nombre asistencia, asistencia.fecha,";
        $s .= "fk_tipoasistencia_id ";
        $s .= "FROM (alumno, rel_alumno_division) ";
        $s .= "LEFT JOIN asistencia ON ( rel_alumno_division.FK_ALUMNO_ID = asistencia.FK_ALUMNO_ID ";
        $s .= "AND asistencia.FECHA ";
        $s .= "IN (";
        for($i=0, $max = count($aIntervalo); $i < $max ;$i++) { 
             $s .= "'".$aIntervalo[$i]."'";
             if  ($i < count($aIntervalo)-1 )
                $s .= ",";
        }
        $s .= ") ) ";
        $s .= "LEFT JOIN tipoasistencia ON ( asistencia.FK_TIPOASISTENCIA_ID = tipoasistencia.ID ) ";
        $s .= "WHERE ";
        if ($alumno_id >= 0)
            $s .= "alumno.ID =".$alumno_id;
        else
            $s .= "rel_alumno_division.FK_DIVISION_ID =". $this->division_id;
        $s .= " AND rel_alumno_division.FK_ALUMNO_ID = alumno.ID";    
        $s .= " ORDER BY alumno.nombre,asistencia.FECHA";
        
        $stmt = $con->createStatement();
        $alumnos = $stmt->executeQuery($s, ResultSet::FETCHMODE_ASSOC);
                
        $totales = array();  
        $tot = 0;

        foreach ($alumnos as $alumno){
            $idxAlumno[$alumno['id']] = $alumno['apellido']." ". $alumno['nombre'];
            if  ($alumno['fecha']) {
                $datos[$alumno['id']][$alumno['fecha']] = $alumno['asistencia'];
                @$totales[$alumno['asistencia']]++;
            }
        }

        $aTipoasistencias = $this->getTiposasistencias();
        $aPorcentajeAsistencia = array();
        $flag = 0;
        $tot = 0;

        $dias = count($aIntervalo)*count($idxAlumno);
        foreach($aTipoasistencias as $idx => $Tipoasistencia) {
            $aPorcentajeAsistencia[$idx]=isset($totales[$idx])?$totales[$idx]:0;
            @$tot += $totales[$idx];
            if($aPorcentajeAsistencia[$idx] != 0) $flag = 1;
        }
        
        if(file_exists(sfConfig::get('sf_upload_dir_name').'/grafico_asistencias.png'))
            unlink(sfConfig::get('sf_upload_dir_name').'/grafico_asistencias.png');

        if($flag == 1) {

        $aTitulo = array_keys($aTipoasistencias);
        $aTitulo[] = "No Cargado";

        include "graph.php";
        putenv('GDFONTPATH=' . realpath(sfConfig::get('sf_lib_dir')."/font/"));
        $graph = new graph();
        $graph->setProp("font","FreeSerifBold.ttf");
        $graph->setProp("keyfont","FreeSerifBold.ttf");
        $graph->setProp("showkey",true);
        $graph->setProp("type","pie");
        $graph->setProp("showgrid",false);
        $graph->setProp("key", $aTitulo);
        $graph->setProp("keywidspc",-50);
        $graph->setProp("keyinfo",2);
         foreach($aPorcentajeAsistencia as $porcentaje)  {
             $graph->addPoint($porcentaje);
         }
        $graph->addPoint($dias-$tot);

        $graph->graphX();
        $graph->showGraph(sfConfig::get('sf_upload_dir_name').'/grafico_asistencias.png');
        }
        //print_r($optionsDivision);
        //Asignacion de variables para el template
        $this->aTipoasistencias = $aTipoasistencias;
        $this->aAlumnos = $idxAlumno;
        $this->aDatos = $datos;
        $this->optionsDivision = $optionsDivision;    
        $this->aVistas = repeticiones();
        $this->aMeses = Meses();
        $this->m = $m;
        $this->aIntervalo = $aIntervalo;
        $this->aPorcentajeAsistencia = $aPorcentajeAsistencia;
        $this->aFeriado = $aFeriado;
        $this->alumno_id = $alumno_id;
        $this->cuenta_id = $cuenta_id;
  }
  
  /**
  * Accion para mostrar los datos cambiados en el form
  */
  public function executeMostrar() {
    $vista_id  = $this->getRequestParameter('vistas');              
    $fechainicio = str_replace("/","-",$this->getRequestParameter('fechainicio'));
    return $this->forward('asistencia','index',"vista_id=$vista_id&fechainicio=$fechainicio");
     
  }
  
  public function handleErrorMostrar(){
    $this->forward('asistencia', 'index');
  }  
  
  /**
  * Graba las asistencias
  */
  public function executeGrabar() {

        // inicializando variables
        $aDatosTipoasistencia = array();

        // tomando los datos del formulario
        $division_id = $this->getRequestParameter('division_id');
        $vista_id = $this->getRequestParameter('vista_id');
        $fechainicio = $this->getRequestParameter('fechainicio');
        list($y, $m, $d) = split("[/. -]",$fechainicio);        
        $fechainicio = "$d-$m-$y";
        $destino = "asistencia?division_id=$division_id&fechainicio=$fechainicio&vistas=$vista_id";
        if ($this->getRequestParameter('alumno_id')) {
            $alumno_id = $this->getRequestParameter('alumno_id');   
            $destino .= "&alumno_id=$alumno_id";
        }    
        $aAsistencia = $this->getRequestParameter('asistencia');
        
        $cantAsistencia = count($aAsistencia);
        if($cantAsistencia > 0) {
            // tomo los tipos de asistencias
            $aDatosTablaTipoAsistencias = $this->getTiposasistencias();
            //print_r($aDatosTablaTipoAsistencias);
            //die();    
            //grabo al disco
            $con = Propel::getConnection();
            try {
                $con->begin();
                $criteria = new Criteria();

                foreach($aAsistencia as $alumno_id => $aPeriodo ) {
                    foreach($aPeriodo as $fecha => $Tipoasistencia) {
                        $fecha = str_replace("'","",$fecha);
                        $alumno_id = str_replace("'","",$alumno_id);
                        $cton1 = $criteria->getNewCriterion(AsistenciaPeer::FK_ALUMNO_ID, $alumno_id);
                        $cton2 = $criteria->getNewCriterion(AsistenciaPeer::FECHA, $fecha);
                        $cton1->addAnd($cton2);
                        $criteria->addOr($cton1);
                    }
                }
                AsistenciaPeer::doDelete($criteria);
                    
                foreach($aAsistencia as $alumno_id => $aPeriodo ) {
                    foreach($aPeriodo as $fecha => $Tipoasistencia) {
                        //die($TipoAsistencia);
                        $Asistencia = new Asistencia();
                        if(array_key_exists($Tipoasistencia, $aDatosTablaTipoAsistencias)){
                            $alumno_id = str_replace("'","",$alumno_id);
                            $Asistencia->setFkAlumnoId($alumno_id);
                            $fecha = str_replace("'","",$fecha);
                            list($y, $m, $d) = split("[/. -]",$fecha);        
                            $fecha = "$y-$m-$d";
                            $Asistencia->setFecha($fecha);
                            $Asistencia->setFkTipoasistenciaId($aDatosTablaTipoAsistencias[$Tipoasistencia][0]);
                            $Asistencia->save();
                         }                          
                    }
                }
                $con->commit();
             }
             catch (Exception $e){
                 $con->rollback();
                 throw $e;
            }
        }
        
        
        
            
        return $this->redirect($destino);    
    }
        
     /**
     * Obtiene los tipos de asistencias
     */   
     protected function getTiposasistencias() {
        $aDatosTablaTipoAsistencias = array();
        $criteria = new Criteria();
        $aTipoasistencias = TipoasistenciaPeer::doSelect($criteria);
        foreach($aTipoasistencias as $tipoasistencia) {
            $aDatosTablaTipoAsistencias[$tipoasistencia->getNombre()] = array($tipoasistencia->getId(),$tipoasistencia->getDescripcion());
        }
        return $aDatosTablaTipoAsistencias;
     }
}
?>
