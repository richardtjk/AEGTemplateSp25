<?php
    require "dbConnection.php";

    header('Content-Type: application/json');
    $postData = file_get_contents('php://input');

    $data = json_decode($postData, true);

    $diverName = $data['diverName'];


    try {
        $conn = getDB();
        $stmt = $conn->prepare("SELECT DiverID FROM Diver WHERE FullName = :diverName;");
        $stmt->bindParam(':diverName', $diverName, PDO::PARAM_STR, strlen($diverName));

        $stmt->execute();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        closeDB($conn);

        if (count($res) > 0) {
            echo json_encode($res);
        } else {
            echo json_encode([]);
        }

    } catch(PDOException $e) {
        //add error handling
        //passes the error message to the javascript
        http_response_code(500);
        echo json_encode(['phpError' => $e->getMessage()]);

    }
    
?>