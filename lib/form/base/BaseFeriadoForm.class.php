<?php

/**
 * Feriado form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseFeriadoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'nombre'             => new sfWidgetFormInput(),
      'fecha'              => new sfWidgetFormDateTime(),
      'repeticion_anual'   => new sfWidgetFormInputCheckbox(),
      'inamovible'         => new sfWidgetFormInputCheckbox(),
      'fk_ciclolectivo_id' => new sfWidgetFormPropelChoice(array('model' => 'Ciclolectivo', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'Feriado', 'column' => 'id', 'required' => false)),
      'nombre'             => new sfValidatorString(array('max_length' => 128)),
      'fecha'              => new sfValidatorDateTime(),
      'repeticion_anual'   => new sfValidatorBoolean(array('required' => false)),
      'inamovible'         => new sfValidatorBoolean(array('required' => false)),
      'fk_ciclolectivo_id' => new sfValidatorPropelChoice(array('model' => 'Ciclolectivo', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('feriado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Feriado';
  }


}
