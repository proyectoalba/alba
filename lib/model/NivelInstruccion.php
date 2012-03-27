<?php

class NivelInstruccion extends BaseNivelInstruccion
{
	public function __toString(){
		return $this->descripcion;
	}
}
