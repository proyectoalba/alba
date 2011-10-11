<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RelAlumnoDivision filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseRelAlumnoDivisionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_division_id' => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => true)),
      'fk_alumno_id'   => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fk_division_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Division', 'column' => 'id')),
      'fk_alumno_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Alumno', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rel_alumno_division_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelAlumnoDivision';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'fk_division_id' => 'ForeignKey',
      'fk_alumno_id'   => 'ForeignKey',
    );
  }
}
