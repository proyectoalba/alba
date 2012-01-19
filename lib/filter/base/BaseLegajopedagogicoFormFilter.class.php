<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Legajopedagogico filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 */
class BaseLegajopedagogicoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fk_alumno_id'          => new sfWidgetFormPropelChoice(array('model' => 'Alumno', 'add_empty' => true)),
      'titulo'                => new sfWidgetFormFilterInput(),
      'resumen'               => new sfWidgetFormFilterInput(),
      'texto'                 => new sfWidgetFormFilterInput(),
      'fecha'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fk_usuario_id'         => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'fk_legajocategoria_id' => new sfWidgetFormPropelChoice(array('model' => 'Legajocategoria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'fk_alumno_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Alumno', 'column' => 'id')),
      'titulo'                => new sfValidatorPass(array('required' => false)),
      'resumen'               => new sfValidatorPass(array('required' => false)),
      'texto'                 => new sfValidatorPass(array('required' => false)),
      'fecha'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fk_usuario_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'fk_legajocategoria_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Legajocategoria', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('legajopedagogico_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Legajopedagogico';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'fk_alumno_id'          => 'ForeignKey',
      'titulo'                => 'Text',
      'resumen'               => 'Text',
      'texto'                 => 'Text',
      'fecha'                 => 'Date',
      'fk_usuario_id'         => 'ForeignKey',
      'fk_legajocategoria_id' => 'ForeignKey',
    );
  }
}
