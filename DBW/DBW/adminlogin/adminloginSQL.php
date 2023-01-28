<?php

function verifyUsers () {

    if (!isset($_POST['Uname']) or !isset($_POST['Password'])) {
        return; 
    }

    $db = new SQLite3('C:\xampp\data\ABCDATABASE.db');
    $stmt = $db->prepare('SELECT ID, Uname, Password FROM AdminUser WHERE Uname=:Uname AND Password=:Password');
    $stmt->bindParam(':Uname', $_POST['Uname'], SQLITE3_TEXT);
    $stmt->bindParam(':Password', $_POST['Password'], SQLITE3_TEXT);

    $result = $stmt->execute();

    $rows_array = [];
    while ($row=$result->fetchArray())
    {
        $rows_array[]=$row;
    }
    return $rows_array;
}

