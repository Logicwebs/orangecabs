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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Orange Cabs | Profile</title>
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


        .close {
            float: right;
        font-size: 2rem;
        margin-bottom: 1rem;
        margin-right: 2rem;
        margin-top: .5rem;
        cursor: pointer;
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

        .fas {
            margin-top: -2.3rem;
        }

        .heading-secondary {
            color: #fff;
        }

        .far {
            font-size:1.5rem;
            color:#fff;
            /* background:linear-gradient(to right,#ffb605, #ffb605); */
            
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

    /* .profile{
        border-radius: 50%;
        width:100px;
        height:100px;
    } */

    [type=reset], [type=submit], button, html [type=button] {
        -webkit-appearance: none;
    }

    .modal-content {
        color:#fff;
    }

       #messageOutput {
        margin-bottom: 10rem;
    }

      table {
    border: 1px solid #ccc;
    width: 100%;
    margin:0;
    padding:0;
    border-collapse: collapse;
    border-spacing: 0;
  }

  table tr {
    border: 1px solid #ddd;
    padding: 5px;
  }

  table th, table td {
    padding: 10px;
    text-align: left;
    color: #fff;
  }

  table th {
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 1px;
  }

  @media screen and (max-width: 600px) {

    table {
      border: 0;
    }

    table thead {
      display: none;
    }

    table tr {
      margin-bottom: 10px;
      display: block;
      border-bottom: 2px solid #ddd;
    }

    table td {
      display: block;
      text-align: right;
      font-size: 13px;
      border-bottom: 1px dotted #ccc;
    }

    table td:last-child {
      border-bottom: 0;
    }

    table td:before {
      content: attr(data-label);
      float: left;
      text-transform: uppercase;
      font-weight: bold;
    }
  }

    .profile-content{
        /* display: flex; */
    }

    .popup__left{
        width: 40%;
        margin: 0 auto;
    }
    .popup__right{
        text-align: left;
    }

    .edit-body {
    background: linear-gradient(to right,#ffb605, #11A0DC);
    }
    .edit-header{background: linear-gradient(to right,#ffb605, #ffb605);}
    .edittripfooter {
        margin-bottom: 0rem;
        background: linear-gradient(to right,#11A0DC, #11A0DC);
    }

    .profile {
        width: 100px;height:100px;border-radius:50%;
    }
    .profile img {width:100%;}
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

           <li class="nav-item">
              <a class="nav-link" href="bookings.php">SEARCH<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="maintrips.php">BOOK NOW </a>
            </li>
            <li class="nav-item active">
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

            <div class="unable-notification" style="display:none;">
                <span class="tooltip-toggle" aria-label="Unable notification" tabindex="0" id="notification" style="float:right">
                    <i class="far fa-bell"></i>
                </span>
            </div>
        </div>

      </nav>

        <div class="container" style="margin-top:6rem;">
            <div class="row">

                <div class="col-md-6">
                    <!-- upload picture -->
                    <h4 class="heading-secondary">Change your profile picture</h4>
                    <form action="#" class="form" id="profilepictureform" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col profile">

                                <?php 
                                    if(empty($profile)){

                                        echo "<img src='profilepicture/carprofile.png' alt='Photo user' class='popup__img' id='imagePreview'>";
                                    
                                    }else{

                                        echo "<img src='$profile' class='popup__img' id='imagePreview'>";


                                    }
                                ?>
                            </div>

                            <div class="col">

                                <!-- message alert -->
                                <div id="updatepicturemessage"></div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="picture">Select a picture</label>
                                    <input type="file" class="" id="picture" placeholder="upload new picture" name="picture">
                                    <!-- <i class="fas fa-cloud-upload-alt icon-uploadpicture"></i> -->
                                </div>
                                

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="upload" value="Upload">
                                </div>
                            </div>
                        </div>

                        
                    </form>     
                </div>

                <div class="col-md-6">

                    <div class="profile-content">
                        <div class="popup__right">
                            <h4 class="heading-secondary u-margin-bottom-small">Profile Settings</h4>
                            <h3 class="heading-tertiary u-margin-bottom-small"></h3>
                            <div class="popup__text">
                                <table class="popup__table">
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $username; ?></td>
                                        <td><a href="#updateusernameModal" data-toggle="modal"><i class="far fa-edit"></i></a></td>
                                    </tr>

                                    <tr>
                                        <td>Contact Number</td>
                                        <td><?php echo $mobile; ?></td>
                                        <td><a href="#updatecontactnumberModal" data-toggle="modal"><i class="far fa-edit"></i></a></td>
                                    </tr>

                                    <tr>
                                        <td>Address Mail</td>
                                        <td><?php echo $email; ?></td>
                                        <td><a href="#updateemailModal" data-toggle="modal"><i class="far fa-edit"></i></a></td>
                                        
                                    </tr>

                                    <tr>
                                        <td>Password</td>
                                        <td>Hidden</td>
                                        <td><a href="#updatepasswordModal" data-toggle="modal"><i class="far fa-edit"></i></a></td>
                                    </tr>

                                    <tr>
                                        <td>Payment Method</td>
                                        <td>PayPal</td>
                                        <td><a href="#updatepaymentmethodModal" data-toggle="modal"><i class="far fa-edit"></i></a></td>
                                    </tr>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                

            </div>

               <!-- update password -->
            <form action="#" class="form" id="updatepasswordform">
                <div class="modal fade" id="updatepasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header edit-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update password:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body edit-body">
                                <div class="form-group">
                                    <label for="currentpassword" class="col-form-label">Enter Current Password:</label>
                                    <input type="password" class="form-control" id="currentpassword" name="currentpassword">
                                </div>
                                <div class="form-group">
                                    <label for="newpassword" class="col-form-label">Choose New password:</label>
                                    <input type="password" class="form-control" id="newpassword" name="newpassword">
                                </div>

                                <div class="form-group">
                                    <label for="confirmpassword" class="col-form-label">Confirm password:</label>
                                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                                </div>
                            </div>
                            <div class="modal-footer edittripfooter">
                                <button type="button" class="btn btn-primary" name="updatepassword" id="updatepassword">Update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <!-- contact number -->
            <form action="#" class="form" id="updatemobilenumber">
                <div class="modal fade" id="updatecontactnumberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header edit-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update your contact number:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body edit-body">
                                <div class="form-group">
                                    <label for="mobilenumber" class="col-form-label">Enter New number:</label>
                                    <input type="text" class="form-control" id="mobilenumber" name="mobilenumber">
                                </div>
                            </div>
                            <div class="modal-footer edittripfooter">
                                <button type="button" class="btn btn-primary" name="Updatemobile" id="Updatemobile">Update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- update payment method -->
            <form action="#" class="form" id="updatemethodpayment">
                <div class="modal fade" id="updatepaymentmethodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header edit-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update your payment method:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body edit-body">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment" id="creditcardupdate" value="cc">
                                    <label class="form-check-label" for="creditcardupdate">
                                        Credit Card <i class="fab fa-cc-visa"></i><i class="fab fa-cc-mastercard"></i>
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment" id="paypal" value="p">
                                    <label class="form-check-label" for="paypal">PayPal <i class="fab fa-cc-paypal"></i></label>
                                </div>

                                <!-- <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment" id="inlineRadio3" value="option3" disabled>
                                    <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
                                </div> -->
                            </div>
                            <div class="modal-footer edittripfooter">
                                <button type="button" class="btn btn-primary" name="updatepayment" id="updatepayment">Update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <!-- update fullname -->
            <form action="#" class="form" id="updateusernameform">
                <div class="modal fade" id="updateusernameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header edit-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update  Username:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body edit-body">
                                <div class="form-group">
                                    <label for="username" class="col-form-label">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                            </div>
                            <div class="modal-footer edittripfooter">
                                <button type="button" class="btn btn-primary" name="Updateusername" id="Updateusername">Update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- update email -->
            <form action="#" class="form" id="updateemailform">
                <div class="modal fade" id="updateemailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header edit-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update  Email:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body edit-body">
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email Address:</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="modal-footer edittripfooter">
                                <button type="button" class="btn btn-primary" name="Updateemail" id="Updateemail">Update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

     <div>
        <?php include('../inc/footer.php');?> 
     </div>

    <!-- Optional JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <script src="profile.js"></script>

</body>
</html>