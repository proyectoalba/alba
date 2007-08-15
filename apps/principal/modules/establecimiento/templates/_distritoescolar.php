<?php
if($establecimiento->getFkDistritoescolarId()) {
    echo $establecimiento->getDistritoescolar()->getNombre();
}
?>