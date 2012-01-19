<?php

/**
 * Distritoescolar form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseDistritoescolarForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'nombre'    => new sfWidgetFormInput(),
      'direccion' => new sfWidgetFormInput(),
      'telefono'  => new sfWidgetFormInput(),
      'ciudad'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'Distritoescolar', 'column' => 'id', 'required' => false)),
      'nombre'    => new sfValidatorString(array('max_length' => 128)),
      'direccion' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'telefono'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'ciudad'    => new sfValidatorString(array('max_length' => 128, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('distritoescolar[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Distritoescolar';
  }


}
