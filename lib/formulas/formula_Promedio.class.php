<?php

require_once ('lib/formulas/albaFormulaBoletin.class.php');

class formula_Promedio extends albaFormulaBoletin {

 public function init()
  {
    $this->ayuda = "Esta formula calcula el promedio entre los parametros pasados (P1 y P2)\n";
    $this->ayuda .= "Luego si P3 >=6, queda como resultado este promedio de P1 y P2";
    $this->ayuda .= "Si P3<6 el resultado es P3";
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
