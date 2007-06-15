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
                                                <td><a class="psf" href="?view=month&amp;date=<?php echo date("Ymd",$date)?>"><img src="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot()?>/icalVisualizador/images/month_on.gif" alt="mes" border="0" /></a></td>
                                                <td><a class="psf" href="?view=year&amp;date=<?php echo date("Ymd",$date)?>"><img src="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot()?>/icalVisualizador/images/year_on.gif" alt="a&ntilde;o" border="0" /></a></td>
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
                                                <td width="80" colspan="1" align="center" class="<?php echo ($i == $day_of_week)?'rowToday':'rowOff';?>" onmouseover="this.className='rowOn'" onmouseout="this.className='<?php echo ($i == $day_of_week)?'rowToday':'rowOff';?>'" onclick="window.location.href='?view=day&amp;date=<?php echo date('Ymd',$week['day'])?>'">
                                                <a class="ps3" href="?view=day&amp;date=<?php echo date('Ymd',$week['day'])?>"><span class="V9BOLD"><?php echo date('F j, Y',$week['day'])?></span></a> 
                                                </td>
                                                <?php 
                                                        $i++;
                                                    } 
                                                ?>
                                            </tr>
-
                                            <tr valign="top" id="allday">
                                                <td width="60" class="rowOff2" colspan="4"><img src="images/spacer.gif" width="60" height="1" alt=" " /></td>
                                                <td width="1"></td>
                                                <?php 
                                                    $i=0; 
                                                    $day_of_week = date('w', $date);
                                                    foreach($aWeek as $week) {
                                                ?> <!-- Aca va el colspan dinamico-->
                                                <td width="80" colspan="1" class="rowOff"><!-- <div class="alldaybg_{CALNO}"> {ALLDAY}  <img src="images/spacer.gif" width="80" height="1 alt=" " /></div>--></td>
                                                <?php 
                                                        $i++;
                                                    }
                                                ?>
                                            </tr>

                                            <?php
                                                $date_ymd = date("Ymd", $date);
                                                for($i = 0, $max = count($aTime); $i < $max; $i += 4) { 
                                                    $time_idx0 = date("Gi",$aTime[$i]);
                                                    $time_idx1 = date("Gi",$aTime[($i+1)]);
                                                    $time_idx2 = date("Gi",$aTime[($i+2)]);
                                                    $time_idx3 = date("Gi",$aTime[($i+3)]);

                                                    if(!(  array_key_exists($date_ymd, $aEvent) AND 
                                                        (array_key_exists($time_idx0, $aEvent[$date_ymd]) OR
                                                        array_key_exists($time_idx1, $aEvent[$date_ymd]) OR
                                                        array_key_exists($time_idx2, $aEvent[$date_ymd]) OR
                                                        array_key_exists($time_idx3, $aEvent[$date_ymd])) 
                                                        )) { 
                                            ?>
                                            <tr>
                                                <td colspan="4" rowspan="4" align="center" valign="top" width="60" class="timeborder"><?php echo date("H:i A",$aTime[$i])?></td>
                                                <td bgcolor="#a1a5a9" width="1" height="15"></td>
                                                <td width="40" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="40" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="40" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="40" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="40" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="40" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="40" colspan="1"  class="weekborder">&nbsp;</td>
                                            </tr>

                                            <tr>
                                                <td bgcolor="#a1a5a9" width="1" height="15"></td><td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#a1a5a9" width="1" height="15"></td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#a1a5a9" width="1" height="15"></td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>
                                            </tr>
                                            <?php 
                                                    } else {
                                                        for($j=0;$j<4;$j++) {
                                                            if($j!=0) { 
                                            ?>
                                            <tr>
                                                <td width="80" colspan="1"  class="weekborder">&nbsp;</td>

                                            <?php           } else {  ?>

                                            <tr>
                                                <td colspan="4" rowspan="4" align="center" valign="top" width="60" class="timeborder"><?php echo date("H:i A",$aTime[$i])?></td><td bgcolor="#a1a5a9" width="1" height="15"></td>
                                                        
                                            <?php           } 
                                                            $var_time_idx = "time_idx".$j;
                                                            if(array_key_exists($$var_time_idx, $aEvent[$date_ymd])) {
                                                                $k=0;
                                                                foreach($aEvent[$date_ymd][$$var_time_idx] as $event) {
                                                                    $k++;
                                                                    $rowspan = ceil(($event['event_length'] / 60 ) / 15); // en el array esta en seg lo divido 60 y obtengo min luego divido 15 min (que es una linea de rowspan y obtengo cantidad de lineas hacia abajo a rellenar
?>
                                                <td width="80" rowspan="<?php echo $rowspan?>" colspan="1" align="left" valign="top" class="eventbg2_1">
                                                    <div class="eventfont">
                                                        <div class="eventbg_1"><b><?php echo date("H:i A", $event['start_unixtime'])?></b></div>
                                                        <div class="padd"><a class="ps" title="<?php echo $event['event_text']?>" href="#" onclick="openEventWindow(0); return false;"><?php echo $event['event_text']?></a>
                                                        </div>
                                                    </div>
                                                </td>
                                        <?php                   }
                                                            } 
                                        ?>

                                            </tr>

                                            <?php
                                                        }
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