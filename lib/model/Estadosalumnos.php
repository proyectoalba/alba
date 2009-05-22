<?php

class Estadosalumnos extends BaseEstadosalumnos
{
   public function __toString() {
       return $this->getNombre();
   }
}
