<?php

/**
 *    This file is part of Alba.
 * 
 *    Alba is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 2 of the License, or
 *    (at your option) any later version.
 *
 *    Alba is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with Alba; if not, write to the Free Software
 *    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


/**
 * Validador de Horas
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class albaHorasValidator extends sfValidator
{
  /**
   * Execute this validator.
   *
   * @param mixed A file or parameter value/array.
   * @param error An error message reference.
   *
   * @return bool true, if this validator executes successfully, otherwise false.
   */
  public function execute (&$value, &$error)
  {
    
    $value1 = $this->getValidHour($value);
    if (!$value1)
    {
      $error = $this->getParameter('hora_error');
      return false;
    }

    // Is there a compare to do?
    $compareHourParam = $this->getParameter('compare');
    $compareHour = $this->getContext()->getRequest()->getParameter($compareHourParam);

    // If the compare date is given
    if ($compareHour)
    {
      $operator = trim($this->getParameter('operator', '=='), '\'" ');
      $value2 = $this->getValidHour($compareHour);


// print_R($value);
// echo "<br>";
// print_R($value1);
// echo "<br>";echo "<br>";
// print_R($compareHour);
// echo "<br>";
// print_R($value2);
// echo "<br>";echo "<br>";
// die;



      // If the check date is valid, compare it. Otherwise ignore the comparison
      if ($value2)
      {
        $valid = false;
        switch ($operator)
        {
          case '>':
            $valid = $value1 >  $value2;
            break;
          case '>=':
            $valid = $value1 >= $value2;
            break;
          case '==':
            $valid = $value1 == $value2;
            break;          
          case '<=':
            $valid = $value1 <= $value2;
            break;
          case '<':
            $valid = $value1 <  $value2;
            break;

          default:
            throw new sfValidatorException(sprintf('Invalid hora comparison operator "%s"', $operator));
        }

        if (!$valid)
        {
          $error = $this->getParameter('compare_error');
          return false;
        }
      }
    }

    return true;
  }

  /**
   * Converts the given time into a Unix timestamp.
   * 
   * Returns null if the time is invalid.
   * 
   * @param $value    Date to convert.
   * @param $culture  Language culture to use.
   */
  private function getValidHour($value)
  {
    if(strlen($value['minute'])==1) $value['minute'] = "0".$value['minute'];
    $hora = $value['hour'].":".$value['minute']." ".$value['ampm'];
    return strtotime($hora);
  }

  /**
   * Initializes the validator.
   */
  public function initialize($context, $parameters = null)
  {
    // Initialize parent
    parent::initialize($context, $parameters);

    // Set defaults
    $this->getParameterHolder()->set('hora_error', 'Hora Inv&aacute;lida');
    $this->getParameterHolder()->set('compare_error', 'Fall&oacute; la comparacion');
    $this->getParameterHolder()->add($parameters);

    return true;
  }
}
