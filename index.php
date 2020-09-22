<?php

use \Blog\Configuration;

// Contrôleur frontal : instancie un routeur pour traiter la requête entrante
// Utilisation de l'autoloader de composer
require_once 'vendor/autoload.php';

use \Blog\Router;

date_default_timezone_set(Configuration::get("timezone"));
$router = new Router();
$router->routingRequest();
