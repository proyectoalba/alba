<?php

/**
 * Alumno form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseAlumnoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'legajo_prefijo'        => new sfWidgetFormInput(),
      'legajo_numero'         => new sfWidgetFormInput(),
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
      'procedencia'           => new sfWidgetFormInput(),
      'fk_estadoalumno_id'    => new sfWidgetFormPropelChoice(array('model' => 'Estadosalumnos', 'add_empty' => false)),
      'observacion'           => new sfWidgetFormInput(),
      'email_padre'           => new sfWidgetFormInput(),
      'celular_padre'         => new sfWidgetFormInput(),
      'celular_madre'         => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Alumno', 'column' => 'id', 'required' => false)),
      'legajo_prefijo'        => new sfValidatorString(array('max_length' => 10)),
      'legajo_numero'         => new sfValidatorInteger(),
      'nombre'                => new sfValidatorString(array('max_length' => 128)),
      'apellido_materno'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'apellido'              => new sfValidatorString(array('max_length' => 128)),
      'fecha_nacimiento'      => new sfValidatorDateTime(array('required' => false)),
      'direccion'             => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'ciudad'                => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'codigo_postal'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'fk_provincia_id'       => new sfValidatorPropelChoice(array('model' => 'Provincia', 'column' => 'id')),
      'telefono'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'lugar_nacimiento'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'fk_tipodocumento_id'   => new sfValidatorPropelChoice(array('model' => 'Tipodocumento', 'column' => 'id')),
      'nro_documento'         => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'sexo'                  => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'email'                 => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'distancia_escuela'     => new sfValidatorInteger(array('required' => false)),
      'hermanos_escuela'      => new sfValidatorBoolean(array('required' => false)),
      'hijo_maestro_escuela'  => new sfValidatorBoolean(array('required' => false)),
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('model' => 'Establecimiento', 'column' => 'id')),
      'fk_cuenta_id'          => new sfValidatorPropelChoice(array('model' => 'Cuenta', 'column' => 'id')),
      'certificado_medico'    => new sfValidatorBoolean(array('required' => false)),
      'activo'                => new sfValidatorBoolean(array('required' => false)),
      'fk_conceptobaja_id'    => new sfValidatorPropelChoice(array('model' => 'Conceptobaja', 'column' => 'id', 'required' => false)),
      'fk_pais_id'            => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id')),
      'procedencia'           => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'fk_estadoalumno_id'    => new sfValidatorPropelChoice(array('model' => 'Estadosalumnos', 'column' => 'id')),
      'observacion'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_padre'           => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'celular_padre'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'celular_madre'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
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
