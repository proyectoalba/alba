<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * UsuarioPermiso filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseUsuarioPermisoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('usuario_permiso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioPermiso';
  }

  public function getFields()
  {
    return array(
      'fk_usuario_id' => 'ForeignKey',
      'fk_permiso_id' => 'ForeignKey',
    );
  }
}
