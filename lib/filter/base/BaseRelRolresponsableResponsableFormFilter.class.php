<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RelRolresponsableResponsable filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseRelRolresponsableResponsableFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_rolresponsable_id' => new sfWidgetFormPropelChoice(array('model' => 'RolResponsable', 'add_empty' => true)),
      'fk_responsable_id'    => new sfWidgetFormPropelChoice(array('model' => 'Responsable', 'add_empty' => true)),
      'fk_alumno_id'         => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => true)),
      'descripcion'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'fk_rolresponsable_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RolResponsable', 'column' => 'id')),
      'fk_responsable_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Responsable', 'column' => 'id')),
      'fk_alumno_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Alumno', 'column' => 'id')),
      'descripcion'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rel_rolresponsable_responsable_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelRolresponsableResponsable';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'fk_rolresponsable_id' => 'ForeignKey',
      'fk_responsable_id'    => 'ForeignKey',
      'fk_alumno_id'         => 'ForeignKey',
      'descripcion'          => 'Text',
    );
  }
}
