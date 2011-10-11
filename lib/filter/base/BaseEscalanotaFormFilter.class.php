<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Escalanota filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseEscalanotaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => true)),
      'nombre'                => new sfWidgetFormFilterInput(),
      'descripcion'           => new sfWidgetFormFilterInput(),
      'orden'                 => new sfWidgetFormFilterInput(),
      'aprobado'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Establecimiento', 'column' => 'id')),
      'nombre'                => new sfValidatorPass(array('required' => false)),
      'descripcion'           => new sfValidatorPass(array('required' => false)),
      'orden'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'aprobado'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('escalanota_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Escalanota';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'fk_establecimiento_id' => 'ForeignKey',
      'nombre'                => 'Text',
      'descripcion'           => 'Text',
      'orden'                 => 'Number',
      'aprobado'              => 'Boolean',
    );
  }
}
