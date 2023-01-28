<?php

function verifyUsers () {

    if (!isset($_POST['ID']) or !isset($_POST['Password'])) {
        return; 
    }

    $db = new SQLite3('C:\xampp\data\ABCDATABASE.db');
    $stmt = $db->prepare('SELECT ApplicationID, Password FROM users WHERE ApplicationID=:ID AND Password=:Password');
    $stmt->bindParam(':ID', $_POST['ID'], SQLITE3_TEXT);
    $stmt->bindParam(':Password', $_POST['Password'], SQLITE3_TEXT);

    $result = $stmt->execute();

    $rows_array = [];
    while ($row=$result->fetchArray())
    {
        $rows_array[]=$row;
    }
    return $rows_array;
}