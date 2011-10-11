<?php

/**
 * Division form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseDivisionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'fk_anio_id'        => new sfWidgetFormPropelChoice(array('model' => 'Anio', 'add_empty' => false)),
      'descripcion'       => new sfWidgetFormInput(),
      'fk_turno_id'       => new sfWidgetFormPropelChoice(array('model' => 'Turno', 'add_empty' => false)),
      'fk_orientacion_id' => new sfWidgetFormPropelChoice(array('model' => 'Orientacion', 'add_empty' => true)),
      'orden'             => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Division', 'column' => 'id', 'required' => false)),
      'fk_anio_id'        => new sfValidatorPropelChoice(array('model' => 'Anio', 'column' => 'id')),
      'descripcion'       => new sfValidatorString(array('max_length' => 255)),
      'fk_turno_id'       => new sfValidatorPropelChoice(array('model' => 'Turno', 'column' => 'id')),
      'fk_orientacion_id' => new sfValidatorPropelChoice(array('model' => 'Orientacion', 'column' => 'id', 'required' => false)),
      'orden'             => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('division[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Division';
  }


}
