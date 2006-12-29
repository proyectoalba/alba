<style>

table.horario {
 border: 1px solid;
}

table.horario th {
 text-align: center;
 border: 1px solid;
 background-color: #C1FFC1;
}

table.horario td {
 border: 1px solid;
 text-align: center;
}


table.horario td.activo {
 background-color: #86C67C;
}

table.horario td.inactivo {
 background-color: #CD0000;
}

table.horario td.evento {
 background-color: #68838B;
}


</style>

<h1>Horario para la Divsión: <?=$division->getAnio()->getDescripcion()." ".$division->getDescripcion()?></h1>

<table cellspacing="0" class="horario">
  <thead>
  <tr>
    <th colspan="2">Horas/Días</th>
<? foreach($aDia as $dia) {?>
    <th><?=$dia?></th>
<? } ?>

  </tr>
  </thead>

  <tbody>
<? 
    $aColor= colorTurnos();
    $aColorUsado = array();
    $i=-1;
    $ultimo = "";
    foreach($aHoras as $idx => $horas){ 
        if($ultimo != $horas->getFkTurnosId()) {
            $i++;
            $aColorUsado[] = $aColor[$i];
            $aTurnos[] = $horas->getTurnos()->getDescripcion();
        }
?>
    <tr>
        <td  style="background-color: <?=$aColor[$i]?>" width="3%"><?=$horas->getHoraInicio()." ".$horas->getHoraFin()?></td>
        <td  style="background-color: <?=$aColor[$i]?>" width="8%"><?=$horas->getNombre()?></td>

        <? foreach($aDia as $idx_dia => $dia) { 
                switch($horas->getDia()) {
                    case "8":  case "$idx_dia": $color = "activo"; break;
                    default: $color = "inactivo";
                }
                $actividad = "";
                if ( array_key_exists($idx, $aEvento) AND array_key_exists($idx_dia, $aEvento[$idx])) {
                    $color = "evento";
                    $actividad = $aEvento[$idx][$idx_dia];  
                }
?>
        <td  class="<?=$color?>"><?=$actividad?></td>
        <? } ?>
    </tr>   
<?      $ultimo = $horas->getFkTurnosId();
    } 
?>

  </tbody>
</table>


<br>
<br>
Otra Referencia:
<table cellspacing="0" class="horario">
  <tr>
    <td width="10%" class="inactivo">Inactivo</td>
    <td width="10%" class="activo">Activo</td>
    <td width="10%" class="evento">Evento</td>
  </tr>
</table>