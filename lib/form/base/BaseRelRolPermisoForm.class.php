<?php

/**
 * RelRolPermiso form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseRelRolPermisoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'fk_rol_id'     => new sfWidgetFormPropelChoice(array('model' => 'Rol', 'add_empty' => false)),
      'fk_permiso_id' => new sfWidgetFormPropelChoice(array('model' => 'Permiso', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'RelRolPermiso', 'column' => 'id', 'required' => false)),
      'fk_rol_id'     => new sfValidatorPropelChoice(array('model' => 'Rol', 'column' => 'id')),
      'fk_permiso_id' => new sfValidatorPropelChoice(array('model' => 'Permiso', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rel_rol_permiso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelRolPermiso';
  }


}
