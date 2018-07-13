<?php
require_once ("./classes/Template_class.php");
require_once ("./classes/Main_class.php");
require_once ("./classes/dbclass.php");
Main_class::showError();
$main = new Main_class();
$db = new DB_class();
    session_start();


?>
<!doctype html>
<html lang="en">
<head>
    <?php Template_class::getLibs();?>


</head>
<body>
<?php
    echo $_SESSION ['user'];
    echo "<form action ='main.php'";
?>
    <form action="index.php" method="post">
    <input type="text" name="category_name"/>
    <input type="text" name="category_short"/>
    <input type="submit" name="save" value="save"/>

</form>
<p>
        <?php
        if (isset($_POST['save'])){
         // echo $_POST['categoty_name'] ."<br/>";
          //echo $_POST['categoty_short'] ."<br/>";
          $db->insertCategory($_POST['category_name'], $_POST['category_short']);
        }

        $db->selectCategory();

        if (isset($_POST['delete'])) {
            $db->deleteCategory($_POST['cID']);
        }
    ?>
</p>
</body>
</html>