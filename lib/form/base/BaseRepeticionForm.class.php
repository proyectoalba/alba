<?php

/**
 * Repeticion form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRepeticionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInput(),
      'orden'       => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Repeticion', 'column' => 'id', 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 255)),
      'orden'       => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('repeticion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Repeticion';
  }


}
