<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Anio filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseAnioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => true)),
      'fk_carrera_id'         => new sfWidgetFormPropelChoice(array('model' => 'Carrera', 'add_empty' => true)),
      'descripcion'           => new sfWidgetFormFilterInput(),
      'orden'                 => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Establecimiento', 'column' => 'id')),
      'fk_carrera_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Carrera', 'column' => 'id')),
      'descripcion'           => new sfValidatorPass(array('required' => false)),
      'orden'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('anio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Anio';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'fk_establecimiento_id' => 'ForeignKey',
      'fk_carrera_id'         => 'ForeignKey',
      'descripcion'           => 'Text',
      'orden'                 => 'Number',
    );
  }
}
