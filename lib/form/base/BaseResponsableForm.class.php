<?php

/**
 * Responsable form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseResponsableForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'nombre'                  => new sfWidgetFormInput(),
      'apellido'                => new sfWidgetFormInput(),
      'apellido_materno'        => new sfWidgetFormInput(),
      'direccion'               => new sfWidgetFormInput(),
      'direccion_laboral'       => new sfWidgetFormInput(),
      'ciudad'                  => new sfWidgetFormInput(),
      'codigo_postal'           => new sfWidgetFormInput(),
      'fk_provincia_id'         => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => false)),
      'telefono'                => new sfWidgetFormInput(),
      'telefono_laboral'        => new sfWidgetFormInput(),
      'telefono_movil'          => new sfWidgetFormInput(),
      'nro_documento'           => new sfWidgetFormInput(),
      'fk_tipodocumento_id'     => new sfWidgetFormPropelChoice(array('model' => 'Tipodocumento', 'add_empty' => false)),
      'sexo'                    => new sfWidgetFormInput(),
      'email'                   => new sfWidgetFormInput(),
      'observacion'             => new sfWidgetFormInput(),
      'autorizacion_retiro'     => new sfWidgetFormInputCheckbox(),
      'llamar_emergencia'       => new sfWidgetFormInputCheckbox(),
      'fk_cuenta_id'            => new sfWidgetFormPropelChoice(array('model' => 'Cuenta', 'add_empty' => false)),
      'fk_rolresponsable_id'    => new sfWidgetFormPropelChoice(array('model' => 'RolResponsable', 'add_empty' => false)),
      'ocupacion'               => new sfWidgetFormInput(),
      'fecha_nacimiento'        => new sfWidgetFormDateTime(),
      'fk_nivel_instruccion_id' => new sfWidgetFormPropelChoice(array('model' => 'NivelInstruccion', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'Responsable', 'column' => 'id', 'required' => false)),
      'nombre'                  => new sfValidatorString(array('max_length' => 128)),
      'apellido'                => new sfValidatorString(array('max_length' => 128)),
      'apellido_materno'        => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'direccion'               => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'direccion_laboral'       => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'ciudad'                  => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'codigo_postal'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'fk_provincia_id'         => new sfValidatorPropelChoice(array('model' => 'Provincia', 'column' => 'id')),
      'telefono'                => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'telefono_laboral'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'telefono_movil'          => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'nro_documento'           => new sfValidatorString(array('max_length' => 20)),
      'fk_tipodocumento_id'     => new sfValidatorPropelChoice(array('model' => 'Tipodocumento', 'column' => 'id')),
      'sexo'                    => new sfValidatorString(array('max_length' => 1)),
      'email'                   => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'observacion'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'autorizacion_retiro'     => new sfValidatorBoolean(),
      'llamar_emergencia'       => new sfValidatorBoolean(),
      'fk_cuenta_id'            => new sfValidatorPropelChoice(array('model' => 'Cuenta', 'column' => 'id')),
      'fk_rolresponsable_id'    => new sfValidatorPropelChoice(array('model' => 'RolResponsable', 'column' => 'id')),
      'ocupacion'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha_nacimiento'        => new sfValidatorDateTime(array('required' => false)),
      'fk_nivel_instruccion_id' => new sfValidatorPropelChoice(array('model' => 'NivelInstruccion', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('responsable[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Responsable';
  }


}
