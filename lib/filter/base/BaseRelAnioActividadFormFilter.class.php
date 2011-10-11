<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RelAnioActividad filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseRelAnioActividadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_anio_id'                      => new sfWidgetFormPropelChoice(array('model' => 'Anio', 'add_empty' => true)),
      'fk_actividad_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => true)),
      'fk_orientacion_id'               => new sfWidgetFormPropelChoice(array('model' => 'Orientacion', 'add_empty' => true)),
      'horas'                           => new sfWidgetFormFilterInput(),
      'rel_anio_actividad_docente_list' => new sfWidgetFormPropelChoice(array('model' => 'Docente', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fk_anio_id'                      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Anio', 'column' => 'id')),
      'fk_actividad_id'                 => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Actividad', 'column' => 'id')),
      'fk_orientacion_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Orientacion', 'column' => 'id')),
      'horas'                           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'rel_anio_actividad_docente_list' => new sfValidatorPropelChoice(array('model' => 'Docente', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rel_anio_actividad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addRelAnioActividadDocenteListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, RelAnioActividadPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(RelAnioActividadDocentePeer::FK_DOCENTE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'RelAnioActividad';
  }

  public function getFields()
  {
    return array(
      'id'                              => 'Number',
      'fk_anio_id'                      => 'ForeignKey',
      'fk_actividad_id'                 => 'ForeignKey',
      'fk_orientacion_id'               => 'ForeignKey',
      'horas'                           => 'Number',
      'rel_anio_actividad_docente_list' => 'ManyKey',
    );
  }
}
