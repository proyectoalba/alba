<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Establecimiento filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseEstablecimientoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                => new sfWidgetFormFilterInput(),
      'descripcion'           => new sfWidgetFormFilterInput(),
      'cuit'                  => new sfWidgetFormFilterInput(),
      'legajoprefijo'         => new sfWidgetFormFilterInput(),
      'legajosiguiente'       => new sfWidgetFormFilterInput(),
      'fk_distritoescolar_id' => new sfWidgetFormPropelChoice(array('model' => 'Distritoescolar', 'add_empty' => true)),
      'fk_organizacion_id'    => new sfWidgetFormPropelChoice(array('model' => 'Organizacion', 'add_empty' => true)),
      'fk_niveltipo_id'       => new sfWidgetFormPropelChoice(array('model' => 'Niveltipo', 'add_empty' => true)),
      'direccion'             => new sfWidgetFormFilterInput(),
      'ciudad'                => new sfWidgetFormFilterInput(),
      'codigo_postal'         => new sfWidgetFormFilterInput(),
      'telefono'              => new sfWidgetFormFilterInput(),
      'fk_provincia_id'       => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => true)),
      'rector'                => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'                => new sfValidatorPass(array('required' => false)),
      'descripcion'           => new sfValidatorPass(array('required' => false)),
      'cuit'                  => new sfValidatorPass(array('required' => false)),
      'legajoprefijo'         => new sfValidatorPass(array('required' => false)),
      'legajosiguiente'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fk_distritoescolar_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Distritoescolar', 'column' => 'id')),
      'fk_organizacion_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Organizacion', 'column' => 'id')),
      'fk_niveltipo_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Niveltipo', 'column' => 'id')),
      'direccion'             => new sfValidatorPass(array('required' => false)),
      'ciudad'                => new sfValidatorPass(array('required' => false)),
      'codigo_postal'         => new sfValidatorPass(array('required' => false)),
      'telefono'              => new sfValidatorPass(array('required' => false)),
      'fk_provincia_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Provincia', 'column' => 'id')),
      'rector'                => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('establecimiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Establecimiento';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'nombre'                => 'Text',
      'descripcion'           => 'Text',
      'cuit'                  => 'Text',
      'legajoprefijo'         => 'Text',
      'legajosiguiente'       => 'Number',
      'fk_distritoescolar_id' => 'ForeignKey',
      'fk_organizacion_id'    => 'ForeignKey',
      'fk_niveltipo_id'       => 'ForeignKey',
      'direccion'             => 'Text',
      'ciudad'                => 'Text',
      'codigo_postal'         => 'Text',
      'telefono'              => 'Text',
      'fk_provincia_id'       => 'ForeignKey',
      'rector'                => 'Text',
    );
  }
}
