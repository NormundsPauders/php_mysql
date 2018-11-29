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
    <link rel="stylesheet" href="">
    <?php Template_class::getLibs(); ?>
    <title>Document</title>
    <script>
        $("document").ready(function () {

        });
    </script>
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
        <div class="col-md-12">Kategorijas labošana</div>
    </div>
    <div class="row">
        <div class="leftaside col-md-3"></div>
        <div class="main col-md-6">
             <form action="all_categories.php" method="post">
                <?php $db->selectCurrentCategory($_GET["category"]); ?>
                <button type="submit" class="btn btn-primary" name="savedata">Saglabāt</button>
            </form>
        </div>
        <div class="leftaside col-md-3"></div>
    </div>
</div>
</body>
</html>