<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RelUsuarioPermiso filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseRelUsuarioPermisoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_usuario_id' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'fk_permiso_id' => new sfWidgetFormPropelChoice(array('model' => 'Permiso', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fk_usuario_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'fk_permiso_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Permiso', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rel_usuario_permiso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelUsuarioPermiso';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'fk_usuario_id' => 'ForeignKey',
      'fk_permiso_id' => 'ForeignKey',
    );
  }
}
