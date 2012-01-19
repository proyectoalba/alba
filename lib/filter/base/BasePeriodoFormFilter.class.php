<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Periodo filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BasePeriodoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_ciclolectivo_id' => new sfWidgetFormPropelChoice(array('model' => 'Ciclolectivo', 'add_empty' => true)),
      'fecha_inicio'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_fin'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'descripcion'        => new sfWidgetFormFilterInput(),
      'calcular'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'formula'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'fk_ciclolectivo_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Ciclolectivo', 'column' => 'id')),
      'fecha_inicio'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_fin'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'descripcion'        => new sfValidatorPass(array('required' => false)),
      'calcular'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'formula'            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('periodo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Periodo';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'fk_ciclolectivo_id' => 'ForeignKey',
      'fecha_inicio'       => 'Date',
      'fecha_fin'          => 'Date',
      'descripcion'        => 'Text',
      'calcular'           => 'Boolean',
      'formula'            => 'Text',
    );
  }
}
