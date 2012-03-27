<div id="sf_admin_container">
    <h1>Datos de salud | <?php echo $alumno; ?></h1>
    <div class="data">
        <h3>Cobertura médica / Obra social</h3>
        <p><strong>Nombre:</strong> <?php echo !empty($datos_salud['CoberturaMedica']) ? $datos_salud['CoberturaMedica'] :'---'; ?></p>
        <p><strong>Teléfono:</strong> <?php echo !empty($datos_salud['CoberturaTelefono']) ? $datos_salud['CoberturaTelefono'] :'---'; ?></p>
        <p><strong>Observaciones:</strong> <?php echo !empty($datos_salud['CoberturaObservaciones']) ? $datos_salud['CoberturaObservaciones'] :'---'; ?></p>
        <h3>Médico</h3>
        <p><strong>Nombre:</strong> <?php echo !empty($datos_salud['MedicoNombre']) ? $datos_salud['MedicoNombre'] :'---'; ?></p>
        <p><strong>Domicilio:</strong> <?php echo !empty($datos_salud['MedicoDomicilio']) ? $datos_salud['MedicoDomicilio'] :'---'; ?></p>
        <p><strong>Teléfono:</strong> <?php echo !empty($datos_salud['MedicoTelefono']) ? $datos_salud['MedicoTelefono'] :'---'; ?></p>
    </div>
    
    <ul class="sf_admin_actions">
        <?php echo $helper->linkToEdit($alumno_salud, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Editar',)) ?>
        <li class="sf_admin_action_list"><?php echo link_to('Listado Alumnos', 'alumno/list'); ?></li>            
    </ul>
</div>
