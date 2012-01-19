<?php

/**
 * Calendariovacunacion form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseCalendariovacunacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInput(),
      'descripcion' => new sfWidgetFormInput(),
      'periodo'     => new sfWidgetFormInput(),
      'observacion' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Calendariovacunacion', 'column' => 'id', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 128)),
      'descripcion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'periodo'     => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'observacion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('calendariovacunacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Calendariovacunacion';
  }


}
