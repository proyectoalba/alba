<?php

/**
 * BoletinConceptual form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseBoletinConceptualForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'fk_escalanota_id' => new sfWidgetFormPropelChoice(array('model' => 'Escalanota', 'add_empty' => true)),
      'fk_alumno_id'     => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => false)),
      'fk_concepto_id'   => new sfWidgetFormPropelChoice(array('model' => 'Concepto', 'add_empty' => false)),
      'fk_periodo_id'    => new sfWidgetFormPropelChoice(array('model' => 'Periodo', 'add_empty' => false)),
      'observacion'      => new sfWidgetFormTextarea(),
      'fecha'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'BoletinConceptual', 'column' => 'id', 'required' => false)),
      'fk_escalanota_id' => new sfValidatorPropelChoice(array('model' => 'Escalanota', 'column' => 'id', 'required' => false)),
      'fk_alumno_id'     => new sfValidatorPropelChoice(array('model' => 'Alumno', 'column' => 'id')),
      'fk_concepto_id'   => new sfValidatorPropelChoice(array('model' => 'Concepto', 'column' => 'id')),
      'fk_periodo_id'    => new sfValidatorPropelChoice(array('model' => 'Periodo', 'column' => 'id')),
      'observacion'      => new sfValidatorString(array('required' => false)),
      'fecha'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('boletin_conceptual[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BoletinConceptual';
  }


}
