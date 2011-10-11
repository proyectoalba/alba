<?php

/**
 * Pais form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BasePaisForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'nombre_largo' => new sfWidgetFormInput(),
      'nombre_corto' => new sfWidgetFormInput(),
      'orden'        => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id', 'required' => false)),
      'nombre_largo' => new sfValidatorString(array('max_length' => 128)),
      'nombre_corto' => new sfValidatorString(array('max_length' => 32)),
      'orden'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pais[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pais';
  }


}
