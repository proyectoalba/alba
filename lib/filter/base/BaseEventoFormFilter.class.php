<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Evento filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseEventoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'titulo'               => new sfWidgetFormFilterInput(),
      'fecha_inicio'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_fin'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'tipo'                 => new sfWidgetFormFilterInput(),
      'frecuencia'           => new sfWidgetFormFilterInput(),
      'frecuencia_intervalo' => new sfWidgetFormFilterInput(),
      'recurrencia_fin'      => new sfWidgetFormFilterInput(),
      'recurrencia_dias'     => new sfWidgetFormFilterInput(),
      'estado'               => new sfWidgetFormFilterInput(),
      'docente_horario_list' => new sfWidgetFormPropelChoice(array('model' => 'Docente', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'titulo'               => new sfValidatorPass(array('required' => false)),
      'fecha_inicio'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_fin'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'tipo'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'frecuencia'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'frecuencia_intervalo' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'recurrencia_fin'      => new sfValidatorPass(array('required' => false)),
      'recurrencia_dias'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estado'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'docente_horario_list' => new sfValidatorPropelChoice(array('model' => 'Docente', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('evento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addDocenteHorarioListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(DocenteHorarioPeer::FK_EVENTO_ID, EventoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(DocenteHorarioPeer::FK_DOCENTE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(DocenteHorarioPeer::FK_DOCENTE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Evento';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'titulo'               => 'Text',
      'fecha_inicio'         => 'Date',
      'fecha_fin'            => 'Date',
      'tipo'                 => 'Number',
      'frecuencia'           => 'Number',
      'frecuencia_intervalo' => 'Number',
      'recurrencia_fin'      => 'Text',
      'recurrencia_dias'     => 'Number',
      'estado'               => 'Number',
      'docente_horario_list' => 'ManyKey',
    );
  }
}
