<?php

/**
 * Examen form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseExamenForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'fk_escalanota_id' => new sfWidgetFormPropelChoice(array('model' => 'Escalanota', 'add_empty' => false)),
      'fk_alumno_id'     => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => false)),
      'fk_actividad_id'  => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => false)),
      'fk_periodo_id'    => new sfWidgetFormPropelChoice(array('model' => 'Periodo', 'add_empty' => false)),
      'nombre'           => new sfWidgetFormInput(),
      'observacion'      => new sfWidgetFormTextarea(),
      'fecha'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Examen', 'column' => 'id', 'required' => false)),
      'fk_escalanota_id' => new sfValidatorPropelChoice(array('model' => 'Escalanota', 'column' => 'id')),
      'fk_alumno_id'     => new sfValidatorPropelChoice(array('model' => 'Alumno', 'column' => 'id')),
      'fk_actividad_id'  => new sfValidatorPropelChoice(array('model' => 'Actividad', 'column' => 'id')),
      'fk_periodo_id'    => new sfValidatorPropelChoice(array('model' => 'Periodo', 'column' => 'id')),
      'nombre'           => new sfValidatorString(array('max_length' => 255)),
      'observacion'      => new sfValidatorString(array('required' => false)),
      'fecha'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('examen[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Examen';
  }


}
