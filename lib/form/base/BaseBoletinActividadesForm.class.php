<?php

/**
 * BoletinActividades form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseBoletinActividadesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'fk_escalanota_id' => new sfWidgetFormPropelChoice(array('model' => 'Escalanota', 'add_empty' => true)),
      'fk_alumno_id'     => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => false)),
      'fk_actividad_id'  => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => false)),
      'fk_periodo_id'    => new sfWidgetFormPropelChoice(array('model' => 'Periodo', 'add_empty' => false)),
      'observacion'      => new sfWidgetFormTextarea(),
      'fecha'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'BoletinActividades', 'column' => 'id', 'required' => false)),
      'fk_escalanota_id' => new sfValidatorPropelChoice(array('model' => 'Escalanota', 'column' => 'id', 'required' => false)),
      'fk_alumno_id'     => new sfValidatorPropelChoice(array('model' => 'Alumno', 'column' => 'id')),
      'fk_actividad_id'  => new sfValidatorPropelChoice(array('model' => 'Actividad', 'column' => 'id')),
      'fk_periodo_id'    => new sfValidatorPropelChoice(array('model' => 'Periodo', 'column' => 'id')),
      'observacion'      => new sfValidatorString(array('required' => false)),
      'fecha'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('boletin_actividades[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BoletinActividades';
  }


}
