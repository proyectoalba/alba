<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Feriado filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseFeriadoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'             => new sfWidgetFormFilterInput(),
      'fecha'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'repeticion_anual'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'inamovible'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fk_ciclolectivo_id' => new sfWidgetFormPropelChoice(array('model' => 'Ciclolectivo', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'             => new sfValidatorPass(array('required' => false)),
      'fecha'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'repeticion_anual'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'inamovible'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fk_ciclolectivo_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Ciclolectivo', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('feriado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Feriado';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'nombre'             => 'Text',
      'fecha'              => 'Date',
      'repeticion_anual'   => 'Boolean',
      'inamovible'         => 'Boolean',
      'fk_ciclolectivo_id' => 'ForeignKey',
    );
  }
}
