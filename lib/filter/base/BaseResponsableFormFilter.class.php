<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Responsable filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseResponsableFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'               => new sfWidgetFormFilterInput(),
      'apellido'             => new sfWidgetFormFilterInput(),
      'apellido_materno'     => new sfWidgetFormFilterInput(),
      'direccion'            => new sfWidgetFormFilterInput(),
      'ciudad'               => new sfWidgetFormFilterInput(),
      'codigo_postal'        => new sfWidgetFormFilterInput(),
      'fk_provincia_id'      => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => true)),
      'telefono'             => new sfWidgetFormFilterInput(),
      'telefono_movil'       => new sfWidgetFormFilterInput(),
      'nro_documento'        => new sfWidgetFormFilterInput(),
      'fk_tipodocumento_id'  => new sfWidgetFormPropelChoice(array('model' => 'Tipodocumento', 'add_empty' => true)),
      'sexo'                 => new sfWidgetFormFilterInput(),
      'email'                => new sfWidgetFormFilterInput(),
      'observacion'          => new sfWidgetFormFilterInput(),
      'autorizacion_retiro'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fk_cuenta_id'         => new sfWidgetFormPropelChoice(array('model' => 'Cuenta', 'add_empty' => true)),
      'fk_rolresponsable_id' => new sfWidgetFormPropelChoice(array('model' => 'RolResponsable', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'               => new sfValidatorPass(array('required' => false)),
      'apellido'             => new sfValidatorPass(array('required' => false)),
      'apellido_materno'     => new sfValidatorPass(array('required' => false)),
      'direccion'            => new sfValidatorPass(array('required' => false)),
      'ciudad'               => new sfValidatorPass(array('required' => false)),
      'codigo_postal'        => new sfValidatorPass(array('required' => false)),
      'fk_provincia_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Provincia', 'column' => 'id')),
      'telefono'             => new sfValidatorPass(array('required' => false)),
      'telefono_movil'       => new sfValidatorPass(array('required' => false)),
      'nro_documento'        => new sfValidatorPass(array('required' => false)),
      'fk_tipodocumento_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tipodocumento', 'column' => 'id')),
      'sexo'                 => new sfValidatorPass(array('required' => false)),
      'email'                => new sfValidatorPass(array('required' => false)),
      'observacion'          => new sfValidatorPass(array('required' => false)),
      'autorizacion_retiro'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fk_cuenta_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cuenta', 'column' => 'id')),
      'fk_rolresponsable_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RolResponsable', 'column' => 'id')),
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
      'id'                   => 'Number',
      'nombre'               => 'Text',
      'apellido'             => 'Text',
      'apellido_materno'     => 'Text',
      'direccion'            => 'Text',
      'ciudad'               => 'Text',
      'codigo_postal'        => 'Text',
      'fk_provincia_id'      => 'ForeignKey',
      'telefono'             => 'Text',
      'telefono_movil'       => 'Text',
      'nro_documento'        => 'Text',
      'fk_tipodocumento_id'  => 'ForeignKey',
      'sexo'                 => 'Text',
      'email'                => 'Text',
      'observacion'          => 'Text',
      'autorizacion_retiro'  => 'Boolean',
      'fk_cuenta_id'         => 'ForeignKey',
      'fk_rolresponsable_id' => 'ForeignKey',
    );
  }
}
