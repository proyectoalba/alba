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
 * instalador
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: instalar.php 4883 2007-07-30 21:41:42Z ftoledo $
 * @filesource
 * @license GPL
 */

function AlbaPath() {
    return realpath(dirname(__FILE__) .DIRECTORY_SEPARATOR. ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR);
}

function DebugLog($str,$modo = 'I') {
    $log = AlbaPath() . DIRECTORY_SEPARATOR . "log" . DIRECTORY_SEPARATOR . "install.log";
    $fp = @fopen($log,"a+");
    if ($fp) {
        fwrite($fp,date('d/m/Y H:i:s') . " $modo: $str\n");
        fclose($fp);
    }
}

function dump2Array($file) { 
    $aSql = array();
    $res_sql = "";
    DebugLog ("dump2Array(): Comprobando si existe el archivo");
    if(file_exists($file)) {
        $sql = file($file);        
        DebugLog("dump2Array(): Leyendo archivo .SQL");
        foreach($sql as $sql_line) {
             $sql_line = trim($sql_line);
            if (($sql_line != "") && (substr($sql_line, 0, 2) != "--") && (substr($sql_line, 0, 1) != "#") ) {
                $res_sql .= $sql_line."\n"; 
            }
        }    
        $aSql= array_slice(explode(";\n", $res_sql),0,-1);
        DebugLog ("dump2Array(): Total de lineas :" . count($aSql));
    }
    else {
        DebugLog ("dump2Array(): El archivo no existe: $file");
        return array();
    }
        
    return $aSql;
}

function executeDump($file, $host, $user, $pass, $db) {
    DebugLog("executeDump(): file: $file");
    DebugLog("executeDump(): user: $user");
    DebugLog("executeDump(): db: $db");
    $aSql = dump2Array($file);
    $error = false;    
    if(count($aSql) > 0 && file_exists($file)) {
        if (mysql_connect($host,$user,$pass)) {
            if(mysql_select_db($db)) {
                DebugLog("executeDump(): ejecutando BEGIN" );    
                mysql_query("BEGIN");
                foreach($aSql as $sql_line) {
                    $res = mysql_query(trim($sql_line));
                    if(!$res) {
                        DebugLog("executeDump(): Fallo SQL: $sql_line");
                        DebugLog("executeDump(): error:". mysql_error());
                        $error = true;
                    }
                }
                if($error == true) {
                    DebugLog("executeDump(): Se encontraron errores ejecutando ROLLBACK y saliendo");    
                    mysql_query("ROLLBACK");
                    return false;
                } else {
                    DebugLog("executeDump(): Sin errores ejecutando COMMIT y saliendo");    
                    mysql_query("COMMIT");
                    return true;
                }
            }
            else {
                DebugLog("executeDump(): Error al seleccionar la base: $db");    
                return false;
            }    

        }
        else {
            DebugLog("excuteDump(): No se puede conectar ala base de datos. " . mysql_error());
        }
    } else {
        DebugLog("executeDump(): No hay instrucciones SQL en el archivo");    
        return false;
    }

}
/**
* genera el archivo de conexion a la base de datos
*/
function generate_databases_yml($host,$user,$pass,$db) {
    $yml = AlbaPath() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "databases.yml";
    DebugLog ("generate_databases_yml(): generando archivo de conexion $yml");
    if ($fp = @fopen ($yml,'w')) {
        fwrite ($fp,"# Archivo generado por el instalador de Alba " . date('m/d/Y H:i:s') . "\n");
        fwrite ($fp,"all:\n");
        fwrite ($fp,"  propel:\n");
        fwrite ($fp,"    class: sfPropelDatabase\n");
        fwrite ($fp,"    param:\n");
        if ($pass != "")
            fwrite ($fp,"      dsn: mysql://$user:$pass@$host/$db\n");
        else
            fwrite ($fp,"      dsn: mysql://$user@$host/$db\n");
        fwrite ($fp,"      datasource: alba\n");
        fwrite ($fp,"      encoding: utf8\n");
        fwrite ($fp, "\n");
        DebugLog("generate_databases_yml(): archivo yml generado");
        return true;
    }
    else {
        DebugLog("generate_databases_yml(): no se puede abrir el archivo. ");
        return false;
    }
    
}

/**
* carga el schema a l abase de datos
*/
function crear_schema ($filesql, $host, $user, $pass, $db) {
    DebugLog ("crear_schema(): Agregando $filesql");
    return executeDump(AlbaPath() . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'sql'  . DIRECTORY_SEPARATOR .$filesql, $host, $user, $pass, $db);

}

/**
* caga los datos ejemplo/minima
*/
function crear_base_modelo($filesql, $host, $user, $pass, $db) {
    DebugLog("crear_base_modelo(): Creado base de datos modelo: $filesql");
    if ($filesql == "")
        return false;
    else
        return executeDump(AlbaPath() . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'sql'  . DIRECTORY_SEPARATOR .$filesql, $host, $user, $pass, $db);
    
}

/**
* helpers para comprobaciones
*/ 
function check_php() {
    DebugLog ("Comprobando version de php");
    return version_compare(phpversion(),'5.0.0','>=');
}
function check_mysql() {
    DebugLog("Comprobando extension de mysql");
    return extension_loaded('mysql');
}
function check_memorylimit() {
    DebugLog("Comprobando limite de moeria de php");
    $limite = ini_get('memory_limit');
    return ($limite >= 32);
}
function check_magicquotes() {
    DebugLog("Comprobando magic_quotes");
    return !get_magic_quotes_gpc();
}
function check_gd() {
    DebugLog("Comprobando extension GD de php");
    return extension_loaded('gd');
}
function check_apache2() {
    DebugLog("Comprobando version de apache");
    if (extension_loaded('apache')) {
	$version = 0;
	preg_match('!Apache/(.*) !U', apache_get_version(), $version);
        return version_compare($version[1],'2.0.0','>=');
    }
    else
        return 0;
}
function check_rewrite() {
    DebugLog("Comprobando mod_rewrite");
    if (extension_loaded('apache')) {
        $modulos = apache_get_modules();
        if(count($modulos)>0) {
            $res = array_search('mod_rewrite', $modulos);
            if($res === false) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
    else
        return false;
}

?>