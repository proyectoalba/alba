<?php 

        $c = new Criteria();
        $c->AddAscendingOrderByColumn(CuentaPeer::NOMBRE);
        $cuentas = CuentaPeer::doSelect($c);
        $optCuenta[""]  = "";
        foreach($cuentas as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
        }
        echo select_tag('alumno[fk_cuenta_id]', options_for_select($optCuenta,$alumno->getFkCuentaId()));

?>
