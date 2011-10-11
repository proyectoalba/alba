<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Turno filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseTurnoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_ciclolectivo_id' => new sfWidgetFormPropelChoice(array('model' => 'Ciclolectivo', 'add_empty' => true)),
      'hora_inicio'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'hora_fin'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'descripcion'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'fk_ciclolectivo_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Ciclolectivo', 'column' => 'id')),
      'hora_inicio'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hora_fin'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'descripcion'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('turno_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Turno';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'fk_ciclolectivo_id' => 'ForeignKey',
      'hora_inicio'        => 'Date',
      'hora_fin'           => 'Date',
      'descripcion'        => 'Text',
    );
  }
}
