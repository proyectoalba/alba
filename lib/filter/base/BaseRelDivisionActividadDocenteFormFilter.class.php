<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RelDivisionActividadDocente filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseRelDivisionActividadDocenteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_division_id'  => new sfWidgetFormPropelChoice(array('model' => 'Division', 'add_empty' => true)),
      'fk_actividad_id' => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => true)),
      'fk_docente_id'   => new sfWidgetFormPropelChoice(array('model' => 'Docente', 'add_empty' => true)),
      'fk_evento_id'    => new sfWidgetFormPropelChoice(array('model' => 'Evento', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fk_division_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Division', 'column' => 'id')),
      'fk_actividad_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Actividad', 'column' => 'id')),
      'fk_docente_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Docente', 'column' => 'id')),
      'fk_evento_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Evento', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rel_division_actividad_docente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelDivisionActividadDocente';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'fk_division_id'  => 'ForeignKey',
      'fk_actividad_id' => 'ForeignKey',
      'fk_docente_id'   => 'ForeignKey',
      'fk_evento_id'    => 'ForeignKey',
    );
  }
}
