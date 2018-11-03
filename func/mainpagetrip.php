<?php 

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="Orange Cabs">
  <meta name="author" content="Quirky30">

  <title>Orange Cabs | My Trips</title>
  <link rel="shortcut icon" type="image/ico" href="../favicon.ico" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">

    <!-- jquery UI datapicker -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/sunny/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../src/js/jquery.datetimepicker.css"/> -->
    <!-- this should go after your </body> -->
<!-- <link rel="stylesheet" type="text/css" href="../src/js/jquery.datetimepicker.css"/> -->


    <link rel="stylesheet" href="../src/css/style.css">

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
    }
    #map{height: 30vh; width: 100%; margin-bottom: 2rem;}

    .alert-dangerprofile {
        color:#fff;
        font-size:1.5rem;
        line-height:2.5rem;
        background-color:#dc3545;
        text-align: center;
        padding:2rem 2rem; 
        margin-top: 1rem;
    }

    .alert-danger {
        color:#dc3545;
    }

    .alert-success{
        background-color: #11A0DC;
        color:#fff;
        font-size:2rem;
        line-height:.5rem;
        text-align: center;
        padding:2rem 2rem;
    }

    p{
        padding:1rem
    }

    .profile{
        border-radius: 50%;
        width: 3.2rem;
        /* padding: 2rem; */
        /* height: 1rem; */

    }

    .navbar__item .profilelink:hover {
        border-bottom: 0;
        
    }

    .navbar__list {
        width: 100%;
    }

    .popup__text{
        column-count: 1;
    
    }

    #done,.delete{
            display: none;
        }

    #done {float: right;clear: both;}

    #edit {
            float: right;
            clear: both;
            background-color: #11A0DC;
            color: white;
        }

        #tripPad {margin-top: 2rem;}
        #allTrips{background-color: #11A0DC; color:#fff;}

        .container {
            margin: 0 auto;
            display: block;
        }
        .close {
            float: right;
        font-size: 2rem;
        margin-bottom: 1rem;
        margin-right: 2rem;
        margin-top: .5rem;
        cursor: pointer;
        }

        .trip-container{
            position:relative;
        }
        .buttons {
            display: -webkit-inline-block;
            margin-bottom: 1rem;
        }


    .left-align {
    float: left;
    margin-left: -18rem;
    margin-top: 9rem;
    }

    .popup__right {
        color:#000;
       
    }

    .popup__left {
        margin: 4rem;
        width: 89.333333%;
        background-color: transparent;
        
    }
    .loggedin:hover{
        border:0;
    }
    .alert-successprofile{
        color:#fff;
        font-size:1.5rem;
        line-height:2.5rem;
        background-color:#55c57a;
        text-align: center;
        padding:2rem 2rem; 
        margin-top: 1rem;
    }

            .buttons .btn {
            padding: .5rem 4rem;
        }

            .popup__right {
            color:#000;
            width: 60.666667%;
        
        }

        .popup__left {
            margin: 2.5rem;
            width: 89.333333%;
            margin-top: 5rem;
            background-color: transparent;
            
        }
        .trip-popup{
            column-count: 2;
        
        }
        .fas {
            margin-top: -2.3rem;
        }

        .heading-secondary {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #fff;
        }

        .submittrip {
            margin-left: 0rem;
            margin-top: 1rem;
            /* font-size: 1rem !important; */
        }

        .btn-cancel-trip {
        background: linear-gradient(to right, #777, #333);
        color: #fff;
        padding-right: 5rem;
        padding-left: 2rem;
        border: 0;
        text-decoration: none;
        margin-left: -20rem;
        margin-top: .6rem;
    }

     .btn-cancel-tripEdit {
        background: linear-gradient(to right, #777, #333);
        color: #fff;
        padding-right: 5rem;
        padding-left: 2rem;
        border: 0;
        text-decoration: none;
        /* margin-left: -12rem; */
        margin-top: 0;
    }


    .form__input-icon .fa-clock {
        margin-left: 0rem;
        margin-top: -2rem;
    }

.form-control {
    /* padding: 0.9rem 21.7rem; */
    padding-left: 1.5rem;
}

.form-label {

    font-size: 1.1rem;
}

    .profile{
        border-radius: 50%;
    }

    .modal-backdrop{
        z-index: 10;

    }
    .footer {
        bottom: 0;
        width: 100%;
        position: fixed;
        top:57rem; 
        padding: 0.5rem 0;
        
    }
    .edittrip:not(:last-child){
        margin-right: 1rem;
    }
    .btnbook {font-weight: 200;
    font-size: 1.5rem;
    }

.form-control-edit {
    padding: .9rem 18.7rem;
    padding-left: 0.5rem;
    }
.btn-danger{
    background-color: #dc3545;
}

.modal {
    z-index: 20;
}
.modal-backdrop{
    z-index: 10;
}
.popup__text{
    margin-bottom: 0;
}

.loadtripbd{    
    border-radius: 2rem;
    border: .2rem solid #fff;
    background-color: #fff;
    color: #333;
    padding: 2rem;
    font-size: 1.3rem;
    box-shadow: 0.1rem 0.2rem 0.5rem 0.5rem rgba(0,3,51,.5);
    margin: 1rem auto ;
   
}

.loadtriphistroy {
    border-radius: 2rem;
    border: .2rem solid #fff;
    background-color: #fff;
    margin-top: 2.5rem !important;
}
.loadtripbd:nth-last-child(){
    margin-bottom: 5rem;
}
.loadtripbd:not(:last-child){
    margin-bottom: 0 !important;
}
.tripalldb {
    text-transform: uppercase;
    font-weight: 700;
}
.trip-container {
    width: 70%;
    margin: 0 auto;
}

.cancelpay{
    transition: initial;
    padding: .1rem 4rem !important;
}

.form__input {
    border: .1rem solid darkorange;
    
}

::-webkit-input-placeholder{
    color: #333;
}

.btn-transaction {
    margin-top: 2rem;
}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
    height: auto;
}

/* Fade in tabs */
@-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

/* #trip {
    background-color: rgba(255, 255, 255,.5);
    height: 100%;
} */

.form-control-location {
    padding: .9rem 7.7rem !important;
}


.row [class^="col-"]:not(:last-child) {
    margin-right: 12rem;
}


.trip-margin-bottom {
    margin-bottom: 10rem !important;
}

</style>

</head>

<body class="bookings-modalusers">

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
     <!-- menus Navigation -->
     <nav class="navbar" id="mainNav">

        <div class="toggle">
            <i class="fas fa-bars menu"></i>
        </div>

        <ul class="navbar__list">

            <li class="navbar__item">
                <a class="navbar__link "   href="profile.php">PROFILE</a>
            </li>

            <li class="navbar__item">
                <a class="navbar__link"  href="../help">HELP</a>
            </li>

            <li class="navbar__item">
                <a class="navbar__link"  href="bookings.php">BOOK NOW</a>
            </li>

            <li class="navbar__item">
                <a class="navbar__link active"  href="../func/mainpagetrip.php">MY TRIP</a>
            </li>

            <li class="navbar__item">
                <a class="navbar__link profilelink"  href="#uploadpicture">
                    <?php 
                    if (empty($profile)) {

                        echo "<img src='profilepicture/carprofile.png'  class='profile'>";

                    } else {

                        echo "<img src='$profile' class='profile'>";


                    }
                    ?>
                </a>
            </li>

            <li class="navbar__item ">
                <a class="navbar__link loggedin"  href="profile.php">Logged in as <?php echo $username; ?></a>
            </li>

            <li class="navbar__item">
                <a class="navbar__link loggedin"  href="../index.php?logout=1">LOGOUT</a>
            </li>

        </ul>

    </nav>

           <!--Container-->
    <div class="container" id="container">

        <div class="row">

            <div class="trip-container">

                <div class="tab">

                    <button class="tablink" onclick="openPage('trip', this, '#ffb605')" id="defaultOpen">Add Trip</button>
                    <button class="tablink" onclick="openPage('loadtrip', this, '#ffb605')">Your Trip</button>
                    <button class="tablink" onclick="openPage('alltrip', this, '#ffb605')">All Trips</button>
                    <button class="tablink" onclick="openPage('historytrip', this, '#ffb605')">History Trips</button>
                    
                </div>

                    <!-- show recents trips -->
                  <div id="loadtrip"  class="tabcontent">
                      
                        <!-- Ajax call to a php file-->
                  </div>

                   <div id="historytrip" class="tabcontent active">
                      <!-- Ajax call to a php file-->
                   </div>

                   <div id="alltrip" class="tabcontent">
                      <!-- Ajax call to a php file-->
                   </div>

                     <!-- add new trip -->
                   <form action="#" class="form" id="addTripform">

                   <div id="trip" class="tabcontent">
                       
                        <h4 class="heading-secondary">New Trip : </h4>
                        <div  id="map"></div>
                        <div id="addtripmessage"></div>

                            <div>
                                <div class="col-2">
                                    <fieldset class="form-group form__input-icon">
                                        <label class="form-label" for="pickuppoint">PICK UP POINT:</label>
                                        <input type="text" class="form-control" id="pickuppoint"  name="pickuppoint">
                                    </fieldset>
                                </div> 
                                <div class="col-2">
                                    <fieldset class="form-group form__input-icon">
                                        <label class="form-label" for="dropofpoint">DROP-OFF POINT:</label>
                                        <input type="text" class="form-control" id="dropofpoint" name="dropofpoint">
                                    </fieldset>
                                </div>  
                                
                                <div class="col-2">
                                    <fieldset class="form-group form__input-icon">
                                    <label class="form-label" for="distance">Distance</label>
                                    <input type="text" readonly="readonly" class="form-control" id="distance" name="distance">
                                    </fieldset>
                                </div>

                            </div>


                            <div>
                                
                                <div class="col-2">
                                    <fieldset class="form-group form__input-icon">
                                    <label class="form-label" for="duration">Duration</label>
                                    <input type="text" readonly="readonly" class="form-control" id="duration" name="duration">
                                    </fieldset>
                                </div>

                                <div class="col-2">
                                    <fieldset class="form-group form__input-icon">
                                    <label class="form-label" for="price">Price / Rand</label>
                                    <input type="text" readonly="readonly" class="form-control" id="price" name="price">
                                    </fieldset>
                                </div>

                                <div class="col-2">
                                    <fieldset class="form-group form__input-icon">
                                        <label class="form-label" for="amountofriders">AMOUNT OF RIDERS:</label>
                                        <input type="number" class="form-control" id="amountofriders" placeholder="" name="amountofriders">
                                    </fieldset>
                                </div>
                            </div>

                            
                            <div>
                                
                                <div class="col-2">
                                    <fieldset class="form-group form__input-icon">
                                        <label class="form-label" for="nameofonerider">NAME OF ONE RIDER:</label>
                                        <input type="text" class="form-control" id="nameofonerider" placeholder="" name="nameofonerider">
                                    </fieldset>
                                </div>

                                <div class="col-2">
                                    <fieldset class="form-group form__input-icon on-off">
                                        <label class="form-label" for="date">DATE:</label>
                                        <input type="text" readonly="readonly" class="form-control" id="date" placeholder="Date" name="date">
                                    </fieldset>
                                </div>
                                <div class="col-2">
                                    <fieldset class="form-group form__input-icon regular on-off">
                                    <label class="form-label" for="time">TIME:</label>
                                    <input type="time" class="form-control" id="time"  name="time">
                                    </fieldset>
                                </div>

                            </div>

                            <div class="trip-margin-bottom">
                                <div class="col-3 left-align submittrip">
                                    <input type="submit" class="btnbook btn-send" name="upload" value="Create Trip">
                                </div>

                                <div class="col-3 right-align button-area">
                                    <a href="mainpagetrip.php" type="button" class="btnbook btn-cancel-trip" name="btn-cancel-trip">Cancel</a>
                                </div>
                            </div>
                   </div>
                </form>
            </div>
        </div>

    </div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

   <div>
        <!-- edit trip  -->
        <form action="#" class="form" id="editTripform">
        <div class="modal" id="edittrip">
            <div class="modal__content">
            <div class="popup__right">
                <a href="mainpagetrip.php" class="popup__close">&times;</a>
                <h4 class="heading-secondary">Edit Trip : </h4>
                <div class="popup__text trip-popup">

                <div id="edittripmessage">

                </div>
                        <div>
                             <div class="col-6">
                                <fieldset class="form-group form__input-icon">
                                    <label class="form-label" for="pickuppoint2">PICK UP POINT:</label>
                                    <input type="text" class="form-control" id="pickuppoint2"  name="pickuppoint2">
                                </fieldset>
                            </div>                          
                        </div>

                        <div>
                            <div class="col-6">
                                <fieldset class="form-group form__input-icon">
                                    <label class="form-label" for="dropofpoint2">DROP-OFF POINT:</label>
                                    <input type="text" class="form-control" id="dropofpoint2" name="dropofpoint2">
                                </fieldset>
                            </div>
                        </div>

                        <div>
                            <div class="col-6">
                                <fieldset class="form-group form__input-icon">
                                <label class="form-label" for="distance2">Distance</label>
                                <input type="text" readonly="readonly" class="form-control" id="distance2" name="distance2">
                                </fieldset>
                            </div>
                        </div>

                        <div>
                            <div class="col-6">
                                <fieldset class="form-group form__input-icon">
                                <label class="form-label" for="duration2">Duration</label>
                                <input type="text" readonly="readonly" class="form-control" id="duration2" name="duration2">
                                </fieldset>
                            </div>
                        </div>

                         <div>
                            <div class="col-6">
                                <fieldset class="form-group form__input-icon">
                                <label class="form-label" for="price2">Price / Rand</label>
                                <input type="text" readonly="readonly" class="form-control" id="price2" name="price2">
                                </fieldset>
                            </div>
                        </div>
                        
                        <div>
                            <div class="col-6">
                                <fieldset class="form-group form__input-icon">
                                    <label class="form-label" for="amountofriders2">AMOUNT OF RIDERS:</label>
                                    <input type="number" class="form-control" id="amountofriders2" placeholder="" name="amountofriders2">
                                </fieldset>
                            </div>
                        </div>

                        <div>
                            <div class="col-6">
                                <fieldset class="form-group form__input-icon">
                                    <label class="form-label" for="nameofonerider2">NAME OF ONE RIDER:</label>
                                    <input type="text" class="form-control" id="nameofonerider2" placeholder="" name="nameofonerider2">
                                </fieldset>
                            </div>
                        </div>

                        <div>
                            <div class="col-6">
                                <fieldset class="form-group form__input-icon on-off">
                                <label class="form-label" for="date2">DATE:</label>
                                <input type="text" readonly="readonly" class="form-control" id="date2" placeholder="Date" name="date2">
                            </fieldset>
                            </div>
                        </div>

                        <div>
                            <div class="col-6">
                                <fieldset class="form-group form__input-icon regular on-off">
                                <label class="form-label" for="time2">TIME:</label>
                                <input type="time" class="form-control" id="time2"  name="time2">
                                </fieldset>
                            </div>
                        </div>
                        
                        <div>
                            <div class="left-align submittrip edittrip">
                                <input type="submit" class="btnbook btn-send" name="upload2" value="Edit Trip">
                            </div>

                             <div class="left-align submittrip edittrip">
                                <input type="submit" class="btnbook btn-danger" name="deleteTrip" value="Delete" id="deleteTrip">
                            </div>

                            <div class="left-align   submittrip">
                                <a href="mainpagetrip.php" type="button" class="btnbook btn-cancel-tripEdit" name="btn-cancel-trip">Cancel</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
   </div>


   <div>



 <?php include("../inc/footer.php"); ?>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!-- <script src="../src/js/jquery.datetimepicker.full.min.js"></script>
     <script src="../src/js/php-date-formatter.min.js"></script> -->

     <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script> -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-1SZLcvFN_cxb2HXrmtf7EhfA2O94SUs&libraries=places">
    </script> 
    <script src="maps.js"></script>
    
    <script src="mytrip.js"></script>

    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
    </script>
  
</body>

</html>