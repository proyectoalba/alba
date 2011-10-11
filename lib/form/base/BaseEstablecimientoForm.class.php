<?php

/**
 * Establecimiento form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseEstablecimientoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'nombre'                => new sfWidgetFormInput(),
      'descripcion'           => new sfWidgetFormInput(),
      'cuit'                  => new sfWidgetFormInput(),
      'legajoprefijo'         => new sfWidgetFormInput(),
      'legajosiguiente'       => new sfWidgetFormInput(),
      'fk_distritoescolar_id' => new sfWidgetFormPropelChoice(array('model' => 'Distritoescolar', 'add_empty' => false)),
      'fk_organizacion_id'    => new sfWidgetFormPropelChoice(array('model' => 'Organizacion', 'add_empty' => false)),
      'fk_niveltipo_id'       => new sfWidgetFormPropelChoice(array('model' => 'Niveltipo', 'add_empty' => false)),
      'direccion'             => new sfWidgetFormInput(),
      'ciudad'                => new sfWidgetFormInput(),
      'codigo_postal'         => new sfWidgetFormInput(),
      'telefono'              => new sfWidgetFormInput(),
      'fk_provincia_id'       => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => false)),
      'rector'                => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Establecimiento', 'column' => 'id', 'required' => false)),
      'nombre'                => new sfValidatorString(array('max_length' => 128)),
      'descripcion'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cuit'                  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'legajoprefijo'         => new sfValidatorString(array('max_length' => 10)),
      'legajosiguiente'       => new sfValidatorInteger(array('required' => false)),
      'fk_distritoescolar_id' => new sfValidatorPropelChoice(array('model' => 'Distritoescolar', 'column' => 'id')),
      'fk_organizacion_id'    => new sfValidatorPropelChoice(array('model' => 'Organizacion', 'column' => 'id')),
      'fk_niveltipo_id'       => new sfValidatorPropelChoice(array('model' => 'Niveltipo', 'column' => 'id')),
      'direccion'             => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'ciudad'                => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'codigo_postal'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'telefono'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'fk_provincia_id'       => new sfValidatorPropelChoice(array('model' => 'Provincia', 'column' => 'id')),
      'rector'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('establecimiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Establecimiento';
  }


}
