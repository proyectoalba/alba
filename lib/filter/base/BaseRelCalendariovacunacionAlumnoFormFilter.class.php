<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RelCalendariovacunacionAlumno filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseRelCalendariovacunacionAlumnoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_alumno_id'               => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => true)),
      'fk_calendariovacunacion_id' => new sfWidgetFormPropelChoice(array('model' => 'Calendariovacunacion', 'add_empty' => true)),
      'observacion'                => new sfWidgetFormFilterInput(),
      'comprobante'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fecha'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'fk_alumno_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Alumno', 'column' => 'id')),
      'fk_calendariovacunacion_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Calendariovacunacion', 'column' => 'id')),
      'observacion'                => new sfValidatorPass(array('required' => false)),
      'comprobante'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fecha'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('rel_calendariovacunacion_alumno_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelCalendariovacunacionAlumno';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'fk_alumno_id'               => 'ForeignKey',
      'fk_calendariovacunacion_id' => 'ForeignKey',
      'observacion'                => 'Text',
      'comprobante'                => 'Boolean',
      'fecha'                      => 'Date',
    );
  }
}
