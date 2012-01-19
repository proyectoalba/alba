<?php

/**
 * NivelInstruccion form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseNivelInstruccionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'NivelInstruccion', 'column' => 'id', 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 60, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('nivel_instruccion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'NivelInstruccion';
  }


}
