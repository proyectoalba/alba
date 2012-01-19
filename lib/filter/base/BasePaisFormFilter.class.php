<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Pais filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BasePaisFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_largo' => new sfWidgetFormFilterInput(),
      'nombre_corto' => new sfWidgetFormFilterInput(),
      'orden'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_largo' => new sfValidatorPass(array('required' => false)),
      'nombre_corto' => new sfValidatorPass(array('required' => false)),
      'orden'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('pais_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pais';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'nombre_largo' => 'Text',
      'nombre_corto' => 'Text',
      'orden'        => 'Number',
    );
  }
}
