<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Alumno filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseAlumnoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'legajo_prefijo'        => new sfWidgetFormFilterInput(),
      'legajo_numero'         => new sfWidgetFormFilterInput(),
      'nombre'                => new sfWidgetFormFilterInput(),
      'apellido_materno'      => new sfWidgetFormFilterInput(),
      'apellido'              => new sfWidgetFormFilterInput(),
      'fecha_nacimiento'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'direccion'             => new sfWidgetFormFilterInput(),
      'ciudad'                => new sfWidgetFormFilterInput(),
      'codigo_postal'         => new sfWidgetFormFilterInput(),
      'fk_provincia_id'       => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => true)),
      'telefono'              => new sfWidgetFormFilterInput(),
      'lugar_nacimiento'      => new sfWidgetFormFilterInput(),
      'fk_tipodocumento_id'   => new sfWidgetFormPropelChoice(array('model' => 'Tipodocumento', 'add_empty' => true)),
      'nro_documento'         => new sfWidgetFormFilterInput(),
      'sexo'                  => new sfWidgetFormFilterInput(),
      'email'                 => new sfWidgetFormFilterInput(),
      'distancia_escuela'     => new sfWidgetFormFilterInput(),
      'hermanos_escuela'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'hijo_maestro_escuela'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => true)),
      'fk_cuenta_id'          => new sfWidgetFormPropelChoice(array('model' => 'Cuenta', 'add_empty' => true)),
      'certificado_medico'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'activo'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fk_conceptobaja_id'    => new sfWidgetFormPropelChoice(array('model' => 'Conceptobaja', 'add_empty' => true)),
      'fk_pais_id'            => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'procedencia'           => new sfWidgetFormFilterInput(),
      'fk_estadoalumno_id'    => new sfWidgetFormPropelChoice(array('model' => 'Estadosalumnos', 'add_empty' => true)),
      'observacion'           => new sfWidgetFormFilterInput(),
      'email_padre'           => new sfWidgetFormFilterInput(),
      'celular_padre'         => new sfWidgetFormFilterInput(),
      'celular_madre'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'legajo_prefijo'        => new sfValidatorPass(array('required' => false)),
      'legajo_numero'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre'                => new sfValidatorPass(array('required' => false)),
      'apellido_materno'      => new sfValidatorPass(array('required' => false)),
      'apellido'              => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'direccion'             => new sfValidatorPass(array('required' => false)),
      'ciudad'                => new sfValidatorPass(array('required' => false)),
      'codigo_postal'         => new sfValidatorPass(array('required' => false)),
      'fk_provincia_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Provincia', 'column' => 'id')),
      'telefono'              => new sfValidatorPass(array('required' => false)),
      'lugar_nacimiento'      => new sfValidatorPass(array('required' => false)),
      'fk_tipodocumento_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tipodocumento', 'column' => 'id')),
      'nro_documento'         => new sfValidatorPass(array('required' => false)),
      'sexo'                  => new sfValidatorPass(array('required' => false)),
      'email'                 => new sfValidatorPass(array('required' => false)),
      'distancia_escuela'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hermanos_escuela'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'hijo_maestro_escuela'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Establecimiento', 'column' => 'id')),
      'fk_cuenta_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cuenta', 'column' => 'id')),
      'certificado_medico'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'activo'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fk_conceptobaja_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Conceptobaja', 'column' => 'id')),
      'fk_pais_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
      'procedencia'           => new sfValidatorPass(array('required' => false)),
      'fk_estadoalumno_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Estadosalumnos', 'column' => 'id')),
      'observacion'           => new sfValidatorPass(array('required' => false)),
      'email_padre'           => new sfValidatorPass(array('required' => false)),
      'celular_padre'         => new sfValidatorPass(array('required' => false)),
      'celular_madre'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('alumno_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alumno';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'legajo_prefijo'        => 'Text',
      'legajo_numero'         => 'Number',
      'nombre'                => 'Text',
      'apellido_materno'      => 'Text',
      'apellido'              => 'Text',
      'fecha_nacimiento'      => 'Date',
      'direccion'             => 'Text',
      'ciudad'                => 'Text',
      'codigo_postal'         => 'Text',
      'fk_provincia_id'       => 'ForeignKey',
      'telefono'              => 'Text',
      'lugar_nacimiento'      => 'Text',
      'fk_tipodocumento_id'   => 'ForeignKey',
      'nro_documento'         => 'Text',
      'sexo'                  => 'Text',
      'email'                 => 'Text',
      'distancia_escuela'     => 'Number',
      'hermanos_escuela'      => 'Boolean',
      'hijo_maestro_escuela'  => 'Boolean',
      'fk_establecimiento_id' => 'ForeignKey',
      'fk_cuenta_id'          => 'ForeignKey',
      'certificado_medico'    => 'Boolean',
      'activo'                => 'Boolean',
      'fk_conceptobaja_id'    => 'ForeignKey',
      'fk_pais_id'            => 'ForeignKey',
      'procedencia'           => 'Text',
      'fk_estadoalumno_id'    => 'ForeignKey',
      'observacion'           => 'Text',
      'email_padre'           => 'Text',
      'celular_padre'         => 'Text',
      'celular_madre'         => 'Text',
    );
  }
}
