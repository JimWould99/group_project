<?php
require_once('db.php');
require_once('dbutils.php');
//include_once('dbutils.php');

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['name']))
    {
        echo "from POST: ";
        echo "<br>";
        echo $_POST['name'];
    }

///html form to get some response
echo "<form action=" . "theSamePage.php" . "method=" . "post>";
    function makeDeleteButton($name) {
        return "<button type=submit name=$name formmethod=post formaction=dbtestretrievingfileURIs.php>Delete File</button>";
   }
echo "</form>";
/*
//check and then perform action
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
    {
        func();
    }
    function func()
    {
        // do stuff     
    }
?>
*/

$rows = getUserFileURIs("testuser5");
$hardTest = "http://localhost:3000/Documents/uploads/testuser5/dbtesting.php";
print_r($rows);
echo "<table>"; // start a table tag in the HTML
foreach( $rows as $row) {   //Creates a loop to loop through results

echo "<tr><td>" . "<a href=$hardTest download>" .  htmlspecialchars(basename($row)) .  "</a>" . makeDeleteButton($row) . "</td></tr>";  //$row['index'] the index here is a field name
}



?>

