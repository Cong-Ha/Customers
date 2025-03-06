<?php
function sanitizeInput($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}

function validateInput($data, $patterns) {
    return preg_match($patterns, $data);
}

$patterns = [
    "firstName" => "/^[A-Za-z\s]+$/",
    "lastName" => "/^[A-Za-z\s]+$/",
    "email" => "/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/",
    "address" => "/^[\w\s.,'\\-#&;]{1,100}$/",
    "customerId" => "/^\d+$/", //numeric value only
];

function validateInputs($fields, $patterns) {
    $errors = [];
    foreach ($fields as $field => $value) {
        $sanitaizedValue = sanitizeInput($value);

        if (!validateInput($sanitaizedValue, $patterns[$field])) {
            switch($field) {
                case 'customerId':
                    $errors[$field] = 'Integers only.';
                    break;
                case 'firstName':
                    $errors[$field] = 'Invalid input for First Name.';
                    break;
                case 'lastName':
                    $errors[$field] = 'Invalid input for Last Name.';
                    break;
                case 'email':
                    $errors[$field] = 'Invalid input for Email.';
                    break;
                case 'address':
                    $errors[$field] = 'Invalid input for Address.';
                    break;
                default:
                    $errors[$field] = 'Invalid input.';
            }
        }
    }
    return $errors;
}
?>