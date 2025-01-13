<?php
session_start();
require_once('../model/userModel.php');

if (isset($_REQUEST['submit'])) {

    $status = deleteUser($_SESSION['delete_id']);

    if ($status) {
        echo "success"; 
        unset($_SESSION['delete_id']); 
        exit();
    } else {
        echo "error"; 
    }
} else {
    echo "submit error";
}