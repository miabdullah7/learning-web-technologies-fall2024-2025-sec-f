<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    if ($email == null) {
        echo "No Input";
    } else {
        header('location: email.html');
    }
} else {
    header('location: email.html');
}