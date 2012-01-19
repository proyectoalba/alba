<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Docente filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseDocenteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'apellido'                        => new sfWidgetFormFilterInput(),
      'apellido_materno'                => new sfWidgetFormFilterInput(),
      'nombre'                          => new sfWidgetFormFilterInput(),
      'estado_civil'                    => new sfWidgetFormFilterInput(),
      'sexo'                            => new sfWidgetFormFilterInput(),
      'fecha_nacimiento'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fk_tipodocumento_id'             => new sfWidgetFormPropelChoice(array('model' => 'Tipodocumento', 'add_empty' => true)),
      'nro_documento'                   => new sfWidgetFormFilterInput(),
      'lugar_nacimiento'                => new sfWidgetFormFilterInput(),
      'direccion'                       => new sfWidgetFormFilterInput(),
      'ciudad'                          => new sfWidgetFormFilterInput(),
      'codigo_postal'                   => new sfWidgetFormFilterInput(),
      'email'                           => new sfWidgetFormFilterInput(),
      'telefono'                        => new sfWidgetFormFilterInput(),
      'telefono_movil'                  => new sfWidgetFormFilterInput(),
      'titulo'                          => new sfWidgetFormFilterInput(),
      'libreta_sanitaria'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'psicofisico'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'observacion'                     => new sfWidgetFormFilterInput(),
      'activo'                          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fk_provincia_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Provincia', 'add_empty' => true)),
      'fk_pais_id'                      => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'docente_horario_list'            => new sfWidgetFormPropelChoice(array('model' => 'Evento', 'add_empty' => true)),
      'rel_anio_actividad_docente_list' => new sfWidgetFormPropelChoice(array('model' => 'RelAnioActividad', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'apellido'                        => new sfValidatorPass(array('required' => false)),
      'apellido_materno'                => new sfValidatorPass(array('required' => false)),
      'nombre'                          => new sfValidatorPass(array('required' => false)),
      'estado_civil'                    => new sfValidatorPass(array('required' => false)),
      'sexo'                            => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fk_tipodocumento_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tipodocumento', 'column' => 'id')),
      'nro_documento'                   => new sfValidatorPass(array('required' => false)),
      'lugar_nacimiento'                => new sfValidatorPass(array('required' => false)),
      'direccion'                       => new sfValidatorPass(array('required' => false)),
      'ciudad'                          => new sfValidatorPass(array('required' => false)),
      'codigo_postal'                   => new sfValidatorPass(array('required' => false)),
      'email'                           => new sfValidatorPass(array('required' => false)),
      'telefono'                        => new sfValidatorPass(array('required' => false)),
      'telefono_movil'                  => new sfValidatorPass(array('required' => false)),
      'titulo'                          => new sfValidatorPass(array('required' => false)),
      'libreta_sanitaria'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'psicofisico'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'observacion'                     => new sfValidatorPass(array('required' => false)),
      'activo'                          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fk_provincia_id'                 => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Provincia', 'column' => 'id')),
      'fk_pais_id'                      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
      'docente_horario_list'            => new sfValidatorPropelChoice(array('model' => 'Evento', 'required' => false)),
      'rel_anio_actividad_docente_list' => new sfValidatorPropelChoice(array('model' => 'RelAnioActividad', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('docente_filters[%s]');

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

    $criteria->addJoin(DocenteHorarioPeer::FK_DOCENTE_ID, DocentePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(DocenteHorarioPeer::FK_EVENTO_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(DocenteHorarioPeer::FK_EVENTO_ID, $value));
    }

    $criteria->add($criterion);
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

    $criteria->addJoin(RelAnioActividadDocentePeer::FK_DOCENTE_ID, DocentePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(RelAnioActividadDocentePeer::FK_ANIO_ACTIVIDAD_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Docente';
  }

  public function getFields()
  {
    return array(
      'id'                              => 'Number',
      'apellido'                        => 'Text',
      'apellido_materno'                => 'Text',
      'nombre'                          => 'Text',
      'estado_civil'                    => 'Text',
      'sexo'                            => 'Text',
      'fecha_nacimiento'                => 'Date',
      'fk_tipodocumento_id'             => 'ForeignKey',
      'nro_documento'                   => 'Text',
      'lugar_nacimiento'                => 'Text',
      'direccion'                       => 'Text',
      'ciudad'                          => 'Text',
      'codigo_postal'                   => 'Text',
      'email'                           => 'Text',
      'telefono'                        => 'Text',
      'telefono_movil'                  => 'Text',
      'titulo'                          => 'Text',
      'libreta_sanitaria'               => 'Boolean',
      'psicofisico'                     => 'Boolean',
      'observacion'                     => 'Text',
      'activo'                          => 'Boolean',
      'fk_provincia_id'                 => 'ForeignKey',
      'fk_pais_id'                      => 'ForeignKey',
      'docente_horario_list'            => 'ManyKey',
      'rel_anio_actividad_docente_list' => 'ManyKey',
    );
  }
}
