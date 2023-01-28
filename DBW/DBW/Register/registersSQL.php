<?php

function createUser(){
    if ($_POST['Product']=="100"){
        $LuckyDrawEntries = "10";
    }
    if ($_POST['Product']=="300"){
        $LuckyDrawEntries = "15";
    }
    if ($_POST['Product']=="500"){
        $LuckyDrawEntries = "25";
    }
    if ($_POST['Product']=="800"){
        $LuckyDrawEntries = "35";
    }
    if ($_POST['Product']=="1000"){
        $LuckyDrawEntries = "45";
    }
    if ($_POST['Product']=="5000"){
        $LuckyDrawEntries = "55";
    }
    if ($_POST['Product']=="10,000"){
        $LuckyDrawEntries = "60";
    }
    if ($_POST['Product']=="15,000"){
        $LuckyDrawEntries = "65";
    }

    $ApplicationStatus = "New";
    $ApplicationDate = date("d/m/y");

    $ww = substr($_POST['fname'], 0, 2); 
    $xx = substr($_POST['lname'], 0, 2);
    $yy = substr($_POST['postc'],-2);
    $zz = substr($ApplicationDate,0,2);
    $zzzzzz = rand(100000, 999999);
    $ApplicationID = $ww.$xx.$yy.$zz.$zzzzzz;


    $created = false;
    $db = new SQLite3('C:\xampp\data\ABCDATABASE.db');
    $sql = 'INSERT INTO Users(ApplicationID, FirstName, LastName, Password, DOB, MOB, Postcode, ContactNumber, Product, ApplicationStatus, ApplicationDate, LuckyDrawEntries) VALUES (:ID, :fname, :lname, :Pass, :dob, :mob, :postc, :contact, :Product, :ApplicationStatus, :ApplicationDate, :LuckyDrawEntries)';
    $stmt = $db->prepare($sql); 

    $stmt->bindParam(':ID', $ApplicationID, SQLITE3_TEXT);
    $stmt->bindParam(':fname', $_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lname', $_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':Pass', $_POST['Pass'], SQLITE3_TEXT);
    $stmt->bindParam(':dob', $_POST['dob'], SQLITE3_TEXT);
    $stmt->bindParam(':mob', $_POST['mob'], SQLITE3_TEXT);
    $stmt->bindParam(':postc', $_POST['postc'], SQLITE3_TEXT);
    $stmt->bindParam(':contact', $_POST['contact'], SQLITE3_INTEGER);
    $stmt->bindParam(':Product', $_POST['Product'], SQLITE3_TEXT);
    $stmt->bindParam(':ApplicationStatus', $ApplicationStatus, SQLITE3_TEXT);
    $stmt->bindParam(':ApplicationDate', $ApplicationDate, SQLITE3_TEXT);
    $stmt->bindParam(':LuckyDrawEntries', $LuckyDrawEntries, SQLITE3_TEXT);

    $stmt->execute();

    return $ApplicationID;
}
