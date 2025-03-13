<?php
define("WEBROOT", "http://mouhamed.sy.ecole221.sn:8005/");
require_once "../orm.php";

$controllers= [
    "clients" =>"../controllers/clients.controller.php",
     "articles" =>"../controllers/articles.controller.php",
     "dettes" =>"../controllers/dettes.controller.php"
];
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    if (array_key_exists($controller, $controllers)) {
        require_once $controllers[$controller];
    } else {
        require_once $controllers["clients"];
    }
} else {
    require_once $controllers["clients"];
}