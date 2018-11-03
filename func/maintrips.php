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
    <link href="../src/css/jquery.classypaypal.css" rel="stylesheet">
     <link href="../src/css/datetimepicker.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
  integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
  crossorigin=""/>
    <!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->

 

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/jquery.classypaypal.min.css" rel="stylesheet">

  

    <title>Orange Cabs | My Trips</title>
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
    #map,#map2{height: 40vh; width: 100%; margin-bottom: 2rem;}

    .navbar{
        background-color:#11A0DC;
        color: white;
    }
    .modal {
    z-index: 20;
    }
    .modal-backdrop{
        z-index: 10;
    }
    #addTripform {
        color: #333;
       
    }
    .form-group label { font-size: .8rem !important;}
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
    .label-form,.modal-title{color:#fff;}
    .btn-lg {font-size: 1rem;}

    .loadtripbd{    
    border-radius: 2rem;
    border: .2rem solid #fff;
    background-color: #fff;
    color: #333;
    padding: 1rem;
    font-size: 1rem;
    box-shadow: 0.1rem 0.2rem 0.5rem 0.5rem rgba(0,3,51,.5);
    margin: 1rem auto ;
   
    }
    .modal-body {
        background-color: rgba(0,0,0,.1);
    }

    .tab-pane{
        background-color: rgba(0,0,0,.1);
        margin-bottom: 2rem
        
    }

    .modal-footer {
        margin-bottom: 6rem;
        background-color: rgba(0,0,0,.5);
    }
    [type=reset], [type=submit], button, html [type=button] {
    /* -webkit-appearance: button; */
    -webkit-appearance: none;
    } 
@media only screen and (max-width: 56.25em){
    .footer {
    padding: 2rem 0;
} 
}
.editTitle {
    color: #fff;
    
}
.edit-header{background: linear-gradient(to right,#ffb605, #ffb605);}
.edittripfooter {
    margin-bottom: 0rem;
    background: linear-gradient(to right,#11A0DC, #11A0DC);
    background: -webkit-linear-gradient(to right,#11A0DC, #11A0DC);
    background: -o-linear-gradient(to right,#11A0DC, #11A0DC);
    background: -moz-linear-gradient(to right,#11A0DC, #11A0DC);
    background: -ms-linear-gradient(to right,#11A0DC, #11A0DC);
}
.gettripbtn {margin-bottom: 1rem;}
.tab-content>.active{
    margin-bottom: 8rem !important;
}
.edit-body {
    background: linear-gradient(to right,#ffb605, #11A0DC);
}
.card {
    border:0;
    border-radius:0;
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
        <!--cart
         could have an error
        -->
        <div id="cart">

        </div>

        <div class="collapse navbar-collapse" id="navbarsExample09">

          <ul class="navbar-nav ">
          <!-- mr-auto -->

           <li class="nav-item">
              <a class="nav-link" href="bookings.php">SEARCH<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
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

            <div class="unable-notification">
                <span class="tooltip-toggle" aria-label="Unable notification" tabindex="0" id="notification" style="float:right">
                    <i class="far fa-bell"></i>
                </span>
            </div>
        </div>

      </nav>

    <main role="main" class="container" style="margin-top:5rem">

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-addtrip-tab" data-toggle="tab" href="#nav-addtrip" role="tab" aria-controls="nav-addtrip" aria-selected="true">Add New Trip</a>
                <a class="nav-item nav-link" id="nav-loadtrip-tab" data-toggle="tab" href="#nav-loadtrip" role="tab" aria-controls="nav-loadtrip" aria-selected="false">View Trips</a>
                <a class="nav-item nav-link" id="nav-historytrip-tab" data-toggle="tab" href="#nav-historytrip" role="tab" aria-controls="nav-historytrip" aria-selected="false">History Trips</a>
                <a class="nav-item nav-link" id="nav-historypay-tab" data-toggle="tab" href="#nav-historypay" role="tab" aria-controls="nav-historypay" aria-selected="false">History Pay</a>
                <a class="nav-item nav-link" id="nav-timetable-tab" data-toggle="tab" href="#nav-timetable" role="tab" aria-controls="nav-timetable" aria-selected="false">TimeTable</a>
                <a class="nav-item nav-link" id="nav-message-tab" data-toggle="tab" href="#nav-message" role="tab" aria-controls="nav-message" aria-selected="false">Message</a>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-addtrip" role="tabpanel" aria-labelledby="nav-addtrip-tab">

                <!-- add trip -->
                <form action="" id="addTripform">

                        <div class="modal-body">

                            <div id="map"></div>
                            <div id="infowindow-content">
                                <img src="" width="16" height="16" id="place-icon">
                                <span id="place-name"  class="title"></span><br>
                                <span id="place-address"></span>
                            </div>
                            <div id="addtripmessage"></div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="pickuppoint" class="label-form">PICK UP POINT:</label>
                                    <input type="text" class="form-control text-lowercase" id="pickuppoint"  name="pickuppoint" placeholder="PICK UP POINT:">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dropofpoint" class="label-form">DROP-OFF POINT:</label>
                                    <input type="text" class="form-control text-lowercase" id="dropofpoint" placeholder="DROP-OFF POINT:" name="dropofpoint">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                        <label for="distance" class="label-form">DISTANCE:</label>
                                        <input type="text" class="form-control text-lowercase" id="distance"  readonly="readonly" name="distance" placeholder="DISTANCE:">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="duration" class="label-form">DURATION:</label>
                                        <input type="text" class="form-control text-lowercase" id="duration" readonly="readonly" placeholder="DURATION:" name="duration">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="price" class="label-form">PRICE:</label>
                                        <input type="text" class="form-control text-lowercase" id="price" readonly="readonly" placeholder="Price:" name="price">
                                    </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="date" class="text-uppercase label-form">Select Date & Time Pick up:</label>
                                    <div id="picker"> </div>
                                    <input class="form-control " type="hidden" id="result" value="" name="date" id="date"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="amountofriders" class="text-uppercase label-form">Amount of riders:</label>
                                    <input type="number" class="form-control text-lowercase" id="amountofriders" name="amountofriders" placeholder="Amount off riders:">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nameofonerider" class="text-uppercase label-form">Name of one rider:</label>
                                    <input type="text" class="form-control text-lowercase" id="nameofonerider" placeholder="Name of one rider:" name="nameofonerider">
                                </div>

                            </div>

                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="addtrip" value="Create Trip">
                        </div>
                </form>

            </div>

            <div class="tab-pane fade" id="nav-loadtrip" role="tabpanel" aria-labelledby="nav-loadtrip-tab">
                 <!-- show recents trips -->
                 <div id="loadtrip"  class="">
                      
                      <!-- Ajax call to a php file-->
                </div>
            </div>
            
            <div class="tab-pane fade" id="nav-historytrip" role="tabpanel" aria-labelledby="nav-historytrip-tab">
                <div id="historytrip" class=" ">
                      <!-- Ajax call to a php file-->
                     
                </div>
            </div>

            <div class="tab-pane fade" id="nav-timetable" role="tabpanel" aria-labelledby="nav-timetable-tab">
                 <div id="timetable" class="">
                     <h4>Time Table</h4>
   
                   </div> 
            </div>

            <div class="tab-pane fade" id="nav-message" role="tabpanel" aria-labelledby="nav-message-tab">
                 <div id="message" class="">
                     <h4>Real Time Chat</h4>
                   </div> 
            </div>

             <div class="tab-pane fade" id="nav-historypay" role="tabpanel" aria-labelledby="nav-historypay-tab">
                 <div id="historypay" class="">
                     <h4>Not payment trip yet</h4>
                   </div> 
            </div>

        </div>
      
            <!-- Edit form -->
            <form action="" id="Edittripform">
                <div class="modal fade" id="edittripModal" tabindex="-1" role="dialog" aria-labelledby="edittriptripTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header edit-header">
                            <h5 class="modal-title editTitle" id="edittriptripTitle">Edit Trip:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body edit-body">

                            <div id="edittripmessage"></div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="pickuppoint2" class="">PICK UP POINT:</label>
                                    <input type="text" class="form-control text-lowercase" id="pickuppoint2"  name="pickuppoint2">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dropofpoint2" class="">DROP-OFF POINT:</label>
                                    <input type="text" class="form-control text-lowercase" id="dropofpoint2" name="dropofpoint2">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                        <label for="distance2" class="">DISTANCE:</label>
                                        <input type="text" class="form-control text-lowercase" id="distance2"  readonly="readonly" name="distance2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="duration2" class="">DURATION:</label>
                                        <input type="text" class="form-control text-lowercase" id="duration2" readonly="readonly"  name="duration2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="price2" class="">PRICE:</label>
                                        <input type="text" class="form-control text-lowercase" id="price2" readonly="readonly" name="price2">
                                    </div>
                            </div>

                             <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="result2" class="text-uppercase">Date & Time Pick up:</label>
                                    <div id="picker2"> </div>
                                    <input class="form-control " type="hidden" id="result2" value="" name="date2"/>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="amountofriders2" class="text-uppercase">Amount of riders:</label>
                                    <input type="number" class="form-control text-lowercase" id="amountofriders2" name="amountofriders2">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nameofonerider2" class="text-uppercase">Name of one rider:</label>
                                    <input type="text" class="form-control text-lowercase" id="nameofonerider2" placeholder="Name of one rider:" name="nameofonerider2">
                                </div>

                            </div>

                        </div>
                        
                        <div class="modal-footer edittripfooter">
                            <!-- <button type="button" class="btn btn-primary"></button> -->
                            <input type="submit" class="btn btn-primary" name="edittrip" value="Update Trip">
                            <button type="button" class="btn btn-danger" id="deleteTrip">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- payment method form -->
            <form action="" id="paytripform">
                <div class="modal fade" id="paytripModal" tabindex="-1" role="dialog" aria-labelledby="edittriptripTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        
                        <div class="modal-body edit-body">

                            <div id="paytripmessage"></div>

                            <div class="card">
                                <div class="card-header edit-header">
                                    Pay your ride with PayPal:
                            
                                </div>
                                <div class="card-body" style="color:#333; font-size:1.5rem;">
                                    
                                    <span class="card-title" style="font-size:1.7rem;">Price / Rand : &nbsp;</span>
                                    <input type="text" id="price3" readonly="readonly" style="border:0;">
                                    
                                </div>

                            </div>
                            
                            <div class="modal-footer edittripfooter">
                                <input type="submit" class="btn btn-primary" name="paybutton" value="Complete transaction">
                                <!-- <button type="button" class="btn btn-primary" id="paybutton"></button> -->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
     
    </main>
     <?php include('../inc/footer.php');?> 
     <!--THIS IS THE PAYPAL JQuery plugin-->

    

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
  integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
  crossorigin=""></script>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
    <script src="jquery.classypaypal.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="../src/js/datetimepicker.js"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-1SZLcvFN_cxb2HXrmtf7EhfA2O94SUs&libraries=places">
    </script> 
    <script src="maps.js"></script>
    
    <script src="mytrip.js"></script>
    
    <!--added the ajax classes for paypal checkout-->

</body>
</html>