<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Responsable filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseResponsableFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                  => new sfWidgetFormFilterInput(),
      'apellido'                => new sfWidgetFormFilterInput(),
      'apellido_materno'        => new sfWidgetFormFilterInput(),
      'direccion'               => new sfWidgetFormFilterInput(),
      'direccion_laboral'       => new sfWidgetFormFilterInput(),
      'ciudad'                  => new sfWidgetFormFilterInput(),
      'codigo_postal'           => new sfWidgetFormFilterInput(),
      'fk_provincia_id'         => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => true)),
      'telefono'                => new sfWidgetFormFilterInput(),
      'telefono_laboral'        => new sfWidgetFormFilterInput(),
      'telefono_movil'          => new sfWidgetFormFilterInput(),
      'nro_documento'           => new sfWidgetFormFilterInput(),
      'fk_tipodocumento_id'     => new sfWidgetFormPropelChoice(array('model' => 'Tipodocumento', 'add_empty' => true)),
      'sexo'                    => new sfWidgetFormFilterInput(),
      'email'                   => new sfWidgetFormFilterInput(),
      'observacion'             => new sfWidgetFormFilterInput(),
      'autorizacion_retiro'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'llamar_emergencia'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fk_cuenta_id'            => new sfWidgetFormPropelChoice(array('model' => 'Cuenta', 'add_empty' => true)),
      'fk_rolresponsable_id'    => new sfWidgetFormPropelChoice(array('model' => 'RolResponsable', 'add_empty' => true)),
      'ocupacion'               => new sfWidgetFormFilterInput(),
      'fecha_nacimiento'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'fk_nivel_instruccion_id' => new sfWidgetFormPropelChoice(array('model' => 'NivelInstruccion', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'                  => new sfValidatorPass(array('required' => false)),
      'apellido'                => new sfValidatorPass(array('required' => false)),
      'apellido_materno'        => new sfValidatorPass(array('required' => false)),
      'direccion'               => new sfValidatorPass(array('required' => false)),
      'direccion_laboral'       => new sfValidatorPass(array('required' => false)),
      'ciudad'                  => new sfValidatorPass(array('required' => false)),
      'codigo_postal'           => new sfValidatorPass(array('required' => false)),
      'fk_provincia_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Provincia', 'column' => 'id')),
      'telefono'                => new sfValidatorPass(array('required' => false)),
      'telefono_laboral'        => new sfValidatorPass(array('required' => false)),
      'telefono_movil'          => new sfValidatorPass(array('required' => false)),
      'nro_documento'           => new sfValidatorPass(array('required' => false)),
      'fk_tipodocumento_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tipodocumento', 'column' => 'id')),
      'sexo'                    => new sfValidatorPass(array('required' => false)),
      'email'                   => new sfValidatorPass(array('required' => false)),
      'observacion'             => new sfValidatorPass(array('required' => false)),
      'autorizacion_retiro'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'llamar_emergencia'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fk_cuenta_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cuenta', 'column' => 'id')),
      'fk_rolresponsable_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RolResponsable', 'column' => 'id')),
      'ocupacion'               => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fk_nivel_instruccion_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'NivelInstruccion', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('responsable_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Responsable';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'nombre'                  => 'Text',
      'apellido'                => 'Text',
      'apellido_materno'        => 'Text',
      'direccion'               => 'Text',
      'direccion_laboral'       => 'Text',
      'ciudad'                  => 'Text',
      'codigo_postal'           => 'Text',
      'fk_provincia_id'         => 'ForeignKey',
      'telefono'                => 'Text',
      'telefono_laboral'        => 'Text',
      'telefono_movil'          => 'Text',
      'nro_documento'           => 'Text',
      'fk_tipodocumento_id'     => 'ForeignKey',
      'sexo'                    => 'Text',
      'email'                   => 'Text',
      'observacion'             => 'Text',
      'autorizacion_retiro'     => 'Boolean',
      'llamar_emergencia'       => 'Boolean',
      'fk_cuenta_id'            => 'ForeignKey',
      'fk_rolresponsable_id'    => 'ForeignKey',
      'ocupacion'               => 'Text',
      'fecha_nacimiento'        => 'Date',
      'fk_nivel_instruccion_id' => 'ForeignKey',
    );
  }
}
