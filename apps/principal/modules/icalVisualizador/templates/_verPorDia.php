<?php use_helper('I18N') ?>
<link rel="stylesheet" type="text/css" href="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot()?>/icalVisualizador/css/icalVisualizador.css"/>

<center>
<div id="icalVisualizador">
<table border="0" width="700" cellspacing="0" cellpadding="0">
    <tr>
        <td width="520" valign="top">
            <table width="520" border="0" cellspacing="0" cellpadding="0" class="calborder">
                <tr>
                    <td align="center" valign="middle">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr valign="top">
                                <td align="left" width="400" class="title">
                                    <h1><?php echo date("F j, Y", $date);?></h1>
                                    <span class="V9G"><?php echo $calendar_name?> <?php echo $l_calendar?></span></td>
                                <td align="right" width="120" class="navback">	
                                    <div style="padding-top: 3px;">
                                        <table width="120" border="0" cellpadding="0" cellspacing="0">
                                            <tr valign="top">
                                                <td><a class="psf" href="?view=day&amp;date=<?php echo date("Ymd",$date)?>"><img src="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot()?>/icalVisualizador/images/day_on.gif" alt="d&iacute;a" border="0" /></a></td>
                                                <td><a class="psf" href="?view=week&amp;date=<?php echo date("Ymd",$date)?>"><img src="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot()?>/icalVisualizador/images/week_on.gif" alt="semana" border="0" /></a></td>
                                                <!--<td><a class="psf" href="?view=month&amp;date=<?php echo date("Ymd",$date)?>"><img src="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot()?>/icalVisualizador/images/month_on.gif" alt="mes" border="0" /></a></td>
                                                <td><a class="psf" href="?view=year&amp;date=<?php echo date("Ymd",$date)?>"><img src="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot()?>/icalVisualizador/images/year_on.gif" alt="a&ntilde;o" border="0" /></a></td>-->
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>	
                                <td colspan="2">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                        <tr>
                                            <td align="left" valign="top" width="20" class="rowOff2" onmouseover="this.className='rowOn2'" onmouseout="this.className='rowOff2'" onclick="window.location.href='?view=day&amp;date=<?php echo date('Ymd', strtotime("-1 day",  $date))?>'"><span class="V12"><a class="psf" href="?view=day&amp;date=<?php echo date('Ymd', strtotime("-1 day",  $date))?>">&laquo;</a></span>
                                            </td>

                                            <?php 
                                                    $i=0; 
                                                    $day_of_week = date('w', $date);
                                                    foreach($aWeek as $week) {
                                            ?>
                                            <td width="14%" align="center" class="<?php echo ($i == $day_of_week)?'rowToday':'rowOff';?>" onmouseover="this.className='rowOn'" onmouseout="this.className='<?php echo ($i == $day_of_week)?'rowToday':'rowOff';?>'" onclick="window.location.href='?view=day&amp;date=<?php echo date('Ymd',$week['day'])?>'"><span class="V9BOLD"><a class="ps3" href="?view=day&amp;date=<?php echo date('Ymd',$week['day'])?>"><?php echo date('F j, Y',$week['day'])?></a></span>
                                            </td>
                                            <?php       $i++;
                                                    } 
                                            ?>

                                            <td align="right" valign="top" width="20" class="rowOff" onmouseover="this.className='rowOn'" onmouseout="this.className='rowOff'" onclick="window.location.href='?view=day&amp;date=<?php echo date('Ymd', strtotime("+1 day",  $date))?>'"><span class="V12"><a class="psf" href="?view=day&amp;date=<?php echo date('Ymd', strtotime("+1 day",  $date))?>">&raquo;</a></span>
                                            </td>
                                        </tr>	
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>   
                <tr id="allday">
                    <td>
                        <?php foreach($aAllDay as $allDay) { ?>
                        <div class="alldaybg_<?php echo $allDay['num']?>">
                        <?php echo $allDay['Name']?>
                        </div>
                        <?php } ?>
                    </td>
                </tr>

                <tr>
		  <td align="center" valign="top" colspan="3">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <?php 
                            $salta = 0; //si el evento pasa hacia otra franja horaria de la grafica
                            $date_ymd = date("Ymd", $date);
                            for($i = 0, $max = count($aTime); $i < $max; $i += 4) { 
                                $time_idx0 = date("Hi",$aTime[$i]);
                                $time_idx1 = date("Hi",$aTime[($i+1)]);
                                $time_idx2 = date("Hi",$aTime[($i+2)]);
                                $time_idx3 = date("Hi",$aTime[($i+3)]);

                                if(!(  array_key_exists($date_ymd, $aEvent) AND 
                                    (array_key_exists($time_idx0, $aEvent[$date_ymd]) OR
                                    array_key_exists($time_idx1, $aEvent[$date_ymd]) OR
                                    array_key_exists($time_idx2, $aEvent[$date_ymd]) OR
                                    array_key_exists($time_idx3, $aEvent[$date_ymd])) 
                                    )) { 
                        ?>
                        <tr>
                            <td rowspan="4" align="center" valign="top" width="60" class="timeborder"><?php echo date("H:i A",$aTime[$i])?></td>
                            <td bgcolor="#a1a5a9" width="1" height="15"></td>
                            <td colspan="<?php echo $nbrGridCols?>" class="dayborder">&nbsp;</td>
                        </tr>
                        <tr>
                            <td bgcolor="#a1a5a9" width="1" height="15"></td>
                            <td colspan="<?php echo $nbrGridCols?>" class="dayborder2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td bgcolor="#a1a5a9" width="1" height="15"></td>
                            <td colspan="<?php echo $nbrGridCols?>" class="dayborder">&nbsp;</td>
                        </tr>
                        <tr>
                            <td bgcolor="#a1a5a9" width="1" height="15"></td>
                            <td colspan="<?php echo $nbrGridCols?>" class="dayborder2">&nbsp;</td>
                        </tr>
                        <?php 
                                } else {


                                    $find = 0; // si se encontro algun evento
                                    for($j=0;$j<4;$j++) {
                                        if($j!=0) { 
                        ?>
                            <tr>
                                <td bgcolor="#a1a5a9" width="1" height="15"></td>
                        <?php           } else {  ?>
                            <tr>
                                <td rowspan="4" align="center" valign="top" width="60" class="timeborder"><?php echo date("H:i A",$aTime[$i])?></td>
                                <td bgcolor="#a1a5a9" width="1" height="15"></td>
                        <?php        

                                       }
                                        $var_time_idx = "time_idx".$j;
                                        if(array_key_exists($$var_time_idx, $aEvent[$date_ymd])) {
                                            $find = 1;
                                            $k=0;
                                            foreach($aEvent[$date_ymd][$$var_time_idx] as $event) {
                                                $k++;
                                                $rowspan = round(($event['event_length'] / 60 ) / 15); // en el array esta en seg lo divido 60 y obtengo min luego divido 15 min (que es una linea de rowspan y obtengo cantidad de lineas hacia abajo a rellenar

                                                // evalua si pasa o no el rowspan hacia otra hora
                                                if( (4-round(substr($$var_time_idx,2,2)/15)) < $rowspan) {
//                                                     echo $$var_time_idx."    ".(4-round(substr($$var_time_idx,2,2)/15))." < $rowspan<br>";
//                                                     $salta = 1;
                                                }
                                                $newColspan = floor($nbrGridCols / ($event['event_overlap']+1));
                        ?>

<td rowspan="<?php echo $rowspan?>" width="<?php echo floor(460/($event['event_overlap']+1))?>" colspan="<?php echo $newColspan ?>" align="left" valign="top" class="eventbg2_1">
    <div class="eventfont">
        <div class="eventbg_1"><b><?php echo date("H:i A", $event['start_unixtime'])?></b> - <?php echo date("H:i A", $event['end_unixtime'])?></div>
        <div class="padd"> <!-- style="width:<?php echo floor(460/($event['event_overlap']+1))?>px"> -->
        <a class="ps" title="<?php echo $event['event_text']?>" href="#" onclick="openEventWindow(0); return false;"><?php echo $event['event_text']?></a>
        </div>
    </div>
</td>
                        <?php               }
                                        } else {
//                                             if($find == 0 AND $salta == 0) { 
                                                if(!isset($newColspan)) $newColspan = $nbrGridCols;
                                                ?><td colspan="<?php echo $newColspan?>" class="<?php echo ($j%2==0)?" dayborder":"dayborder2"?>">&nbsp;</td>
                        <?php
                                        }
                        ?></tr><?php
                                }
                             } ?>
                        <?php } ?>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td class="tbll"><img src="images/spacer.gif" alt="" width="8" height="4" /></td>
                <td class="tblbot"><img src="images/spacer.gif" alt="" width="8" height="4" /></td>
                <td class="tblr"><img src="images/spacer.gif" alt="" width="8" height="4" /></td>
            </tr>
        </table>
    </td>
    <td width="10"><img src="images/spacer.gif" width="10" height="1" alt=" " /></td>
    <td width="170" valign="top">

</td>
</tr>
</table>
</div>
</center>