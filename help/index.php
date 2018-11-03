<?php 

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location:../index.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Orange Cabs | Help</title>
  <link rel="shortcut icon" type="image/ico" href="../favicon.ico" />

   <style>
    html,body{
        height: 100%;
        overflow-x: hidden;
        position: relative;
    }
    body{
     background: url(../src/images/onlinebook.jpg);
     background-size: cover;
     color:#fff;
     position: relative;
     height: 100%;
    }

    .navbar{
        background-color:#11A0DC;
        color: white;
    }

    .footer {
        background: #FCB134;
    padding: 1.5rem 0;
    font-size: 1rem;
    color: #333;
    text-align: center; bottom:0;position: fixed;width: 100%;}
  @media only screen and (max-width: 56.25em) {
    .footer {
      padding: 8rem 0; } }
      p {
    margin-bottom: 0rem;
}

    .navbar-light .navbar-brand {
        color: #fff;
    }
    .navbar-light .navbar-nav .nav-link{
    color: #fff;
    }

   .navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
    color: #ffb605;
    }

    .navbar-nav {
        margin-left: 37rem;
    }
        
    @media only screen and (max-width: 56.25em){
        .footer {
        padding: 2rem 0;
    } 
    }
 
    </style>
  </head>
  <body>

    <?php 

        include('../func/connection.php');

            $user_id = $_SESSION['user_id'];

                    //get username and email
            $sql = "SELECT * FROM users WHERE user_id='$user_id'";

            $result = mysqli_query($link, $sql);

            $count = mysqli_num_rows($result);

            if ($count == 1) {

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $username = $row['username'];
            $mobile = $row['mobile'];
            $email = $row['email'];
            $profile = $row['profilepicture'];

        } else {

            echo "There was an error retrieving the username and email from the database!";

        }
    ?>
        
      <nav class="navbar navbar-expand-lg navbar-light fixed-top rounded">
        <a class="navbar-brand" href="#">Orange cabs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">

          <ul class="navbar-nav ">
          <!-- mr-auto -->

          <li class="nav-item">
              <a class="nav-link" href="../func/bookings.php"> SEARCH<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="../func/maintrips.php">BOOK NOWP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../func/profile.php">PROFILE</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../help">HELP</a>
            </li>
            <li class="nav-item dropdown">

              <a class="nav-link dropdown-toggle" href="../func/profile.php" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Logged in as <?php echo $username; ?>   
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="#">
                    <?php 
                        if (empty($profile)) {

                            echo "<img src='../func/profilepicture/carprofile.png'  class='profile'>";

                        } else {

                            echo "<img src='$profile' class='profile'>";


                        }
                    ?>
                </a>
                <a class="dropdown-item" href=""></a>
                <a class="dropdown-item" href="../index.php?logout=1">LOGOUT</a>
              </div>
            </li>
          </ul>

        </div>

      </nav>

    <main role="main" class="container" style="margin-top:5rem">

        <h3>About Orange cabs</h3>


     
    </main>


     <?php include('../inc/footer.php');?> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>