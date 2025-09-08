<?php


function createButton(){
    echo "<form method='POST' action=''>
            <input type='button' name='createDB' value='Adatbázis létrehozása'>
          </form>";
}

function getTask(){
    if (isset($_POST['createDB'])){
        createDB();
    }
}

createButton();

function getConn(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    // Create connection
    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    return $conn;
}


function createDB(){
    $conn = getConn();
    $sql = "CREATE DATABASE IF NOT EXISTS konyvek";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
}

function createTables(){
    $conn = getConn();
}
