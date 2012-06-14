<?php

/**
 * AlumnoSalud form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseAlumnoSaludForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'fk_alumno_id'            => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => false)),
      'cobertura_medica'        => new sfWidgetFormInput(),
      'cobertura_telefono'      => new sfWidgetFormInput(),
      'cobertura_observaciones' => new sfWidgetFormInput(),
      'medico_nombre'           => new sfWidgetFormInput(),
      'medico_domicilio'        => new sfWidgetFormInput(),
      'medico_telefono'         => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'AlumnoSalud', 'column' => 'id', 'required' => false)),
      'fk_alumno_id'            => new sfValidatorPropelChoice(array('model' => 'Alumno', 'column' => 'id')),
      'cobertura_medica'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cobertura_telefono'      => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'cobertura_observaciones' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'medico_nombre'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'medico_domicilio'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'medico_telefono'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('alumno_salud[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AlumnoSalud';
  }


}
