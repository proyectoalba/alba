<?php

class NivelInstruccionPeer extends BaseNivelInstruccionPeer
{
	public static function doSelectForCombo(){
		$c = new Criteria();
		$c->addAscendingOrderByColumn(self::DESCRIPCION);
		$rs = self::doSelect($c);
		return $rs;
	}
}
