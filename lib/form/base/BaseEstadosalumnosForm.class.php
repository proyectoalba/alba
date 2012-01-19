<?php

/**
 * Estadosalumnos form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseEstadosalumnosForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'nombre' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorPropelChoice(array('model' => 'Estadosalumnos', 'column' => 'id', 'required' => false)),
      'nombre' => new sfValidatorString(array('max_length' => 128)),
    ));

    $this->widgetSchema->setNameFormat('estadosalumnos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estadosalumnos';
  }


}
