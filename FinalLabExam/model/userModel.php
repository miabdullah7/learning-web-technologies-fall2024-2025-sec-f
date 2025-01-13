<?php

    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'shop');
        return $con;
    }

    function login($username, $password){
        $con = getConnection();
        $sql = "SELECT * FROM authors WHERE username='{$username}' AND password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){
            return true;
        } else {
            return false;
        }
    }

    function addAuthor($username, $fullname, $password, $phone){
        $con = getConnection();
        $sql = "INSERT INTO authors VALUES('', '{$username}', '{$fullname}', '{$password}', {$phone}, 'author')";
        if(mysqli_query($con, $sql)){
            return true;
        } else {
            return false;
        }
    }

    function updateUser($id, $username, $fullname, $password, $phone){
        $con = getConnection();
        $sql = "UPDATE authors SET username='$username', fullname='{$fullname}', password='$password', contact=$phone WHERE id='$id'";
        if(mysqli_query($con, $sql)){
            return true;
        } else {
            return false;
        }
    }

    function deleteUser($id){
        $con = getConnection();
        $sql = "DELETE FROM authors WHERE id=$id";
        if(mysqli_query($con, $sql)){
            return true;
        } else {
            return false;
        }
    }

    function getUser($id){
        $con = getConnection();
        $sql = "SELECT * FROM authors WHERE id='{$id}'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function getAllAuthors(){
        $con = getConnection();
        $sql = "SELECT * FROM authors WHERE type='author'";
        $result = mysqli_query($con, $sql);

        $authors = [];

        while($row = mysqli_fetch_assoc($result)){
            array_push($authors, $row);
        }
        
        return $authors;
    }

    function searchAuthors($search = '') {
        $con = getConnection();
    
        if ($search) {
            $search = mysqli_real_escape_string($con, $search); 
            $sql = "SELECT * FROM authors WHERE (username LIKE '%$search%' OR fullname LIKE '%$search%') AND type='author'";
        } else {
            $sql = "SELECT * FROM authors WHERE type='author'";
        }
    
        $result = mysqli_query($con, $sql);
    
        $authors = [];
    
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($authors, $row);
        }
    
        return $authors;
    }
    
?>
