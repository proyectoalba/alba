<?php
    use_helper("Object");
?>
<div id="alumnos">
<?php echo label_for('pasaje[fk_alumno_id]', __('Alumnos a pasar:'), 'class="required" ') ?>

<table cellpadding="0" cellspacing="0" width="50%" >
<?php 
foreach($alumnos as $a) {
        echo "<tr>";
        echo "<td style='padding:0px' >".$a."</td>";
        echo "<td style='padding:0px' >".checkbox_tag("pasaje[fk_alumno_id][]",$a->getId())."</td>";
        echo "</tr>";
}
?>
</table>
</div>
