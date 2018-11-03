<?php
session_start();
include('../func/connection.php');

//<!--    define error messages-->
$missingtitle= '<p><strong>Please enter a title!</strong></p>';
// $invalidPickuppoint = '<p><strong>Please enter a valid pick up point!</strong></p>';
$missingcarbrand = '<p><strong>Please enter car brand!</strong></p>';
// $invalidDropofpoint = '<p><strong>Please enter a valid drop of point!</strong></p>';
// $amoutofriders = '<p><strong>Please enter amount of rider!</strong></p>';
// $invalidAmountofriders= '<p><strong>This input should contain number not character!</strong></p>';
// $missingnameofonerider = '<p><strong>Please enter name of one rider!</strong></p>';
$missingseatavailable = '<p><strong>Seat available is missing!</strong></p>';
// $missingduration = '<p><strong>Duration is missing!</strong></p>';
// $missingPrice = '<p><strong>Price is missing!</strong></p>';
// $missingDate = '<p><strong>Please select a date for your rider!</strong></p>';
// $missingtime = '<p><strong>Please select a time for your rider!</strong></p>';

$errors ='';


//check pick up point 
if(empty($_POST['title'])){

    $errors .= $missingtitle;

}else{

        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    
    

}

if(empty($_POST['mark_car'])){

    $errors .= $missingcarbrand;

}else{

        $carbrand = filter_var($_POST['mark_car'], FILTER_SANITIZE_STRING);
    
    

}

if(empty($_POST['seatavailable'])){

    $errors .= $missingseatavailable;

}else{

        $seatavailable = filter_var($_POST['seatavailable'], FILTER_SANITIZE_STRING);
    
    

}

//check if there are errors and print errors
if($errors){

    $resultMessage = "<div class='invalid'>$errors</div>";

    echo $resultMessage;

}else{

    //no error prepare variables for the query
    $title = mysqli_real_escape_string($link,$title);
    $carbrand = mysqli_real_escape_string($link,$carbrand);
    $seatavailable = mysqli_real_escape_string($link,$seatavailable);
    // $textarea = mysqli_real_escape_string($link,$textarea);

    //define a table name
    $tableName = 'cars';

    //retrieve user from the session
    // $user_id = $_SESSION['user_id'];
    // $mydate = $_POST['date'];
    // $mydate = date('Y-m-d h:i', strtotime($mydate));
    

      //query for a regional trip
      $sql = "INSERT INTO $tableName (`name`,`carbrand`,`seatavailable`) VALUES ('$title','$carbrand','$seatavailable')";

        //run the query and and store in $results

        $result = mysqli_query($link,$sql);

        //check if the query is successfull
        if(!$result){

            echo "<div class='invalid'>There was error! the car could not be added to the da
            tabase! </div>". mysqli_error($link);

        }else{
            echo "<div class='valid'>Your car is successful created! </div>";
        }
}



?>