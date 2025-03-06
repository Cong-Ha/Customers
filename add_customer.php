<?php
include("config/dbConfig.php");
include("inputValidation.php");

header("Content-Type: application/json");

$store_id = isset($_POST['storeId']) ? $_POST['storeId'] : die("Store ID not found.");
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : die("First Name not found.");
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : die("Last Name not found.");
$email = isset($_POST['email']) ? $_POST['email'] : die("Email not found.");
$address = isset($_POST['address']) ? $_POST['address'] : die("Address not found.");

$fields = [
    "firstName" => $firstName,
    "lastName" => $lastName,
    "email" => $email,
    "address" => $address,
    "storeId" => $store_id
];

// Validate all inputs
$validationErrors = validateInputs($fields, $patterns);


// If there are errors, return them as a JSON response
if (!empty($validationErrors)) {
    echo json_encode(["status" => "error", "errors" => $validationErrors]);
    exit;
}
elseif (empty($validationErrors)) {
    try {
        $conn->beginTransaction();

        $query = "INSERT INTO customers 
        SET FIRST_NAME = :firstName, 
        LAST_NAME = :lastName, 
        EMAIL = :email, 
        ADDRESS = :address,
        STORE_ID = :storeId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':storeId', $store_id);
        $stmt->execute();
        if ($conn->commit()) {
            echo json_encode(["status" => "success", "message" => "Customer added successfully."]);
        }
    
    } catch (PDOException $e) {
        $conn->rollBack();
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}

?>