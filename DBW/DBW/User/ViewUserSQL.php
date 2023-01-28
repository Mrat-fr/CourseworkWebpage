<?php

function Userinfo () {
    $db = new SQLite3('C:\xampp\data\ABCDATABASE.db');
    $sql = "SELECT * FROM users WHERE ApplicationID=:uid";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':uid', $_GET['uid'], SQLITE3_TEXT);
    $result= $stmt->execute();
    $arrayResult = [];
    
    while($row=$result->fetchArray(SQLITE3_NUM)){
        $arrayResult [] = $row;
    }

    return $arrayResult;
}