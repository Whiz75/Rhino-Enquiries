<?php
    //define variable 
    $Fname = $Lname = $Email = $Country = $Phone = $HolidayType 
    = $Adults = $Children = $ArrivalDate = $DepartureDate = $Enquiry = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $err = "";
        if(empty($_POST["Fname"])){
            $err = "Firstname is required!";
        }else{

        }
        
        $Fname = validation($_POST["Fname"]); //Fname
        $Lname = validation($_POST["Lname"]); //Lname
        $Email = validation($_POST["Email"]); //Email
        $Country = validation($_POST["Country"]); //Country
        $Phone = validation($_POST["Phone"]); //Phone
        $HolidayType = validation($_POST["HolidayType"]); //Holiday Type
        $Adults = validation($_POST["Adults"]); //Adults
        $Children = validation($_POST["Children"]); //Children
        $ArrivalDate = validation($_POST["HolidayType"]); //Arrival Date
        $DepartureDate = validation($_POST["DepartureDate"]); //Departure Date
        $Enquiry = validation($_POST["Enquiry"]); //Enquiry

    }

    function validation($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }
?>