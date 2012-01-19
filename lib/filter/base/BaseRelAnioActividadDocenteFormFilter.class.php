<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RelAnioActividadDocente filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseRelAnioActividadDocenteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('rel_anio_actividad_docente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelAnioActividadDocente';
  }

  public function getFields()
  {
    return array(
      'fk_anio_actividad_id' => 'ForeignKey',
      'fk_docente_id'        => 'ForeignKey',
    );
  }
}
