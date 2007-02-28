<div class="content<?php if ($sf_request->hasError('horarioescolar{fk_turnos_id}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('horarioescolar{fk_turnos_id}')): ?>
    <?php echo form_error('horarioescolar{fk_turnos_id}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>
</div>
<?
    $aTurnos = array();
    $c = new Criteria();
    $c->add(TurnosPeer::FK_CICLOLECTIVO_ID,$sf_user->getAttribute('fk_ciclolectivo_id'));
    $sqlTurnos  = TurnosPeer::doSelect($c);
    foreach($sqlTurnos as $turnos) {
        $aTurnos[$turnos->getId()] = $turnos->getDescripcion();
    }

    echo select_tag("horarioescolar[fk_turnos_id]", options_for_select($aTurnos, $horarioescolar->getFkTurnosId()));
?>