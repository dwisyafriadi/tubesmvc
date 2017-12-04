<?php
if(!isset($_GET['controller']))
  include_once "./controller/controller.php";
else
  include_once "./controller/".$_GET['controller'].".php";
?>
