<?php
    session_start();
    require_once('../model/userModel.php');
    if(!isset($_COOKIE['status'])){
        header('location: login.html');  
    }

    $authors = getAllAuthors();
?>

<html lang="en">
<head>
    <title>Author list</title>
</head>
<body>
    <h2>Author List</h2>    
    <a href="home.php"> Back </a> | 
    <a href="../controller/logout.php"> logout </a>

    <br>

    <label for="search">Search Authors:</label>
    <input type="text" id="search" name="search" placeholder="Search by username or full name" oninput="searchAuthors()">
    
    <br><br>

    <table id="authorTable" border=1>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>
        <?php 
            foreach ($authors as $author) { 
        ?>
        <tr>
            <td><?php echo $author['id']; ?></td>
            <td><?=$author['username'] ?></td>
            <td><?=$author['fullname'] ?></td>
            <td><?=$author['contact'] ?></td>
            <td>
                <a href="edit.php?id=<?=$author['id']?>"> EDIT </a> |
                <a href="delete.php?id=<?=$author['id']?>"> DELETE </a> 
            </td>  
        </tr>
        <?php } ?>
    </table>
    <script src="../asset/userlist.js"></script>
</body>
</html>