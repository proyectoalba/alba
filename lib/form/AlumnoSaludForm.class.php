<?php

/**
 * AlumnoSalud form.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class AlumnoSaludForm extends BaseAlumnoSaludForm
{
  public function configure()
  {
      $this->widgetSchema['fk_alumno_id'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['cobertura_observaciones'] = new sfWidgetFormTextarea();
      $this->widgetSchema->setLabels(array(
        'cobertura_medica' => 'Nombre',
        'cobertura_telefono' => 'Teléfono',
        'cobertura_observaciones' => 'Observaciones',
        'medico_nombre' => 'Nombre',
        'medico_telefono' => 'Teléfono',
        'medico_domicilio' => 'Domicilio',
        
      ));
  }
}
