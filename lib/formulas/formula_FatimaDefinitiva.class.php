<?php

require_once ('lib/formulas/albaFormulaBoletin.class.php');

class formula_FatimaDefinitiva extends albaFormulaBoletin {

 public function init()
  {
    $this->ayuda = "Esta formula calcula la nota final segun el criterio siguiente:";
    $this->ayuda .= "Parametros: Nfinal, N3trimestre, NDiciembre, NMarzo";
    $this->nombre = 'FatimaDefinitiva';
  }

  public function calcular($parametros = array())
  {
    if (count($parametros) < 2) {
        return '';
    }

    //se va a marzo derecho
    if ($parametros[0] <4 || $parametros[2] <6) {
        //marzo derecho
        if (isset($parametros[3]) && $parametros[3] != '') {
            //queda la nota de marzo como definitiva
            return $parametros[3];
        }
        else {
            //todavia no hay nota de marzo
            return '';
        }

    }

    // aprobo todo oka durante los trimestres
    if ($parametros[0] >= 6 && $parametros[1] >=6) {
        return $parametros[0];
    }


    //rinde en diciembre
    if (($parametros[0] >=4 && $parametros[0] <6) || $parametros[1] < 6) {
        if (isset($parametros[2]) && $parametros[2] >=6) {
            return sprintf("%01.2f",($parametros[0]+$parametros[2])/2);
        }
        else {
            //no hay nota de diciembre o no aprobo
            return '';
        }
    }




  }
}
?>
