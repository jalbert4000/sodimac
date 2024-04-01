<?php
include("aplication/inc.config.php");

define("NOMBRE_SITIO", $_config['sitio']['nombre']);
define("_url_web_", $_config['sitio']['url']);

define("_css_", $_config["sitio"]["url"] . "aplication/webroot/css/");
define("_js_", $_config["sitio"]["url"] . "aplication/webroot/js/");

define("_img_", $_config['sitio']['url'] . "aplication/webroot/imgs/");

define("_model_",$_config['sitio']['host']."aplication/model/");
define("_view_",$_config['sitio']['host']."aplication/view/");
define("_util_",$_config['sitio']['host']."aplication/utilities/");

define("_logo_", _url_web_ . 'aplication/webroot/imgs/logos/' . $_config['sitio']['logo']);
define("_favicon_", _url_web_ . 'aplication/webroot/imgs/logos/' . $_config['sitio']['favicon']);

define("_includes_", $_config['sitio']['host'] . "aplication/includes/");
define("_templates_", "aplication/templates/");
define("_templates_includes_", "aplication/templates/includes/");

define("_imgs_", _url_web_ . _templates_ . "assets/imgs/");
define("_templates_css_", _url_web_ . _templates_ . "assets/css/");
define("_templates_js_", _url_web_ . _templates_ . "assets/js/");

define("SERVER_CORREO",$_config['admin']['servercorreo']);
define("SERVER_EMAIL_USER",$_config['admin']['serveremail']);
define("SERVER_EMAIL_PASS",$_config['admin']['serveremailpass']);