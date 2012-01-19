<?php

/**
 * RelDivisionActividadDocente form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRelDivisionActividadDocenteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'fk_division_id'  => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => true)),
      'fk_actividad_id' => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => false)),
      'fk_docente_id'   => new sfWidgetFormPropelChoice(array('model' => 'Docente', 'add_empty' => true)),
      'fk_evento_id'    => new sfWidgetFormPropelChoice(array('model' => 'Evento', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'RelDivisionActividadDocente', 'column' => 'id', 'required' => false)),
      'fk_division_id'  => new sfValidatorPropelChoice(array('model' => 'Division', 'column' => 'id', 'required' => false)),
      'fk_actividad_id' => new sfValidatorPropelChoice(array('model' => 'Actividad', 'column' => 'id')),
      'fk_docente_id'   => new sfValidatorPropelChoice(array('model' => 'Docente', 'column' => 'id', 'required' => false)),
      'fk_evento_id'    => new sfValidatorPropelChoice(array('model' => 'Evento', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rel_division_actividad_docente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelDivisionActividadDocente';
  }


}
