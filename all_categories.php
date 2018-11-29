<?php
require_once("./classes/autoload.php");
Validation_class::showErrors();
session_start();
    if(!isset($_SESSION['email'])){
        header("location:index.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php Template_class::getLibs(); ?>
</head>
<body>
<div class="container-fluid">
    <div class="col-md-12">
        <?php Template_class::getAdminMenu(); ?>
        <b><?php echo $_SESSION['email']; ?></b>
        <form action="all_categories.php"method="post">
            <button type="submit" class="btn btn-primary" name="logout">Atteikšanās</button>
        </form>
        <?php
            if(isset($_POST['logout'])){
                session_destroy();
                header("location:index.php");
            }
        ?>

    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">Visas kategorijas</div>
    </div>
    <div class="row">
        <div class="leftaside col-md-3"></div>
        <div class="main col-md-6">
            <?php
            if(isset($_REQUEST['cID']) == ""){
                $db->selectCategory();
            }
            elseif(isset($_REQUEST['cID']) != "" && isset($_REQUEST['delete']) == ""){
                $db->editCategory($_POST['category_name'],$_POST['short_name'], $_POST['cID']);
                $db->selectCategory();
            }
            else{
                $db->deleteCategory($_POST['cID']);
                $db->selectCategory();
            }
            ?>
        </div>
        <div class="leftaside col-md-3"></div>
    </div>

</body>
</html>