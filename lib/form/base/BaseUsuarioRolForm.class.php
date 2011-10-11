<?php

/**
 * UsuarioRol form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseUsuarioRolForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_usuario_id' => new sfWidgetFormInputHidden(),
      'fk_rol_id'     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'fk_usuario_id' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'fk_rol_id'     => new sfValidatorPropelChoice(array('model' => 'Rol', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario_rol[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioRol';
  }


}
