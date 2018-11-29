<?php
/**
 * Created by PhpStorm.
 * User: Normunds
 * Date: 01/02/18
 * Time: 2:37 PM
 */
class DB_class{
    protected $server = "localhost";
    protected $db = "rvt";
    protected $dbuser = "root";
    protected $dbpw = "";
	
    function __construct() {
        $this->con = new mysqli($this->server,$this->dbuser,$this->dbpw, $this->db);
        $this->con->set_charset("utf8");
    }
	
	//DATU PIEVIENOŠANA
    function insertCategory($categoryNew, $shortcategoryNew){
        $sql = "INSERT INTO categories(category_name, category_short) VALUES('{$categoryNew}','{$shortcategoryNew}')";
        $rs=$this->con->query($sql);
        echo $sql;
    }
	
	//DATU ATLASE
    function selectCategory(){
        $i = 0;
        $sql = "SELECT id, category_name, category_short FROM categories";
        $rs=$this->con->query($sql);
        echo "<table class='table table-hover'>
                <thead>
                    <tr>
                        <th>Nr.</th>
                        <th>Kategorijas nosaukums</th>
                        <th>Kategorijas īsais nosaukums</th>
                        <th colspan='2'>Opcijas</th>
                    </tr>
                </thead>
                ";
        while($row = $rs->fetch_assoc()) {
            $i++;
            echo "<tr>
                    <td>{$i}.</td>
                    <td>{$row["category_name"]}</td>
                    <td> {$row["category_short"]}</td>
                    <td><a href='./edit_categories.php?category={$row['id']}'>Labot</a></td>
                    <td>
                      <form action='all_categories.php' method='post'>
                        <input type='hidden' name='cID' value='{$row['id']}'/>
                        <button type='submit' class='btn btn-primary'name='delete'>Dzēst</button>
                      </form>
                    </td>
                </tr>";
        }
        echo "</table>";
    }
	
	//DATU LABOŠANA - ATRAST KONKRĒTO LABOŠANAS IERAKSTU
    function selectCurrentCategory($id){
        $sql = "SELECT id, category_name, category_short FROM categories WHERE id = {$id}";
        $rs=$this->con->query($sql);
        while($row = $rs->fetch_assoc()) {
            echo "
                <div class='form-group'>
                    <label for='category_name'>Kategorijas vārds:</label>
                    <input type='text' name='category_name' value='{$row['category_name']}'  class='form-control'/>
                </div>
                <div class='form-group'>
                    <label for='short_name'>Īsais nosaukums:</label>
                    <input type='text' name='short_name' value='{$row['category_short']}'  class='form-control'/>
                </div>
                <input type='hidden' name='cID' value='{$row['id']}'/>
            ";
        }
    }
	
	//DATU LABOŠANA - KONKRĒTĀ IERAKSTA LABOŠANA
    function editCategory($categoryValue, $short_name, $categoryID){
        $sql = "UPDATE categories set category_name = '{$categoryValue}', category_short = '{$short_name}' WHERE  id='{$categoryID}'";
        $rs=$this->con->query($sql);
        echo  $sql;
    }
	
	//DATU DZĒŠANA
    function deleteCategory($categoryID){
        $sql = "DELETE FROM categories WHERE id='{$categoryID}'";
        $rs=$this->con->query($sql);
    }
}

?>