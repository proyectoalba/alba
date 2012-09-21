<?php

/**
 * AlbaConfig form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseAlbaConfigForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'nombre' => new sfWidgetFormInput(),
      'valor'  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorPropelChoice(array('model' => 'AlbaConfig', 'column' => 'id', 'required' => false)),
      'nombre' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'valor'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('alba_config[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AlbaConfig';
  }


}
