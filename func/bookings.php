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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Orange Cabs | Search Trip</title>
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
    #map{height: 75vh; width: 100%; margin-bottom: 2rem;}

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

    .modal-footer {
        margin-bottom: 6rem;
        background-color: rgba(0,0,0,.5);
    }
    [type=reset], [type=submit], button, html [type=button] {
    /* -webkit-appearance: button; */
    -webkit-appearance: none;
    } 
    .form-search {
        margin-bottom: .1rem;
        margin-top: 2rem !important;
    }
        
    @media only screen and (max-width: 56.25em){
        .footer {
        padding: 2rem 0;
    } 
    }
    .btn-lg {
        line-height: 1;
    }
    #searchResults {
        margin-bottom: 8rem;
    }
    .edit-body {
    background: linear-gradient(to right,#ffb605, #11A0DC);
}
.edit-header{background: linear-gradient(to right,#ffb605, #ffb605);}
.edittripfooter {
    margin-bottom: 0rem;
    background: linear-gradient(to right,#11A0DC, #11A0DC);
}
.modal-footer {
        /* margin-bottom: 6rem; */
        background-color: rgba(0,0,0,.5);
    }

    .profile{
        border-radius: 50%;
        width: 3.2rem;
        /* padding: 2rem; */
        /* height: 1rem; */

    }
 
    </style>
  </head>
  <body>

    <?php 

        include('connection.php');

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

          <li class="nav-item active">
              <a class="nav-link" href="bookings.php">SEARCH<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="maintrips.php">BOOK NOW </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">PROFILE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../help">HELP</a>
            </li>
            <li class="nav-item dropdown">

              <a class="nav-link dropdown-toggle" href="profile.php" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Logged in as <?php echo $username; ?>   
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="#">
                    <?php 
                        if (empty($profile)) {

                            echo "<img src='profilepicture/carprofile.png'  class='profile'>";

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

          <div class="enable-notification">
                <span class="tooltip-toggle" aria-label="Enable notification" tabindex="0" id="notification" style="float:right">
                    <i class="far fa-bell"></i>
                </span>
            </div>

            <!-- <div class="unable-notification">
                <span class="tooltip-toggle" aria-label="Unable notification" tabindex="0" id="notification" style="float:right">
                    <i class="far fa-bell"></i>
                </span>
            </div> -->
        </div>

      </nav>

    <main role="main" class="container" style="margin-top:5rem">

        <h3>Search available trip</h3>

        <form  id="searchform">
            <div class="form-row form-search">
                <div class="col-5">
                    <label class="sr-only" for="pickuppoint">PICK UP POINT:</label>
                    <input type="text" class="form-control" id="pickuppoint" placeholder="PICK UP POINT:" name="pickuppoint">
                </div>
                <div class="col-5">
                    <label class="sr-only" for="dropofpoint">DROP-OFF POINT:</label>
                    <input type="text" class="form-control" id="dropofpoint" placeholder="DROP-OFF POINT:" name="dropofpoint">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success btn-lg">Search</button>
                </div>
            </div>
        </form>
         
        <!-- maps -->
        <div id="map"></div>
        <div id="infowindow-content">
            <img src="" width="16" height="16" id="place-icon">
            <span id="place-name"  class="title"></span><br>
            <span id="place-address"></span>
        </div>

        <!-- trips -->
        <div id="searchResults"></div>


        <!-- payment method form -->
        <form action="" id="paytripform">
                <div class="modal fade" id="paytripModal" tabindex="-1" role="dialog" aria-labelledby="edittriptripTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header edit-header">
                            <h5 class="modal-title" id="paytriptripTitle">Choose a payment method for your  Trip:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body edit-body">

                            <div id="paytripmessage"></div>

                            <div class="form__group">
                                                <div class="form__radio-group">
                                                    <input type="radio" class="form__radio-input" id="creditcard" name="size">
                                                    <label for="creditcard" class="form__radio-label">
                                                        <span class="form__radio-button"></span>
                                                        Credit Card <i class="fab fa-cc-visa"></i><i class="fab fa-cc-mastercard"></i>
                                                    </label>
                                                </div>

                                                <div class="form__radio-group">
                                                    <input type="radio" class="form__radio-input" id="paypal" name="size">
                                                    <label for="paypal" class="form__radio-label">
                                                        <span class="form__radio-button"></span>
                                                        PayPal <i class="fab fa-cc-paypal"></i>
                                                    </label>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="col-6">
                                                    <fieldset class="form-group form__input-icon regular on-off">
                                                    <label class="form-label" for="cardnumber">Card Number</label>
                                                    <input type="text" class="form-control" placeholder="Card number The 16 digits on front of your
                                                    card" id="cardnumber"  name="cardnumber">
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="col-6">
                                                    <fieldset class="form-group form__input-icon regular on-off">
                                                    <label class="form-label" for="dateexpirationcard">Expiration date</label>
                                                    <input type="date" class="form-control" placeholder="" id="dateexpirationcard" name="dateexpirationcard">
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="col-6">
                                                    <fieldset class="form-group form__input-icon regular on-off">
                                                    <label class="form-label" for="cvv2">(The last 3 digits displayed on the back of your card)</label>
                                                    <input type="text" class="form-control" placeholder="CVV2 / CVCV2 "
                                                    id="cvv2" name="cvv2">
                                                    </fieldset>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="col-6">
                                                    <fieldset class="form-group form__input-icon regular on-off">
                                                    <label class="form-label" for="fullnameuserCard">Full Name on a Card</label>
                                                    <input type="text" class="form-control" placeholder="Full Name on a Card" id="fullnameuserCard" name="fullnameuserCard">
                                                    </fieldset>
                                                </div>
                                            </div>

                                    </div>

                            <div class="modal-footer edittripfooter">
                                <button type="button" class="btn btn-primary">Complete transaction</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
     
    </main>

     <?php include('../inc/footer.php');?> 

     <!-- spinner -->
     <div id="spinner"><img src="../src/images/loader-yellow.gif"></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-1SZLcvFN_cxb2HXrmtf7EhfA2O94SUs&libraries=places">
    </script> 
    <script src="maps.js"></script>
    
    <script src="javascript.js"></script>

</body>
</html>