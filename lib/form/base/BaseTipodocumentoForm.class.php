<?php

/**
 * Tipodocumento form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseTipodocumentoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInput(),
      'descripcion' => new sfWidgetFormInput(),
      'orden'       => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Tipodocumento', 'column' => 'id', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 128)),
      'descripcion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'orden'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipodocumento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tipodocumento';
  }


}
