<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php if(count($optionsDivision) > 0) { ?>

<table>
    <tr>
<?php 
    $i=0;
    foreach ($optionsDivision as $indice => $contenido)  {
        if ($i>5){
            echo "</tr>";
            $i=0;
            echo "<tr>";
        }   
        $i+=1;
    ?>
    <td>
    <?php echo $contenido;?>
        <div id="division_<?php echo $indice?>" class="cart" style="position:relative;left:20px;"></div>
        <?php echo drop_receiving_element('division_'.$indice, array(
        'url'        => 'relAlumnoDivision/asignarAlumno?division_id='.$indice,
        'accept'     => 'alumno',
       'update'     => 'division_'.$indice,)) ?> 
    </td>
<?php } ?>
    </tr>
</table>

<?php } else { ?>
    No se encontraron coincidencias
<?php } ?>