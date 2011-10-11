<?php

/**
 * Espacio form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseEspacioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'nombre'            => new sfWidgetFormInput(),
      'm2'                => new sfWidgetFormInput(),
      'capacidad'         => new sfWidgetFormInput(),
      'descripcion'       => new sfWidgetFormInput(),
      'estado'            => new sfWidgetFormInput(),
      'fk_tipoespacio_id' => new sfWidgetFormPropelChoice(array('model' => 'Tipoespacio', 'add_empty' => true)),
      'fk_locacion_id'    => new sfWidgetFormPropelChoice(array('model' => 'Locacion', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Espacio', 'column' => 'id', 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 128)),
      'm2'                => new sfValidatorNumber(array('required' => false)),
      'capacidad'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'descripcion'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'estado'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fk_tipoespacio_id' => new sfValidatorPropelChoice(array('model' => 'Tipoespacio', 'column' => 'id', 'required' => false)),
      'fk_locacion_id'    => new sfValidatorPropelChoice(array('model' => 'Locacion', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('espacio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Espacio';
  }


}
