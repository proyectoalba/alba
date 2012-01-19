<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RolPermiso filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseRolPermisoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_rol_id'     => new sfWidgetFormPropelChoice(array('model' => 'Rol', 'add_empty' => true)),
      'fk_permiso_id' => new sfWidgetFormPropelChoice(array('model' => 'Permiso', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fk_rol_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Rol', 'column' => 'id')),
      'fk_permiso_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Permiso', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rol_permiso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RolPermiso';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'fk_rol_id'     => 'ForeignKey',
      'fk_permiso_id' => 'ForeignKey',
    );
  }
}
