<?php

/**
 * UsuarioPermiso form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseUsuarioPermisoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_usuario_id' => new sfWidgetFormInputHidden(),
      'fk_permiso_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'fk_usuario_id' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'fk_permiso_id' => new sfValidatorPropelChoice(array('model' => 'Permiso', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario_permiso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioPermiso';
  }


}
