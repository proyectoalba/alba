<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Provincia filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseProvinciaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_corto' => new sfWidgetFormFilterInput(),
      'nombre_largo' => new sfWidgetFormFilterInput(),
      'fk_pais_id'   => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'orden'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_corto' => new sfValidatorPass(array('required' => false)),
      'nombre_largo' => new sfValidatorPass(array('required' => false)),
      'fk_pais_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
      'orden'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('provincia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Provincia';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'nombre_corto' => 'Text',
      'nombre_largo' => 'Text',
      'fk_pais_id'   => 'ForeignKey',
      'orden'        => 'Number',
    );
  }
}
