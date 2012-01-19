<?php
use_helper('Misc');
echo select_tag('responsable[sexo]', options_for_select(Sexos(true), $responsable->getSexo()));
?>