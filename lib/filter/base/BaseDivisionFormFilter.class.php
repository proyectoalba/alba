<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Division filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseDivisionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_anio_id'        => new sfWidgetFormPropelChoice(array('model' => 'Anio', 'add_empty' => true)),
      'descripcion'       => new sfWidgetFormFilterInput(),
      'fk_turno_id'       => new sfWidgetFormPropelChoice(array('model' => 'Turno', 'add_empty' => true)),
      'fk_orientacion_id' => new sfWidgetFormPropelChoice(array('model' => 'Orientacion', 'add_empty' => true)),
      'orden'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'fk_anio_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Anio', 'column' => 'id')),
      'descripcion'       => new sfValidatorPass(array('required' => false)),
      'fk_turno_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Turno', 'column' => 'id')),
      'fk_orientacion_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Orientacion', 'column' => 'id')),
      'orden'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('division_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Division';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'fk_anio_id'        => 'ForeignKey',
      'descripcion'       => 'Text',
      'fk_turno_id'       => 'ForeignKey',
      'fk_orientacion_id' => 'ForeignKey',
      'orden'             => 'Number',
    );
  }
}
