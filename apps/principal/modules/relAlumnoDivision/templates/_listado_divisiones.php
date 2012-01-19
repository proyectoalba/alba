<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Form', 'Javascript') ?>
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
        <div id="division_<?php echo $indice?>" class="cart" style="position:relative;left:20px;">

<?php 
    if (array_key_exists($indice, $alumnoDivision)) {
        include_partial('relAlumnoDivision/listado_alumnos_division', array('alumnos' => $alumnoDivision[$indice]));
    }
?>

        </div>
        <?php echo drop_receiving_element('division_'.$indice, array(
        'url'        => 'relAlumnoDivision/asignarAlumno?division_id='.$indice,
        'accept'     => 'alumno',
        'script'     => true,
        'update'     => 'division_'.$indice,
        'method'     => 'get')) ?> 
    </td>
<?php } ?>
    </tr>
</table>

<?php } else { ?>
    No se encontraron coincidencias
<?php } ?>
