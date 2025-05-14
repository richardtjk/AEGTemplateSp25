<?php
    //require "dbSecret.php";  add this file only on your server to replace the hard-coded password on line 11

    //Returns a database connection, when you are done with it please call closeDB().
    //Check dbTest.php for an example of how to print queried data
    function getDB() : PDO {

        $servername = "localhost";
        $databasename = "DiveCompetition";
        $username = "diverTestUser";
        $userpassword = "diverTest0!a";

        try {
            $mydb = new PDO("mysql:host=$servername;dbname=$databasename", $username, $userpassword);
            $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $mydb;
        } catch(PDOException $e) {
             echo "Database Connection Error: " . $e->getMessage() . "<br />Please refresh the page, if this error persists conntact an administrator";
        }

   }

    function closeDB(PDO &$pdo) {
        $pdo = null;
    }

?>