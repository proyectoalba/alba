<?php
echo select_tag($nombre, options_for_select(array(''=>'Seleccione')+
               _get_options_from_objects($actividades),
                       isset($id_actividad)?$id_actividad:''),array());
?>
