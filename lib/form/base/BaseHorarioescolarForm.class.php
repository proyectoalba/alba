<?php

/**
 * Horarioescolar form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseHorarioescolarForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'nombre'                   => new sfWidgetFormInput(),
      'descripcion'              => new sfWidgetFormInput(),
      'fk_evento_id'             => new sfWidgetFormPropelChoice(array('model' => 'Evento', 'add_empty' => true)),
      'fk_establecimiento_id'    => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => false)),
      'fk_turno_id'              => new sfWidgetFormPropelChoice(array('model' => 'Turno', 'add_empty' => false)),
      'fk_horarioescolartipo_id' => new sfWidgetFormPropelChoice(array('model' => 'Horarioescolartipo', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'Horarioescolar', 'column' => 'id', 'required' => false)),
      'nombre'                   => new sfValidatorString(array('max_length' => 128)),
      'descripcion'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fk_evento_id'             => new sfValidatorPropelChoice(array('model' => 'Evento', 'column' => 'id', 'required' => false)),
      'fk_establecimiento_id'    => new sfValidatorPropelChoice(array('model' => 'Establecimiento', 'column' => 'id')),
      'fk_turno_id'              => new sfValidatorPropelChoice(array('model' => 'Turno', 'column' => 'id')),
      'fk_horarioescolartipo_id' => new sfValidatorPropelChoice(array('model' => 'Horarioescolartipo', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('horarioescolar[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Horarioescolar';
  }


}
