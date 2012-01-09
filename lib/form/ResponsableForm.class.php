<?php

/**
 * Responsable form.
 *
 * @package    alba
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ResponsableForm extends BaseResponsableForm
{
  public function configure()
  {
      $this->widgetSchema['fk_nivel_instruccion_id'] = new sfWidgetFormPropelChoice(array('model' => 'NivelInstruccion', 'add_empty' => true));
  }
}
