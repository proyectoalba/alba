<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Horarioescolar filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseHorarioescolarFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                   => new sfWidgetFormFilterInput(),
      'descripcion'              => new sfWidgetFormFilterInput(),
      'fk_evento_id'             => new sfWidgetFormPropelChoice(array('model' => 'Evento', 'add_empty' => true)),
      'fk_establecimiento_id'    => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => true)),
      'fk_turno_id'              => new sfWidgetFormPropelChoice(array('model' => 'Turno', 'add_empty' => true)),
      'fk_horarioescolartipo_id' => new sfWidgetFormPropelChoice(array('model' => 'Horarioescolartipo', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'                   => new sfValidatorPass(array('required' => false)),
      'descripcion'              => new sfValidatorPass(array('required' => false)),
      'fk_evento_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Evento', 'column' => 'id')),
      'fk_establecimiento_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Establecimiento', 'column' => 'id')),
      'fk_turno_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Turno', 'column' => 'id')),
      'fk_horarioescolartipo_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Horarioescolartipo', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('horarioescolar_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Horarioescolar';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'nombre'                   => 'Text',
      'descripcion'              => 'Text',
      'fk_evento_id'             => 'ForeignKey',
      'fk_establecimiento_id'    => 'ForeignKey',
      'fk_turno_id'              => 'ForeignKey',
      'fk_horarioescolartipo_id' => 'ForeignKey',
    );
  }
}
