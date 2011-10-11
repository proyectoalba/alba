<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Informe filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseInformeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'            => new sfWidgetFormFilterInput(),
      'descripcion'       => new sfWidgetFormFilterInput(),
      'fk_adjunto_id'     => new sfWidgetFormPropelChoice(array('model' => 'Adjunto', 'add_empty' => true)),
      'fk_tipoinforme_id' => new sfWidgetFormPropelChoice(array('model' => 'Tipoinforme', 'add_empty' => true)),
      'listado'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'variables'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'            => new sfValidatorPass(array('required' => false)),
      'descripcion'       => new sfValidatorPass(array('required' => false)),
      'fk_adjunto_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Adjunto', 'column' => 'id')),
      'fk_tipoinforme_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tipoinforme', 'column' => 'id')),
      'listado'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'variables'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('informe_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Informe';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'nombre'            => 'Text',
      'descripcion'       => 'Text',
      'fk_adjunto_id'     => 'ForeignKey',
      'fk_tipoinforme_id' => 'ForeignKey',
      'listado'           => 'Boolean',
      'variables'         => 'Text',
    );
  }
}
