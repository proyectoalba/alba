<?php

/**
 * RelCalendariovacunacionAlumno form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRelCalendariovacunacionAlumnoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'fk_alumno_id'               => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => false)),
      'fk_calendariovacunacion_id' => new sfWidgetFormPropelChoice(array('model' => 'Calendariovacunacion', 'add_empty' => false)),
      'observacion'                => new sfWidgetFormInput(),
      'comprobante'                => new sfWidgetFormInputCheckbox(),
      'fecha'                      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'RelCalendariovacunacionAlumno', 'column' => 'id', 'required' => false)),
      'fk_alumno_id'               => new sfValidatorPropelChoice(array('model' => 'Alumno', 'column' => 'id')),
      'fk_calendariovacunacion_id' => new sfValidatorPropelChoice(array('model' => 'Calendariovacunacion', 'column' => 'id')),
      'observacion'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'comprobante'                => new sfValidatorBoolean(),
      'fecha'                      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rel_calendariovacunacion_alumno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelCalendariovacunacionAlumno';
  }


}
