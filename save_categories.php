<?php require_once("./classes/autoload.php");
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
        <div class="leftaside col-md-3">
            <?php
            if(isset($_POST['savedata'])) {
                //Lauku pārbaude
                //$validate->isEmpty($_POST['category_name'], "Lauks kategorijas nosaukums nevar būt tukšs");
                //$validate->isEmpty($_POST['category_short'], "Kategorijas īsais nosaukums nevar būt tukšs");
                //Pārbaude vai ir kļūdas
                //if($validate->getErrorCount() != 0){
               //     $validate->showInputErrors();
               // }
              //  else {
                 $db->insertCategory($_POST['category_name'], $_POST['category_short']);
               // }
           }
            ?>

        </div>
        <div class="main col-md-6">
            <form action="save_categories.php" method="post">
                <div class="form-group">
                    <label for="category_name">Kategorijas vārds:</label>
                    <input type="text" class="form-control" placeholder="Kategorijas nosaukums" name="category_name">
                </div>
                <div class="form-group">
                    <label for="category_name">Kategorijas īsais vārds:</label>
                    <input type="text" class="form-control" placeholder="Kategorijas īsais nosaukums" name="category_short">
                </div>
                <button type="submit" class="btn btn-primary" name="savedata">Saglabāt</button>
            </form>
        </div>
        <div class="leftaside col-md-3"></div>
    </div>


</body>
</html>