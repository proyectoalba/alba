<?php

/**
 * RelDocenteEstablecimiento form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRelDocenteEstablecimientoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => false)),
      'fk_docente_id'         => new sfWidgetFormPropelChoice(array('model' => 'Docente', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'RelDocenteEstablecimiento', 'column' => 'id', 'required' => false)),
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('model' => 'Establecimiento', 'column' => 'id')),
      'fk_docente_id'         => new sfValidatorPropelChoice(array('model' => 'Docente', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rel_docente_establecimiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelDocenteEstablecimiento';
  }


}
