<?php 
    use_helper('Javascript');
    if (!$sf_user->getAttribute('horarios_'.$name)) { 
    } else { 
        $aHorario = $sf_user->getAttribute('horarios_'.$name);
        foreach($aHorario as $horarioMaterias_id => $quantity) { 
            for($i=1;$i<=$quantity;$i++) {
                echo image_tag(sfConfig::get('sf_admin_web_dir').'/images/tick.png', array('class' => 'horarioMaterias-items','id' => $name.'_'.$horarioMaterias_id.'_'.$i, 'style' => 'position:relative'));
                echo draggable_element($name.'_'.$horarioMaterias_id.'_'.$i, array('revert' => true));
            }
        ?><span class="title"><?php echo $horasMaterias[$horarioMaterias_id]->nombre ?></span><?php
        }
    }
?>



