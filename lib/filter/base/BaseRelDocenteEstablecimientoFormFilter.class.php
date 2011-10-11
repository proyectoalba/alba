<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RelDocenteEstablecimiento filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseRelDocenteEstablecimientoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => true)),
      'fk_docente_id'         => new sfWidgetFormPropelChoice(array('model' => 'Docente', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Establecimiento', 'column' => 'id')),
      'fk_docente_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Docente', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rel_docente_establecimiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RelDocenteEstablecimiento';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'fk_establecimiento_id' => 'ForeignKey',
      'fk_docente_id'         => 'ForeignKey',
    );
  }
}
