<?php

/**
 * Adjunto form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseAdjuntoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'descripcion'    => new sfWidgetFormInput(),
      'titulo'         => new sfWidgetFormInput(),
      'nombre_archivo' => new sfWidgetFormInput(),
      'tipo_archivo'   => new sfWidgetFormInput(),
      'ruta'           => new sfWidgetFormInput(),
      'fecha'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Adjunto', 'column' => 'id', 'required' => false)),
      'descripcion'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'titulo'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_archivo' => new sfValidatorString(array('max_length' => 255)),
      'tipo_archivo'   => new sfValidatorString(array('max_length' => 64)),
      'ruta'           => new sfValidatorString(array('max_length' => 255)),
      'fecha'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('adjunto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Adjunto';
  }


}
