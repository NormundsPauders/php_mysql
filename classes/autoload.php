<?php
    require_once("./classes/Main_class.php");
    require_once("./classes/Template_class.php");
    require_once("./classes/DB_class.php");
    require_once("./classes/Validation_class.php");
    $main = new Main_class();
    $template = new Template_class();
    $db = new DB_class();
    $validate = new Validation_class();

    Template_class::getLibs();
   $template->getAuthor();
?>