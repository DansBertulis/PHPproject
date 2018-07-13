<?php
/**
 * Created by PhpStorm.
 * User: dansb
 * Date: 6/29/2018
 * Time: 11:45
 */
class DB_class
{
    protected $server = "localhost";
    protected $db = "itlat";
    protected $dbuser = "root";
    protected $dbpw = "";

    function __construct()
    {
        $this->con = new mysqli($this->server, $this->dbuser, $this->dbpw, $this->db);
        $this->con->set_charset("utf8");
    }

    function insertCategory($categoryNew, $shortcategoryNew)
    {
        $sql = "INSERT INTO categories(category_name, category_short) VALUES('{$categoryNew}','{$shortcategoryNew}')";
        $rs = $this->con->query($sql);
        echo $sql;
    }

    function selectCategory(){
        $i = 0;
        $sql = "SELECT idcategories, category_name, category_short FROM categories";
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
                    <td><a href='./edit_categories.php?category={$row['idcategories']}'>Labot</a></td>
                    <td>
                      <form action='index.php' method='post'>
                        <input type='hidden' name='cID' value='{$row['idcategories']}'/>
                        <button type='submit' class='btn btn-primary'name='delete'>Dzēst</button>
                      </form>
                    </td>
                </tr>";
        }
    }
    function deleteCategory($idcategories){
        $sql = "DELETE FROM categories WHERE idcategories='{$idcategories}'";
        $rs=$this->con->query($sql);
        echo  $sql;
    }

    function editCategory($categoryValue, $short_name, $idcategories){
        $sql = "UPDATE category set category_name = '{$categoryValue}', category_short = '{$short_name}' WHERE  id='{$idcategories}'";
        $rs=$this->con->query($sql);
        echo  $sql;
        echo "</table>";
    }
function selectCurrentCategory($id){
        $sql = "select id, category name, category short FROM categories WHERE id='{$id}'";
        $rs=$this->con->query($sql);
    while($row = $rs->fetch_assoc()) {
        echo"
            <div class='from group'>
                <label for='category name'> katergorijas vārds</label>
                <input type='text' name='category_name' value='{$row['category_name']}';
                </div>
                <div class='form-group'>
                    <label for='short_name'>isais nosaukums:</label>
                    <input type='text' name='short_name value='{$row['category_short']}
                 </div>
                 <input type='hidden' name='cId' value='{$row['id']}'/>";
                
        
    }
    function editCategory ($categoryValue, $short_name, $categoryID){
        $sql = "UPDATE category set category_name = '{$categoryValue}', short_name ='{$short_name}'
        WHWERE id='{$categoryID}'";
        $rs=$this->con->query($sql);
        echo $sql;
    }
    function deleteCategory($categoryID) {
        $sql= "DELETE FROM category WHERE id= '{$categoryID}'";
        $rs=$this->con->query($sql);
    }
}
    


}
