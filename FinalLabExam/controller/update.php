<?php
session_start();
require_once('../model/userModel.php');

if (isset($_REQUEST['submit'])) {
    $username = trim($_REQUEST['username']);
    $fullname = trim($_REQUEST['fullname']);
    $password = trim($_REQUEST['password']);
    $phone = trim($_REQUEST['phone']);

    // Check for null or empty values
    if (empty($username) || empty($fullname) || empty($password) || empty($phone)) {
        echo "null error"; // Return an error if any field is empty
    } else {
        // Update the user in the database
        $status = updateUser($_SESSION['update_id'], $username, $fullname, $password, $phone);
        
        if ($status) {
            echo "success"; // Success message
            unset($_SESSION['update_id']);  // Clear session
            exit();
        } else {
            echo "error";  // If update fails
        }
    }
} else {
    echo "submit error"; // If 'submit' is not set
}

?>