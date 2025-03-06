<?php
include("config/dbConfig.php");

header("Content-Type: application/json");

// Read JSON data from request
$inputData = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
    exit;
}

$Id = isset($inputData["id"]) ? filter_var($inputData["id"], FILTER_VALIDATE_INT) : null;

if (!$Id || $Id <= 0) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Invalid Customer ID"]);
    exit;
}

try {
    // Check if customer exists
    $query = "SELECT CUSTOMER_ID FROM customers WHERE CUSTOMER_ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $Id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        echo json_encode(["status" => "error", "message" => "Customer not found"]);
        exit;
    } 

    // Delete customer
    $query = "DELETE FROM customers WHERE CUSTOMER_ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $Id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Customer deleted successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to delete customer"]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}

exit; // 🚀 Ensures no extra output after JSON
