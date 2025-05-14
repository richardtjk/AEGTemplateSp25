<?php

try {
  echo "in diver add php";
#  if(isset($_POST['diverName']) {

    $newDiverName = $_POST['diverName'];

  #  $newDiverName = "testing more";
    echo $newDiverName;

    require "dbConnection.php";

    $conn = getDB();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO Diver (FullName) VALUES ( :diverName );");
    $stmt->bindParam(':diverName', $newDiverName, PDO::PARAM_STR, strlen($newDiverName));

    $stmt->execute();

#  }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

#redirect back to diver.html
header('Location: diver.html');


?>
