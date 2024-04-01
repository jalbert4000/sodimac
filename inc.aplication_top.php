<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once("inc.core.php");

require_once(_model_."Conexion.php");
require_once(_model_."Mysql.php"); 
require_once(_model_."Configuration.php");
require_once(_model_."Proveedores.php"); 
require_once(_util_."Libs.php");
require_once(_util_."Mail.php");
require_once(_view_."Secciones.php");

$proveedores = new Proveedores();

$link = new Conexion($_config['bd']['server'],$_config['bd']['user'],$_config['bd']['password'],$_config['bd']['name']);		
session_start();

?>