<?php
session_start();
require_once('../model/userModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

    if (empty($username) || empty($fullname) || empty($password) || empty($phone)) {
        echo "error"; 
        exit();
    }

    $status = addAuthor($username, $fullname, $password, $phone);

    if ($status) {
        echo "success"; 
    } else {
        echo "error"; 
    }
} else {
    echo "invalid"; 
}
?>