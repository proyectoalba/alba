<?php 
/**
 *    This file is part of Alba.
 * 
 *    Alba is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 2 of the License, or
 *    (at your option) any later version.
 *
 *    Alba is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with Alba; if not, write to the Free Software
 *    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


/**
 * calendarWeekHelper funciones necesarias para la vista semanal
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */
    function loadCalendar($aDay = array(), $aHour = array() , $aEvent = array() , $aDayNames = array(), $time_interval = 60, $multiple_colors = false , $tableCellWidth = 82, $tableCellHeight = 15) {
        
        if(count($aDay) <= 0) {
            throw new sfException("You must send at least one Day");
        }

        if(count($aHour) != 2) {
            throw new sfException("You must send two Times (start/end)");
        } else {
            if($aHour[0] >= $aHour[1]) {    
                throw new sfException("Start time need to be before End time");
            }
        }

        if($time_interval <= 0 ) {
            throw new sfException("Time interval must be greater than 0 minutes");
        }

        if($tableCellWidth <= 0) {
            throw new sfException("Cell Width must be greater than 0 px");
        }

        if($tableCellHeight <= 0) {
            throw new sfException("Cell height must be greater than 0 px");
        }

        
        $qtyDayNames = count($aDayNames);
        if($qtyDayNames > 0 AND $qtyDayNames != count($aDay)) {
            throw new sfException('If you send $aDayNames must have the same length as $aDay');
        }



        $defaultColor = 'navy';
        if($multiple_colors) {
            // blur gamma as default
            $aColor = array ('#151B8D','#15317E' ,'#342D7E','#2B60DE','#306EFF','#2B65EC','#2554C7','#3BB9FF','#38ACEC','#3574EC','#3090C7','#25587E','#1589FF','#157DEC','#1569C7'
,'#153E7E','#2B547E','#4863A0','#6960EC' );
            $qtyColors = count($aColor);
        }


        //aHour must have two values
        $aHours = array(); 
        for($i = $aHour[0]; $i <= $aHour[1]; $i+=$time_interval*60) {
                $aHours[] =  date("H:i",$i);
        }

?>
<style type="text/css">
.activities {
  position:absolute; 
        z-index:2; 
        border: 1px none #000000;
        cursor: default;
}

.calendarWeekClient{ font-family: Verdana; font-size: 9px; color: #ffffff;}
.weekCalendarHours {font-family: Verdana;font-size: 9px; color: #000000; text-decoration: none; background-color: #C1C084;}
.weekCalendarContent { background-color: #F0F0E2;}
</style>

<script>
function findPos(obj) {
    var curleft = curtop = 0;
    if (obj.offsetParent) {
        curleft = obj.offsetLeft
        curtop = obj.offsetTop
        while (obj = obj.offsetParent) {
            curleft += obj.offsetLeft
            curtop += obj.offsetTop
        }
    }
    
    coors= new Object();
    coors.left=curleft;
    coors.top=curtop;
    return coors;
}


function SetDivs(relTop,relLeft,obj,l,t,w,h,color) {
    var l2 = relLeft+l;
    var t2 = relTop+t;
    obj.style.left=l2+"px";
    obj.style.top=t2+"px";
    obj.style.width=w+"px";
    obj.style.height=h+"px";
    obj.style.visibility = "visible";
    obj.style.backgroundColor = color;
}

</script>
<!--

bgcolor="#D6D6BA"
 -->

<body onLoad="FixEvents()">
<table border="0" cellpadding="1" cellspacing="1" bgcolor="#000000">
  <tr> 
    <td width="<?=$tableCellWidth?>" ></td>
<?php for($i=0; $i < count($aDay);$i++) { ?>
    <td width="<?=$tableCellWidth?>" class="weekCalendarHours"> 
      <div align="center">
<?php
        if($qtyDayNames > 0) {
            echo $aDayNames[$i];
        } else {
            echo date("D , M d",$aDay[$i]);   
        }
?>
      </div>
    </td>
<?php } ?>
  </tr>

<?php for($j = 0; $j < count($aHours);$j++) {
    $color = ($j%2==0)?"#F0F0E2":"#FFFFF9";
 ?>
  <tr> 
    <td align="right" width="<?=$tableCellWidth?>" height="<?=$tableCellHeight?>" class="weekCalendarHours" ><?php echo $aHours[$j]?>&nbsp;</td>
    <?php for($i=0; $i < count($aDay);$i++) { ?>
    <td id="relativePos" class="weekCalendarContent"></td>
    <?php } ?>

  </tr>
<? } ?>

</table>
<?php 
        for($j=0;$j<count($aEvent);$j++) {
            $dayPos = array_search(strtotime($aEvent[$j]->date), $aDay);
            if($dayPos !== false) { 
                list($qtyHour,$qtyHourOffset) = _getMinutes ($aHour[0], $aHour[1], strtotime($aEvent[$j]->start_time), strtotime($aEvent[$j]->end_time));
                list($left,$top,$width,$height) = _getGraphicValues($dayPos, $qtyHour, $qtyHourOffset, $time_interval,$tableCellWidth, $tableCellHeight); 
?>
          <div id="event<?=$aEvent[$j]->id?>" class="activities" style="visibility:hidden;overflow:hidden">
          <div id="eventname<?=$aEvent[$j]->id?>" class="calendarWeekClient"><?=$aEvent[$j]->name?></div></div>
<?php 
            }
        }
?>

<script>
    function FixEvents() {
        var coors = findPos(document.getElementById('relativePos'));

<?php 
    for($j=0;$j<count($aEvent);$j++) {
            if($multiple_colors) {
                $color = $aColor[rand(0,$qtyColors-1)];
            } else { 
                if($aEvent[$j]->color) {
                    $color = $aEvent[$j]->color;
                } else {
                    $color = $defaultColor;
                }
            }

            $dayPos = array_search(strtotime($aEvent[$j]->date), $aDay);
            if($dayPos !== false) {
                list($qtyHour,$qtyHourOffset) = _getMinutes ($aHour[0], $aHour[1], strtotime($aEvent[$j]->start_time), strtotime($aEvent[$j]->end_time));
                list($left,$top,$width,$height) = _getGraphicValues($dayPos, $qtyHour, $qtyHourOffset, $time_interval,$tableCellWidth, $tableCellHeight); 
?>
        SetDivs(coors.top,coors.left,document.getElementById("event<?=$aEvent[$j]->id?>"),<?=$left?>,<?=$top?>,<?=$width?>,<?=$height?>,'<?=$color?>');
    <?php  }
    }?>
    }
</script>
<?php
    } 

    function _getGraphicValues ($daypos, $qtyHour,$qtyHourOffset, $time_interval, $cellWidth, $cellHeight) {
        $startX = $startY = 0;        
        $cellSpace = 1;
        $pixelRatio=$cellHeight/$time_interval;
        $left=$startX+($daypos*$cellWidth)+($daypos*$cellSpace);
        $top=$startY+($qtyHourOffset*$pixelRatio)+($qtyHourOffset/$time_interval);
        $width=$cellWidth;
        $height=($qtyHour*$pixelRatio)+($qtyHour/$time_interval);
        return array($left,$top,$width,$height);
    }

    function _getMinutes ($min,$max,$start_time,$end_time) {
    // returns the qty of the activity minutes and the offset to set the activity on screen
        if ( $start_time>=$max ) {
            return array(0, 0);
        }

        if ( $start_time<$min ) {
                $qtyHourOffset=0;
                $add2=$min;
        }
        else {
                $qtyHourOffset=($start_time-$min)/60;
                $add2=$start_time;
        }
            
        if ( $end_time>$max ) {
            $add=$max;
        } 
        else {
            $add=$end_time;
        }
            
        return array( ($add-$add2)/60, $qtyHourOffset); //minutes, offset in minutes    
    }
?>