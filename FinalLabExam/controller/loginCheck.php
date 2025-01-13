<?php
session_start();
require_once('../model/userModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($username) || empty($password)) {
        echo "invalid"; 
        exit();
    }

    $status = login($username, $password);

    if ($status) {
        setcookie('status', 'true', time() + 3600, '/');
        $_SESSION['username'] = $username;
        echo "success";
    } else {
        echo "invalid"; 
    }
} else {
    echo "error"; 
}
?>