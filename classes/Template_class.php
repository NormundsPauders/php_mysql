<?php
/**
 * Created by PhpStorm.
 * User: Normunds
 * Date: 19/12/17
 * Time: 11:02 AM
 */

class Template_class
{
    var $author = "abc";
    static function getLibs(){
        echo '<meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link href = "./libs/bootstrap-3.3.7/dist/css/bootstrap.css" rel ="stylesheet">
                <link href="./css/main.css" rel="stylesheet">
                <script src="./libs/jQuery/jquery.js"></script>
                <script src="./js/my.js"></script>
                <script src="./libs/bootstrap-3.3.7/dist/js/bootstrap.js"> </script>';

    }


    static function getAdminMenu(){
        echo '        
        <ul>
            <li><a href="./save_categories.php">Kategorijas pievienošana</a></li>
            <li><a href="./all_categories.php">Visas kategorijas</a></li>
        </ul>';

    }

    function getAuthor(){
        $this->author;
    }

}