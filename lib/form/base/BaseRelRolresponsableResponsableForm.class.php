<?php

/**
 * RelRolresponsableResponsable form base class.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 */
class BaseRelRolresponsableResponsableForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'fk_rolresponsable_id' => new sfWidgetFormPropelChoice(array('model' => 'RolResponsable', 'add_empty' => false)),
      'fk_responsable_id'    => new sfWidgetFormPropelChoice(array('model' => 'Responsable', 'add_empty' => false)),
      'fk_alumno_id'         => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => false)),
      'descripcion'          => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'RelRolresponsableResponsable', 'column' => 'id', 'required' => false)),
      'fk_rolresponsable_id' => new sfValidatorPropelChoice(array('model' => 'RolResponsable', 'column' => 'id')),
      'fk_responsable_id'    => new sfValidatorPropelChoice(array('model' => 'Responsable', 'column' => 'id')),
      'fk_alumno_id'         => new sfValidatorPropelChoice(array('model' => 'Alumno', 'column' => 'id')),
      'descripcion'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rel_rolresponsable_responsable[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelRolresponsableResponsable';
  }


}
