<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Asistencia filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseAsistenciaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_alumno_id'         => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => true)),
      'fk_tipoasistencia_id' => new sfWidgetFormPropelChoice(array('model' => 'Tipoasistencia', 'add_empty' => true)),
      'fecha'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'fk_alumno_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Alumno', 'column' => 'id')),
      'fk_tipoasistencia_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tipoasistencia', 'column' => 'id')),
      'fecha'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('asistencia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Asistencia';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'fk_alumno_id'         => 'ForeignKey',
      'fk_tipoasistencia_id' => 'ForeignKey',
      'fecha'                => 'Date',
    );
  }
}
