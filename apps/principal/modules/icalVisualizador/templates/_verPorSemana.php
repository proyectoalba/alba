<?php use_helper('I18N') ?>
<link rel="stylesheet" type="text/css" href="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot()?>/icalVisualizador/css/icalVisualizador.css"/>

<center>
<div id="icalVisualizador">
    <table border="0" width="770" cellspacing="0" cellpadding="0">
        <tr>
            <td width="610" valign="top">
                <table width="610" border="0" cellspacing="0" cellpadding="0" class="calborder">
                    <tr>
                        <td align="center" valign="middle">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="top">
                                    <td align="left" width="490" class="title"><h1><?php echo date("F j, Y", $day_start_of_week);?> - <?php echo date("F j, Y", $day_end_of_week);?></h1><span class="V9G"><?php echo $calendar_name?> <?php echo $l_calendar?></span></td>
                                    <td valign="top" align="right" width="120" class="navback">	
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
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="G10B">
                                <tr>
                                    <td align="center" valign="top">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>


                                                <td align="left" valign="top" width="15" class="rowOff2" onmouseover="this.className='rowOn2'" onmouseout="this.className='rowOff2'" onclick="window.location.href='?view=week&amp;date=<?php echo date('Ymd', strtotime("-1 day",  $day_start_of_week))?>'">
                                                    <div class="V12">&nbsp;<a class="psf" href="?view=week&amp;date=<?php echo date('Ymd', strtotime("-1 day",  $day_start_of_week))?>">&laquo;</a></div>
                                                </td>


                                                <td align="left" valign="top" width="15" class="rowOff" onmouseover="this.className='rowOn'" onmouseout="this.className='rowOff'" onclick="window.location.href='?view=week&amp;date=<?php echo date('Ymd', strtotime("-1 day",  $date))?>'">

                                                    <div class="V12">&nbsp;<a class="psf" href="?view=week&amp;date=<?php echo date('Ymd', strtotime("-1 day",  $date))?>">&lsaquo;</a></div>
                                                </td>
                                                
                                                <td align="right" valign="top" width="15" class="rowOff" onmouseover="this.className='rowOn'" onmouseout="this.className='rowOff'" onclick="window.location.href='?view=week&amp;date=<?php echo date('Ymd', strtotime("+1 day",  $date))?>'">
                                                    <div class="V12"><a class="psf" href="?view=week&amp;date=<?php echo date('Ymd', strtotime("+1 day",  $date))?>">&rsaquo;</a>&nbsp;</div>
                                                </td>

                                                <td align="right" valign="top" width="15" class="rowOff" onmouseover="this.className='rowOn'" onmouseout="this.className='rowOff'" onclick="window.location.href='?view=week&amp;date=<?php echo date('Ymd', strtotime("+1 day",  $day_end_of_week))?>'">
                                                    <div class="V12"><a class="psf" href="?view=week&amp;date=<?php echo date('Ymd', strtotime("+1 day",  $day_end_of_week))?>">&raquo;</a>&nbsp;</div>
                                                </td>

                                                <td width="1"></td>
                                                <?php 
                                                    $i=0; 
                                                    $day_of_week = date('w', $date);
                                                    foreach($aWeek as $week) {
                                                ?> <!-- Aca va el colspan dinamico-->
                                                <td width="80" colspan="<?php echo $nbrGridCols[$week['day']]?>" align="center" class="<?php echo ($i == $day_of_week)?'rowToday':'rowOff';?>" onmouseover="this.className='rowOn'" onmouseout="this.className='<?php echo ($i == $day_of_week)?'rowToday':'rowOff';?>'" onclick="window.location.href='?view=day&amp;date=<?php echo date('Ymd',$week['day'])?>'">
                                                <a class="ps3" href="?view=day&amp;date=<?php echo date('Ymd',$week['day'])?>"><span class="V9BOLD"><?php echo date('F j, Y',$week['day'])?></span></a> 
                                                </td>
                                                <?php 
                                                        $i++;
                                                    } 
                                                ?>
                                            </tr>

                                            <tr valign="top" id="allday">
                                                <td width="60" class="rowOff2" colspan="4"><img src="images/spacer.gif" width="60" height="1" alt=" " /></td>
                                                <td width="1"></td>
                                                <?php 
                                                    $i=0; 
                                                    $day_of_week = date('w', $date);
                                                    foreach($aWeek as $week) {
                                                ?> 
                                                <td width="80" colspan="<?php echo $nbrGridCols[$week['day']]?>" class="rowOff"><!-- <div class="alldaybg_{CALNO}"> {ALLDAY}  <img src="images/spacer.gif" width="80" height="1 alt=" " /></div>--></td>
                                                <?php 
                                                        $i++;
                                                    }
                                                ?>
                                            </tr>
<?php
//  print_R($aEvent);
    $entreHoras = array();
    $aTimeIdx = array();
    $ult_guardo = -1;
    for($i = 0, $max = count($aTime); $i < $max; $i += 4) { // each time iteration (60 minutes)
        $aTimeIdx[0] = date("Hi",$aTime[$i]);
        $aTimeIdx[1] = date("Hi",$aTime[($i+1)]);
        $aTimeIdx[2] = date("Hi",$aTime[($i+2)]);
        $aTimeIdx[3] = date("Hi",$aTime[($i+3)]);
        $find = 0;
        $cant = 0;

        $k_ant = -1;    
        for($k=0;$k<4;$k++) {
            $cant_k=0;
            echo "<tr>\n"; 
            $j=0;
            
            foreach($aWeek as $week) { //each day of the week
                $drawWidth = 1;
// echo $nbrGridCols[$week['day']]."<br>";
                $width = round ((80/$nbrGridCols[$week['day']])*$drawWidth);
                $each_date = date("Ymd", $week['day']);
// echo $each_date." ".$aTimeIdx[$k]."<br>";
                if(array_key_exists($each_date, $aEvent) AND  array_key_exists($aTimeIdx[$k], $aEvent[$each_date])) { 
                    $cant++;
                    $find = 1;
                    $kk = $k;
                    if($j == 0 AND $k == 0) {
                        echo '<td colspan="4" rowspan="4" align="center" valign="top" width="60" class="timeborder">'.date("H:i A",$aTime[$i]).'</td><td bgcolor="#a1a5a9" width="1" height="15"></td>';
                    } else {
                        if($k!=0 AND $j==0) { // Second time
                            echo '<td bgcolor="#a1a5a9" width="1" height="15"></td>'."\n";
                        }
                    }
                    foreach($aEvent[$each_date][$aTimeIdx[$k]] as $event) {
                        $width = ceil(80 / ($event['event_overlap']+1));
                        $rowspan = ceil(($event['event_length'] / 60 ) / 15); ?>
                                                <td width="<?php echo $width?>" rowspan="<?php echo $rowspan?>" colspan="<?php echo floor($nbrGridCols[$week['day']] / ($event['event_overlap']+1)) ?>" align="left" valign="top" class="eventbg2_1">
                                                    <div class="eventfont">
                                                        <div class="eventbg_1"><b><?php echo date("H:i A", $event['start_unixtime'])?></b></div>
                                                        <div class="padd"><a class="ps" title="<?php echo $event['event_text']?>" href="#" onclick="openEventWindow(0); return false;"><?php echo $event['event_text']?></a>
                                                        </div>
                                                    </div>
                                               </td>
<?
                        $ocupados = 4-round(substr($aTimeIdx[$k],2,2)/15);
                        if( $ocupados < $rowspan) {
                                  $entreHoras["$i"][]=$rowspan-$ocupados;
                        }

                    }
                } else {
                    if($j == 0 AND $k == 0) { // first time 
                        echo '<td colspan="4" rowspan="4" align="center" valign="top" width="60" class="timeborder">'.date("H:i A",$aTime[$i]).'</td>'."\n";
                        echo '<td bgcolor="#a1a5a9" width="1" height="15"></td>'."\n";
                    } else {
                        if($k!=0 AND $j==0) { // Second time
                            echo '<td bgcolor="#a1a5a9" width="1" height="15"></td>'."\n";
                        }
                    }

                    $nn = 0;
                    if(isset($entreHoras)) {
                        foreach($entreHoras as $indice  => $contenido ) {
                            if($indice != $i) {
                                $max_contenido = count($contenido);
                                for($pp=0;$pp<$max_contenido;$pp++) {       
                                    if($contenido[$pp]>0 AND $cant_k < $max_contenido) {
                                        $entreHoras["$indice"][$pp]--;
                                        $nn=1;
                                        $cant_k++;
                                        break 2;
                                    } 
                                }
                            }
                        }
                    }


                    if($nn == 0) {
                        if($k > 0 AND $find == 1 AND $j == 6) { // only write 6 td if event was find 
                            if($k == $kk) {
                                echo '<td width="'.$width.'" colspan="1"  class="weekborder">&nbsp;</td>'."\n";
                            }
                        } else {
                            if($k > 0 AND $find == 1) {
                                 if($cant <= $j+1) { 
                                    echo '<td width="'.$width.'" colspan="1"  class="weekborder">&nbsp;</td>'."\n";
                                }
                            } else {
                                echo '<td width="'.$width.'" colspan="'.$nbrGridCols[$week['day']].'"  class="weekborder">&nbsp;</td>'."\n";
                            }
                        }
                    }
                }
                $j++;
            }
            echo "</tr>\n";
        }
}
?>
                                        </table>	
                                    </td>
                                </tr>
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
            <td width="10">
                <img src="images/spacer.gif" width="10" height="1" alt=" " />
            </td>
            <td width="170" valign="top">
                <!-- {SIDEBAR}-->
            </td>
        </tr>
    </table>
</div>
</center>