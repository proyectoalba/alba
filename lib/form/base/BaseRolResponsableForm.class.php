<?php

/**
 * RolResponsable form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRolResponsableForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInput(),
      'descripcion' => new sfWidgetFormInput(),
      'activo'      => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'RolResponsable', 'column' => 'id', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 128)),
      'descripcion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'activo'      => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('rol_responsable[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RolResponsable';
  }


}
