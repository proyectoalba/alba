    <td><?php echo $rel_division_actividad_docente->getDivision() ?></td>
    <td><?php echo $rel_division_actividad_docente->getActividad() ?></td>
    <td><?php echo $rel_division_actividad_docente->getDocente() ?></td>
    <td><?php echo ($rel_division_actividad_docente->getEvento())?$rel_division_actividad_docente->getEvento()->getInfoEnTexto():""; ?></td>
  