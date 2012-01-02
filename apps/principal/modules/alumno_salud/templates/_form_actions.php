<ul class="sf_admin_actions">
    <?php echo $helper->linkToList(array('params' =>   array('alumno_id' => $form->getObject()->getFkAlumnoId()),  'class_suffix' => 'list',  'label' => 'Cancel',)) ?>
    <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
</ul>
