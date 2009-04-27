<?php

/**
 * Alumno form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseAlumnoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'nombre'                => new sfWidgetFormInput(),
      'apellido_materno'      => new sfWidgetFormInput(),
      'apellido'              => new sfWidgetFormInput(),
      'fecha_nacimiento'      => new sfWidgetFormDateTime(),
      'direccion'             => new sfWidgetFormInput(),
      'ciudad'                => new sfWidgetFormInput(),
      'codigo_postal'         => new sfWidgetFormInput(),
      'fk_provincia_id'       => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => false)),
      'telefono'              => new sfWidgetFormInput(),
      'lugar_nacimiento'      => new sfWidgetFormInput(),
      'fk_tipodocumento_id'   => new sfWidgetFormPropelChoice(array('model' => 'Tipodocumento', 'add_empty' => false)),
      'nro_documento'         => new sfWidgetFormInput(),
      'sexo'                  => new sfWidgetFormInput(),
      'email'                 => new sfWidgetFormInput(),
      'distancia_escuela'     => new sfWidgetFormInput(),
      'hermanos_escuela'      => new sfWidgetFormInputCheckbox(),
      'hijo_maestro_escuela'  => new sfWidgetFormInputCheckbox(),
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => false)),
      'fk_cuenta_id'          => new sfWidgetFormPropelChoice(array('model' => 'Cuenta', 'add_empty' => false)),
      'certificado_medico'    => new sfWidgetFormInputCheckbox(),
      'activo'                => new sfWidgetFormInputCheckbox(),
      'fk_conceptobaja_id'    => new sfWidgetFormPropelChoice(array('model' => 'Conceptobaja', 'add_empty' => true)),
      'fk_pais_id'            => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Alumno', 'column' => 'id', 'required' => false)),
      'nombre'                => new sfValidatorString(array('max_length' => 128)),
      'apellido_materno'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'apellido'              => new sfValidatorString(array('max_length' => 128)),
      'fecha_nacimiento'      => new sfValidatorDateTime(),
      'direccion'             => new sfValidatorString(array('max_length' => 128)),
      'ciudad'                => new sfValidatorString(array('max_length' => 128)),
      'codigo_postal'         => new sfValidatorString(array('max_length' => 20)),
      'fk_provincia_id'       => new sfValidatorPropelChoice(array('model' => 'Provincia', 'column' => 'id')),
      'telefono'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'lugar_nacimiento'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'fk_tipodocumento_id'   => new sfValidatorPropelChoice(array('model' => 'Tipodocumento', 'column' => 'id')),
      'nro_documento'         => new sfValidatorString(array('max_length' => 16)),
      'sexo'                  => new sfValidatorString(array('max_length' => 1)),
      'email'                 => new sfValidatorString(array('max_length' => 128)),
      'distancia_escuela'     => new sfValidatorInteger(array('required' => false)),
      'hermanos_escuela'      => new sfValidatorBoolean(),
      'hijo_maestro_escuela'  => new sfValidatorBoolean(),
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('model' => 'Establecimiento', 'column' => 'id')),
      'fk_cuenta_id'          => new sfValidatorPropelChoice(array('model' => 'Cuenta', 'column' => 'id')),
      'certificado_medico'    => new sfValidatorBoolean(),
      'activo'                => new sfValidatorBoolean(),
      'fk_conceptobaja_id'    => new sfValidatorPropelChoice(array('model' => 'Conceptobaja', 'column' => 'id', 'required' => false)),
      'fk_pais_id'            => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('alumno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alumno';
  }


}
