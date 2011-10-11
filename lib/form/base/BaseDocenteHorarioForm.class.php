<?php

/**
 * DocenteHorario form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseDocenteHorarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_docente_id' => new sfWidgetFormInputHidden(),
      'fk_evento_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'fk_docente_id' => new sfValidatorPropelChoice(array('model' => 'Docente', 'column' => 'id', 'required' => false)),
      'fk_evento_id'  => new sfValidatorPropelChoice(array('model' => 'Evento', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('docente_horario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DocenteHorario';
  }


}
