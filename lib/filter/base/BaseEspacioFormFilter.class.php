<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Espacio filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseEspacioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'            => new sfWidgetFormFilterInput(),
      'm2'                => new sfWidgetFormFilterInput(),
      'capacidad'         => new sfWidgetFormFilterInput(),
      'descripcion'       => new sfWidgetFormFilterInput(),
      'estado'            => new sfWidgetFormFilterInput(),
      'fk_tipoespacio_id' => new sfWidgetFormPropelChoice(array('model' => 'Tipoespacio', 'add_empty' => true)),
      'fk_locacion_id'    => new sfWidgetFormPropelChoice(array('model' => 'Locacion', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'            => new sfValidatorPass(array('required' => false)),
      'm2'                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'capacidad'         => new sfValidatorPass(array('required' => false)),
      'descripcion'       => new sfValidatorPass(array('required' => false)),
      'estado'            => new sfValidatorPass(array('required' => false)),
      'fk_tipoespacio_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tipoespacio', 'column' => 'id')),
      'fk_locacion_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Locacion', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('espacio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Espacio';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'nombre'            => 'Text',
      'm2'                => 'Number',
      'capacidad'         => 'Text',
      'descripcion'       => 'Text',
      'estado'            => 'Text',
      'fk_tipoespacio_id' => 'ForeignKey',
      'fk_locacion_id'    => 'ForeignKey',
    );
  }
}
