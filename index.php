<?php
session_start();

require_once('models/Model.php');
require_once('models/VisitedManager.php');
require_once('models/Visited.php');

$visited = new VisitedManager();

$visited->getAll();
$visited->UpdateVisited($_SESSION['visited']);
    
require_once('controllers/Router.php');  

$router = new Router();  

$router->routeReq();

?>
