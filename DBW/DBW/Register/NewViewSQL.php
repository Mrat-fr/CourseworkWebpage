<?php

function Viewuser () {

    $db = new SQLITE3('C:\xampp\data\ABCDATABASE.db');
    $sql = "SELECT ApplicationID, FirstName, LastName, Password, DOB, Postcode, ContactNumber, Product, LuckyDrawEntries FROM users WHERE ApplicationID=:uid";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':uid', $_GET['uid'], SQLITE3_TEXT);
    $result= $stmt->execute();
    $arrayResult = [];
    
    while($row=$result->fetchArray(SQLITE3_NUM)){
        $arrayResult [] = $row;
    }

    return $arrayResult;
}