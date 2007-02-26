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
 * menu
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

  //Obtengo el contenido del menu
	use_helper ('Debug');
	function drawMenu($id_parent) {
        global $sf_user;
		echo "<ul>\n";
        $c = new Criteria();
        $c->add(MenuPeer::FK_PADRE_MENU_ID,$id_parent);
        if ($id_parent == 1)
            $c->add(MenuPeer::ID,1,Criteria::NOT_EQUAL); // evitan menu raiz
        $c->addAscendingOrderByColumn(MenuPeer::ORDEN);
        $nodos = MenuPeer::doSelect($c);
        
		foreach($nodos as $nodo) {
            if (sfContext::getInstance()->getUser()->hasCredential($nodo->getPerm()) || $nodo->getPerm() == '') {
    			echo "\t<li>";
                if ($nodo->getNombre() != '-') {
                    echo "<span></span>";
                    if ($nodo->getTarget() == '')
                        echo link_to($nodo->getNombre(),$nodo->getLink()) . "\n";
                    else
                        echo link_to($nodo->getNombre(),$nodo->getLink(),array('target'=> $nodo->getTarget())) . "\n";
                    
    		    	if ($nodo->getLink() =='#')
    				    drawMenu($nodo->getId());
                }
        		echo "</li>\n";
	        }
            else
                debug_message("falta permiso de menu: " . $nodo->getPerm());
		}
		echo "</ul>\n";
	}
?>
<script>                                                                                                         
	var my<?php echo sfConfig::get("app_alba_menutheme")?>Base = "<?echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot() . '/js/jsmenu/themes/' .sfConfig::get("app_alba_menutheme"). '/'?>";
</script>                                                                                                        
<script src="<?echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot() . '/js/jsmenu/themes/'.sfConfig::get("app_alba_menutheme").'/theme.js'?>">
</script>
<div id="menu" align="center">
	<? drawMenu(1); ?>
</div>

<SCRIPT LANGUAGE="JavaScript">                                                                                   
<!--                                                                                                             
cmDrawFromText ('menu', 'hbr', cm<?php echo sfConfig::get("app_alba_menutheme")?>, '<?php echo sfConfig::get("app_alba_menutheme")?>');                                      
-->                                                                                                              
</SCRIPT> 
