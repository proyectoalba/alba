<?php

/**
 * RelAlumnoDivision form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRelAlumnoDivisionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'fk_division_id' => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => false)),
      'fk_alumno_id'   => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'RelAlumnoDivision', 'column' => 'id', 'required' => false)),
      'fk_division_id' => new sfValidatorPropelChoice(array('model' => 'Division', 'column' => 'id')),
      'fk_alumno_id'   => new sfValidatorPropelChoice(array('model' => 'Alumno', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rel_alumno_division[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelAlumnoDivision';
  }


}
