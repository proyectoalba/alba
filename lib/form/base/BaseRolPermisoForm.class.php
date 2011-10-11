<?php

/**
 * RolPermiso form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRolPermisoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'fk_rol_id'     => new sfWidgetFormPropelChoice(array('model' => 'Rol', 'add_empty' => false)),
      'fk_permiso_id' => new sfWidgetFormPropelChoice(array('model' => 'Permiso', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'RolPermiso', 'column' => 'id', 'required' => false)),
      'fk_rol_id'     => new sfValidatorPropelChoice(array('model' => 'Rol', 'column' => 'id')),
      'fk_permiso_id' => new sfValidatorPropelChoice(array('model' => 'Permiso', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rol_permiso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RolPermiso';
  }


}
