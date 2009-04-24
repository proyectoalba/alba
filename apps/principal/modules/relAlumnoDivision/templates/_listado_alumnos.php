<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Form', 'Javascript') ?>
<?php if(count($optionsAlumno) > 0) { ?>

<table cellspacing="0">
    <tr>
<?php 

    $i=0;
    foreach ($optionsAlumno as $alumno)  {
        if ($i>5){
            echo "</tr>";
            $i=0;
            echo "<tr>";
        }   
        $i+=1;
    ?>
    <td>
    <div id="<?php echo "alumno_".$alumno->getId()?>" class="alumno"> <?php echo $alumno->__toString()?><br>
    (<?php echo $alumno->getNroDocumento();?>)
    </div><?php echo draggable_element('alumno_'.$alumno->getId(), array('revert' => true));  ?>
    </td>
    <?php } ?>

    </tr>
</table>

<?php } else { ?>
    No se encontraron coincidencias
<?php } ?>
