<?php
#
# MVC
#
include('protected/classes/controller.php');
include('protected/classes/model.php');
include('protected/classes/view.php');

$controller = new AppController();
$controller->invoke();

$page = $controller->renderView();

print ($page);

?>



