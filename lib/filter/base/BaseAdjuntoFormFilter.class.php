<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Adjunto filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseAdjuntoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion'    => new sfWidgetFormFilterInput(),
      'titulo'         => new sfWidgetFormFilterInput(),
      'nombre_archivo' => new sfWidgetFormFilterInput(),
      'tipo_archivo'   => new sfWidgetFormFilterInput(),
      'ruta'           => new sfWidgetFormFilterInput(),
      'fecha'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'descripcion'    => new sfValidatorPass(array('required' => false)),
      'titulo'         => new sfValidatorPass(array('required' => false)),
      'nombre_archivo' => new sfValidatorPass(array('required' => false)),
      'tipo_archivo'   => new sfValidatorPass(array('required' => false)),
      'ruta'           => new sfValidatorPass(array('required' => false)),
      'fecha'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('adjunto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Adjunto';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'descripcion'    => 'Text',
      'titulo'         => 'Text',
      'nombre_archivo' => 'Text',
      'tipo_archivo'   => 'Text',
      'ruta'           => 'Text',
      'fecha'          => 'Date',
    );
  }
}
