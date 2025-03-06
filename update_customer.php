<?php
include("config/dbConfig.php");
include("inputValidation.php"); //validation logic

header("Content-Type: application/json");

$customer_id = isset($_POST['customerId']) ? $_POST['customerId'] : die("Customer id not found.");
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : die("First Name not found.");
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : die("Last Name not found.");
$email = isset($_POST['email']) ? $_POST['email'] : die("Email not found.");
$address = isset($_POST['address']) ? $_POST['address'] : die("Address not found.");

$fields = [
    "firstName" => $firstName,
    "lastName" => $lastName,
    "email" => $email,
    "address" => $address,
    "customerId" => $customer_id
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

        $query = "UPDATE customers 
        SET FIRST_NAME = :firstName, 
        LAST_NAME = :lastName, 
        EMAIL = :email, 
        ADDRESS = :address 
        WHERE CUSTOMER_ID = :customerId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':customerId', $customer_id);
        $stmt->execute();
        if ($conn->commit()) {
            echo json_encode(["status" => "success", "message" => "Customer updated successfully."]);
        }
    
    } catch (PDOException $e) {
        $conn->rollBack();
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>