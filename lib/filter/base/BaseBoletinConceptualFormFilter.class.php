<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * BoletinConceptual filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseBoletinConceptualFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_escalanota_id' => new sfWidgetFormPropelChoice(array('model' => 'Escalanota', 'add_empty' => true)),
      'fk_alumno_id'     => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => true)),
      'fk_concepto_id'   => new sfWidgetFormPropelChoice(array('model' => 'Concepto', 'add_empty' => true)),
      'fk_periodo_id'    => new sfWidgetFormPropelChoice(array('model' => 'Periodo', 'add_empty' => true)),
      'observacion'      => new sfWidgetFormFilterInput(),
      'fecha'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'fk_escalanota_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Escalanota', 'column' => 'id')),
      'fk_alumno_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Alumno', 'column' => 'id')),
      'fk_concepto_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Concepto', 'column' => 'id')),
      'fk_periodo_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Periodo', 'column' => 'id')),
      'observacion'      => new sfValidatorPass(array('required' => false)),
      'fecha'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('boletin_conceptual_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BoletinConceptual';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'fk_escalanota_id' => 'ForeignKey',
      'fk_alumno_id'     => 'ForeignKey',
      'fk_concepto_id'   => 'ForeignKey',
      'fk_periodo_id'    => 'ForeignKey',
      'observacion'      => 'Text',
      'fecha'            => 'Date',
    );
  }
}
