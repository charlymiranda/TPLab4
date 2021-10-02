<?php

namespace Config;

define("ROOT", dirname(__DIR__) . "/");
//Path to your project's root folder
define("FRONT_ROOT", "/UTN/LabIV/Framework/");
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT . VIEWS_PATH . "css/");
define("JS_PATH", FRONT_ROOT . VIEWS_PATH . "js/");

// constants to work with database
define("DB_HOST", "localhost");
define("DB_NAME", "LetsWork");
define("DB_USER", "root");
define("DB_PASS", "");

?>