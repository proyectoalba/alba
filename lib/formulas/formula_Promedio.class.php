<?php

require_once ('lib/formulas/albaFormulaBoletin.class.php');

class formula_Promedio extends albaFormulaBoletin {

 public function init()
  {
    $this->ayuda = "Esta formula calcula el promedio entre las notas de 3 periodos p1,p2 y p3\n";
    $this->ayuda .= "Se debe utilizar: Promedio|4,5,6\n";
    $this->ayuda .= "Donde 4,5 y 6 son los ID's de los periodos que se obtienen las notas";
    $this->nombre = 'Promedio';
  }

  public function calcular($parametros = array())
  {
    $total = 0;
    if ($parametros[0] == '' || $parametros[1] == '' || $parametros[2] =='' ) {
      return '';
    }
    $suma = $parametros[0]+$parametros[1]+ $parametros[2];
    $prom =($suma) / 3;

    return sprintf("%01.2f",$prom);
  }
}
?>
