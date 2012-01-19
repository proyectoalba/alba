<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RelUsuarioPreferencia filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseRelUsuarioPreferenciaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_usuario_id'     => new sfWidgetFormFilterInput(),
      'fk_preferencia_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'fk_usuario_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fk_preferencia_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rel_usuario_preferencia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelUsuarioPreferencia';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'fk_usuario_id'     => 'Number',
      'fk_preferencia_id' => 'Number',
    );
  }
}
