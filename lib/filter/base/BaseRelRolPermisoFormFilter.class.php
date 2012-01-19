<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RelRolPermiso filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseRelRolPermisoFormFilter extends BaseFormFilterPropel
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

    $this->widgetSchema->setNameFormat('rel_rol_permiso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelRolPermiso';
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
