<?php

function getUsers(){
    $db = new SQLite3('C:\xampp\data\ABCDATABASE.db');
    $arrayResult = []; //prepare this empty array variable first
    
    //this if is hit when the page is loaded. The input fileterLevel is null
    if (!isset($_POST['filterLevel'])){
        $stmt = "SELECT * FROM users";

        $rows = $db->query($stmt);
    
            while($row = $rows->fetchArray()) {
                $arrayResult [] = $row;
            }
    }
    else{//if the user starts to select the option AND clicks the filter button, this else is hit

        //if the value of level selected by the use is not All (i.e 3,4...8) we go to this if
        if ($_POST['filterLevel'] != "All"){

            $sql = "SELECT * FROM users WHERE ApplicationStatus = :Status";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':Status', $_POST['filterLevel'], SQLITE3_TEXT);
            $results = $stmt->execute();

            while($row = $results->fetchArray()){
                $arrayResult [] = $row;
            }
        }
        else{//otherwise, All is selected and we'll diplay all records

            $stmt = "SELECT * FROM users";

            $rows = $db->query($stmt);
    
            while($row = $rows->fetchArray()) {
                $arrayResult [] = $row;
            }
        }
    }
   
    return $arrayResult;
}

