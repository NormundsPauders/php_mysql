<?php
/**
 * Created by PhpStorm.
 * User: Normunds
 * Date: 01/02/18
 * Time: 2:58 PM
 */

class Validation_class
{
    public $errorMsg = array();
    public $errorCount = 0;

    //Tukša lauka validācija
    function isEmpty($fieldName, $msgText){
        if($fieldName == ""){
            $this->errorCount++;
            array_push($this->errorMsg, $msgText);
        }
    }
    //Nepieciešams parādīt visus kļūda paziņojumus.
    function showInputErrors(){
        $arrlenght = count($this->errorMsg);
        for ($i=0;$i<$arrlenght;$i++){
            echo $this->errorMsg[$i]."<br/>";
        }

    }
    // True vai false
    function getErrorCount(){
        return $this->errorCount;
    }


    static function showErrors(){
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }


}