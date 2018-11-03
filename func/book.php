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

  <title>Orange Cabs | Bookings</title>
  <link rel="shortcut icon" type="image/ico" href="../favicon.ico" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">

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
    #map{height: 50vh; width: 100%; }

    .alert-dangerprofile {
        color:#fff;
        font-size:1.5rem;
        line-height:2.5rem;
        background-color:#dc3545;
        text-align: center;
        padding:2rem 2rem; 
        margin-top: 1rem;
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
    .footer {
        position: fixed;
        bottom: 0;
        width:100%;
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

    #allTrips,#done,.delete{
            display: none;
        }

    #done {float: right;clear: both;}

    #edit {
            float: right;
            clear: both;
            background-color: #11A0DC;
            color: white;
        }

        #tripPad {margin-top: 2rem;background: red;}
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
        }

        .submittrip {
            margin-left: -8rem;
            margin-top: 5rem;
            /* font-size: 1rem !important; */
        }

        .btn-cancel-trip {
        background: linear-gradient(to right, #777, #333);
        color: #fff;
        padding-right: 5rem;
        padding-left: 2rem;
        border: 0;
        /* text-align: left; */
    }

    .popup__canceltrip:link, .popup__canceltrip:visited {
        color: #777;
        position: absolute;
        top: 32.1rem;
        right: 2.5rem;
        padding: 1.3rem 1.8rem;
        font-size: 2rem;
        text-decoration: none;
        display: inline-block;
        transition: all .2s;
        line-height: 1;
    }

    .form__input-icon .fa-clock {
        margin-left: 0rem;
        margin-top: -2rem;
    }

    .icon-uploadpicture {
        top: 4.8rem !important;
    }

    .modal__content {
        top:40%;
    }

    .profile{
        border-radius: 50%;
    }
    .form-control-search {
  padding: 0.9rem 21.7rem;
    padding-left: 4.5rem;
}

.search-margin-top{
  margin-top: 0.9rem;
}
.footer {
        bottom: 0;
        width: 100%;
        position: fixed;
        
    }

       #messageOutput {
        margin-bottom: 10rem;
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

            // var_dump($profile);

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

            <!-- <li class="navbar__item">
                <a class="navbar__link"  href="search.php">SEARCH</a>
            </li> -->

            <li class="navbar__item">
                <a class="navbar__link "   href="profile.php">PROFILE</a>
            </li>

            <li class="navbar__item">
                <a class="navbar__link"  href="../help">HELP</a>
            </li>

            <li class="navbar__item">
                <a class="navbar__link active"  href="bookings.php">BOOK NOW</a>
            </li>

            <li class="navbar__item">
                <a class="navbar__link"  href="../func/maintrips.php">MY TRIP</a>
            </li>

            <li class="navbar__item">
                <a class="navbar__link profilelink"  href="#uploadpicture">
                    <?php 
                        if(empty($profile)){

                            echo "<img src='profilepicture/carprofile.png'  class='profile'>";
                        
                        }else{

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
    </nav>

    <div class="form-main-container">

            <form action="" method="" id="searchForm">

                <div id="form-area">
                    <div id="form-title">
                        Search a trip available
                    </div>

                    <div id="form-body" style="margin-left:1.3rem;">

                        <div>                           
                            <div class="col-2">
                                <input type="radio" class="form__radio-input" id="localtrip" name="trip" value="localtrip">
                                <label for="localtrip" class="form__radio-label">
                                <span class="form__radio-button"></span>
                                <span class="labeltile_radio">LOCAL <br>Up to 80km trips</span>
                                </label>

                            </div>
                            <div class="col-2">
                                <input type="radio" class="form__radio-input" id="regionaltrip" name="trip" value="regionaltrip">
                                <label for="regionaltrip" class="form__radio-label">
                                <span class="form__radio-button"></span>
                                <span>REGIONAL <br>80km + trips</span>
                                </label>

                            </div>
                        </div>

                        <div>
                            <div class="col-3">
                                <fieldset class="form-group form__input-icon">
                                <label class="form-label" for="pickuppoint"></label>
                                <input type="text" class="form-control-search" id="pickuppoint" placeholder="PICK UP POINT:" name="pickuppoint">
                                <i class="fas fa-map-marker-alt"></i>
                                </fieldset>
                            </div>

                            <div class="col-3">
                                <fieldset class="form-group form__input-icon">
                                    <label class="form-label" for="dropofpoint"></label>
                                    <input type="text" class="form-control-search" id="dropofpoint" placeholder="DROP-OFF POINT:" name="dropofpoint">
                                    <i class="fas fa-map-marker-alt"></i>
                                </fieldset>
                            </div>

                            <div class="col-3 search-margin-top">
                                <input type="submit"  id="calculateRoute" class="btnbook btn-inline btn-send" value="Search" name="search">
                            </div> 
                        
                        </div>

                    <div> 

                </div>

            </form>

            <div>
                <div class="col-12">
                    <div class="" id="map"></div>
                </div>
            </div>

            <div>
                <div class="col-12" >
                    <div id="messageOutput"></div>
                </div>
            </div>

    </div>

    <div class="pupup">
                <!-- upload picture -->
        <form action="#" class="form" id="profilepictureform" enctype="multipart/form-data">
            <div class="modal" id="uploadpicture">
                <div class="modal__content">
                <div class="popup__left">
                <?php 
                    if(empty($profile)){

                        echo "<img src='profilepicture/carprofile.png' alt='Photo user' class='popup__img' id='imagePreview'>";
                    
                    }else{

                        echo "<img src='$profile' class='popup__img' id='imagePreview'>";


                    }
                ?>
                        
                    <!-- message alert -->
            <div id="updatepicturemessage"></div>
                </div>
                <div class="popup__right">
                    <a href="bookings.php" class="popup__close">&times;</a>
                    <h2 class="heading-secondary">Upload new picture</h2>
                    <div class="popup__text">

                            <div class="col-3">
                                <fieldset class="form-group form__input-icon">
                                <label class="form-label" for="picture">Select a picture</label>
                                <input type="file" class="form-control" id="picture" placeholder="upload new picture" name="picture">
                                <i class="fas fa-cloud-upload-alt icon-uploadpicture"></i>
                                </fieldset>
                            </div>
                            
                            <div>
                                <div class="left-align">
                                    <input type="submit" class="btnbook btn-send" name="upload" value="Upload">
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </form>

        <!-- payment -->
        <form action="#" class="form" id="addpaymentmethod">
            <div class="modal" id="paymentinterface">
                <div class="modal__content">
                    <div class="row">
                        <div class="book">
                            <div class="book__form">
                                <a href="" class="modal__close">&times;</a>
                            
                                    <div class="u-margin-bottom-medium-2">
                                        <h3 class="heading-secondary">
                                            Add a new payement Method
                                        </h3>
                                    </div>

                                    <div class="form__group u-margin-bottom-medium">
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

                                        <div class="form__radio-group">
                                        
                                            <input type="radio" class="form__radio-input" id="promocode" name="promocode"
                                            value="">
                                            
                                            <label for="promocode" class="form__radio-label">
                                            <span class="form__radio-button"></span>
                                                promo code<i class="fas fa-qrcode"></i>
                                            </label>
                                        </div>
            
                                    </div>

                                    <div class="form__group">
                                        <input type="text" class="form__input" placeholder="Card number" id="cardnumber"
                                            required>
                                        <label for="cardnumber" class="form__label">Card number The 16 digits on front of your
                                            card</label>
                                    </div>

                                    <div class="form__group">
                                        <input type="date" class="form__input" placeholder="" id="dateexpirationcard" required>
                                        <label for="dateexpirationcard" class="form__label">Expiration date</label>
                                    </div>

                                    <div class="form__group">
                                        <input type="text" class="form__input" placeholder="The last 3 digits displayed on the back of your card"
                                            id="cvv2" required>
                                        <label for="cvv2" class="form__label">CVV2 / CVCV2</label>
                                    </div>

                                    <div class="form__group">
                                        <input type="text" class="form__input" placeholder="Full Name on a Card" id="fullnameuserCard"
                                            required>
                                        <label for="fullnameuserCard" class="form__label">Full Name on a Card</label>
                                    </div>

                                    <div class="form__group">
                                        <button class="btn btn--orange">Complete transaction &rarr;</button>
                                        <a href="bookings.php" class="btn btn--default  modal__cancelpay" role="button">Cancel</a>
                                    </div>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


  <?php include("../inc/footer.php");?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-1SZLcvFN_cxb2HXrmtf7EhfA2O94SUs&libraries=places">
    </script> 
    <script src="maps.js"></script>

    <script src="profile.js"></script>


    <script>

        $(".menu").click(function(){
        $(".navbar__list").toggle('speed');
        });

        $(".close").click(function(){
        $("#alert").hide();
        });

    </script>

</body>

</html>