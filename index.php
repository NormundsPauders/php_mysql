<?php // require_once("./classes/autoload.php");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once("./classes/DB_class.php");
    require_once("./classes/Template_class.php");
    $db = new DB_class();

?>
<!doctype html>
<html lang="en">
<head>
    <?php Template_class::getLibs(); ?>
    <title>Document</title>
    <script>
        $("document").ready(function() {


        });
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="col-md-12">
<!--        --><?php //Template_class::getAdminMenu(); ?>

        <div id="newtext"></div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">

    </div>
    <div class="row">
        <div class="leftaside col-md-3"></div>
        <div class="main col-md-6">
            <form action="index" method="post">
                <div class="form-group">
                    <label for="category_name">E-pasts:</label>
                    <input type="text" class="form-control" placeholder="" name="email">
                </div>
                <div class="form-group">
                    <label for="category_name">Parole</label>
                    <input type="password" class="form-control" placeholder="" name="pwd">
                </div>
                <button type="submit" class="btn btn-primary" name="login">Pieteikšanās</button>
            </form>

        <div class="leftaside col-md-3"></div>
    </div>
    <?php
        if(isset($_POST['login'])) {

            if($_POST['email'] == "user" && $_POST['pwd'] == "123"){
				//atlase no datu bāzes un pārauda vai tāds lietotājs eksistē vai nē
                session_start();
                $_SESSION['email'] = "user";
                header("location:all_categories.php");
            }
            else{
                echo "Epasts vai parole nav pareiza";
            }
        }
        ?>

</div>





</body>
</html>