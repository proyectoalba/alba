<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * AlumnoSalud filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseAlumnoSaludFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_alumno_id'       => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => true)),
      'cobertura_medica'   => new sfWidgetFormFilterInput(),
      'pediatra_apellido'  => new sfWidgetFormFilterInput(),
      'pediatra_nombre'    => new sfWidgetFormFilterInput(),
      'pediatra_domicilio' => new sfWidgetFormFilterInput(),
      'pediatra_telefono'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'fk_alumno_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Alumno', 'column' => 'id')),
      'cobertura_medica'   => new sfValidatorPass(array('required' => false)),
      'pediatra_apellido'  => new sfValidatorPass(array('required' => false)),
      'pediatra_nombre'    => new sfValidatorPass(array('required' => false)),
      'pediatra_domicilio' => new sfValidatorPass(array('required' => false)),
      'pediatra_telefono'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('alumno_salud_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AlumnoSalud';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'fk_alumno_id'       => 'ForeignKey',
      'cobertura_medica'   => 'Text',
      'pediatra_apellido'  => 'Text',
      'pediatra_nombre'    => 'Text',
      'pediatra_domicilio' => 'Text',
      'pediatra_telefono'  => 'Text',
    );
  }
}
