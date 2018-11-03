<?php
session_start();
include('../func/connection.php');

// <!--check user inputs-->
//<!--    define error messages-->
$missingUsername = '<p><strong>Please enter a username!</strong></p>';
$missingmobile = '<p><strong>Please enter your mobile number!</strong></p>';
$invalidemobile = '<p><strong>Invalid number, your number should have 10 numbers no letters!</strong></p>';

$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalideEmail = '<p><strong>Please enter a valid email address!</strong></p>';

$errors ='';


//get username
if (empty($_POST["username"])) {

    $errors .= $missingUsername;
//    var_dump($errors);

} else {

    $user = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}


//get number
if (empty($_POST["mobile"])) {

    $errors .= $missingmobile;
//    var_dump($errors);

} elseif (!preg_match('#^[0-9]{10}#', $_POST["mobile"])) {
    $errors .= $invalidemobile;

} else {

    $mobile = filter_var($_POST["mobile"], FILTER_SANITIZE_NUMBER_INT);

}

//get email
if (empty($_POST["email"])) {

    $errors .= $missingEmail;
//    var_dump($errors);

} else {

    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors .= $invalideEmail; 
//        var_dump($errors);

    }
}


//<!--    if there are any errors prints errors-->
if ($errors) {

    $resultMessage = '<div class="invalid">' . $errors.  '</div>';
    echo $resultMessage;
   exit;

} 

//<!--no errors-->   
//<!--    prepare variables for the queries--> 
   $user = mysqli_real_escape_string($link, $user);

   $mobile = mysqli_real_escape_string($link, $mobile);

   $email = mysqli_real_escape_string($link, $email);

    
    // if username exists in the users table print error

   $sql = "SELECT * FROM driver WHERE username = '$user'";


   $result = mysqli_query($link, $sql);
   
   if (!$result) {

       echo '<div class="invalid"> Error running the query!</div>';

       echo '<div class="invalid"> "' . mysqli_error($link) . '"</div>';

       exit;

   }
   $results = mysqli_num_rows($result);

   if ($results) {

       echo '<div class="invalid">That username is already exist. </div>';
       exit;
   }
    
//<!--    if mobile number exists in the users table print error-->    
   $sql = "SELECT * FROM driver WHERE mobile = '$mobile'";

   $result = mysqli_query($link, $sql);

   if (!$result) {

       echo '<div class="invalid"> Error running the query!</div>';

       echo '<div class="invalid"> "' . mysqli_error($link) . '"</div>';

       exit;
   }
   $results = mysqli_num_rows($result);

   if ($results) {

       echo '<div class="alert info">That mobile number is already exist </div>';
       exit;
   }
       
 //<!--        if email exists in the users tables print error-->
   $sql_email = "SELECT * FROM driver WHERE email='$email'";

   $result = mysqli_query($link, $sql_email);

   if (!$result) {

       echo '<div class="invalid">Error running the query!</div>';

       echo '<div class="invalid"> "' . mysqli_error($link) . '"</div>';

       exit;
   }

   $results = mysqli_num_rows($result);

   if ($results) {

       echo '<div class="invalid">That Email address is already exist</div>';
       exit;
   }
    
   //insert user details and activation code in the users table
   $sql = "INSERT INTO driver(`username`,`mobile`,`email`) VALUES('$user','$mobile','$email')";

   $result = mysqli_query($link, $sql);

   if (!$result) {

       echo '<div class="invalid">There was an error inserting the users details in the database!</div>';

       echo '<div class="invalid">"' . mysqli_error($link) . '"</div>';

       exit;

   }

    echo "<div class='valid'>New driver added successful! </div>";





?>