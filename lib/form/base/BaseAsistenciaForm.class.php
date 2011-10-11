<?php

/**
 * Asistencia form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseAsistenciaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'fk_alumno_id'         => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => false)),
      'fk_tipoasistencia_id' => new sfWidgetFormPropelChoice(array('model' => 'Tipoasistencia', 'add_empty' => false)),
      'fecha'                => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Asistencia', 'column' => 'id', 'required' => false)),
      'fk_alumno_id'         => new sfValidatorPropelChoice(array('model' => 'Alumno', 'column' => 'id')),
      'fk_tipoasistencia_id' => new sfValidatorPropelChoice(array('model' => 'Tipoasistencia', 'column' => 'id')),
      'fecha'                => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('asistencia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Asistencia';
  }


}
