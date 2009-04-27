<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Usuario filter form base class.
 *
 * @package    alba
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 15484 2009-02-13 13:13:51Z fabien $
 */
class BaseUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario'               => new sfWidgetFormFilterInput(),
      'clave'                 => new sfWidgetFormFilterInput(),
      'correo_publico'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'activo'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fecha_creado'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_actualizado'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'seguridad_pregunta'    => new sfWidgetFormFilterInput(),
      'seguridad_respuesta'   => new sfWidgetFormFilterInput(),
      'email'                 => new sfWidgetFormFilterInput(),
      'fk_establecimiento_id' => new sfWidgetFormPropelChoice(array('model' => 'Establecimiento', 'add_empty' => true)),
      'borrado'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'usuario'               => new sfValidatorPass(array('required' => false)),
      'clave'                 => new sfValidatorPass(array('required' => false)),
      'correo_publico'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'activo'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fecha_creado'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_actualizado'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'seguridad_pregunta'    => new sfValidatorPass(array('required' => false)),
      'seguridad_respuesta'   => new sfValidatorPass(array('required' => false)),
      'email'                 => new sfValidatorPass(array('required' => false)),
      'fk_establecimiento_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Establecimiento', 'column' => 'id')),
      'borrado'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'usuario'               => 'Text',
      'clave'                 => 'Text',
      'correo_publico'        => 'Boolean',
      'activo'                => 'Boolean',
      'fecha_creado'          => 'Date',
      'fecha_actualizado'     => 'Date',
      'seguridad_pregunta'    => 'Text',
      'seguridad_respuesta'   => 'Text',
      'email'                 => 'Text',
      'fk_establecimiento_id' => 'ForeignKey',
      'borrado'               => 'Boolean',
    );
  }
}
