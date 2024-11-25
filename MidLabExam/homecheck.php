<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] !== true) {
    header('Location: Login.html');
    exit();
}

$user = $_SESSION['user'];
?>

<html>
<head>
    <title>Home</title>
</head>
<body>
<h1>Welcome, <?php echo $user['name']; ?>!</h1>
    <fieldset style="width: 40%">

    <h2>Your Information:</h2>
    <ul>
        <li>Name: <?php echo $user['name']; ?></li>
        <li>Email: <?php echo $user['email']; ?></li>
        <li>Date of Birth: <?php echo $user['dob']; ?></li>
        <li>Gender: <?php echo $user['gender']; ?></li>
    </ul>

</fieldset>

    <form method="post" action="homecheck.php">
        <button type="submit" name="logout">Logout</button>
       
    </form>

    <?php
    if (isset($_POST['logout'])) {
        unset($_SESSION['status']); 
        unset($_SESSION['user']);

        header('Location: login.html');
        exit();
    }
    ?>
</body>
</html>