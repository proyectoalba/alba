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
 * albaView ExtensiÃ³n personalizada de la vista 
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */


class albaView extends sfPHPView
{
 public function configure()
  {
    parent::configure();
 
    // Grab the theme from the user (of from anywhere else)
    $theme = $this->getContext()->getUser()->getTheme();
    // If there is a theme and if the theme feature is enabled
    if($theme && sfConfig::get('app_theme'))
    {
      // Look for templates in a $theme/ subdirectory of the usual template location
      if (is_readable($this->getDirectory().'/'.$theme.'/'.$this->getTemplate()))
      {
        $this->setDirectory($this->getDirectory().'/'.$theme);
      }
 
      // Look for a layout in a $theme/ subdirectory of the usual layout location
      if (is_readable($this->getDecoratorDirectory().'/'.$theme.'/'.$this->getDecoratorTemplate()))
      {
        $this->setDecoratorDirectory($this->getDecoratorDirectory().'/'.$theme);
      }
    }
  }

}

?>
