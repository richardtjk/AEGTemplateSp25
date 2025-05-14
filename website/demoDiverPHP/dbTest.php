<?php
    require "dbConnection.php";

    $blank = getDB();

    $res = $blank->query("SELECT FullName FROM Diver;", PDO::FETCH_ASSOC)->fetchAll();

    echo "Help<br />";

    
    echo print_r($res);
 
    foreach($res as $v) {
        echo "<p>";
        echo $v["FullName"];
        echo "</>";
    }

    closeDB($blank);
    
?>