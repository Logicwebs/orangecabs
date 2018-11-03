<?php 

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location:../index.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/main.css" />

  <link rel="shortcut icon" type="image/ico" href="../favicon.ico" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Orange cabs | Chat</title>
</head>

<body class="grey lighten-4">
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

  <nav class="blue darken-2">
    <div class="container">
      <div class="nav-wrapper">
        <a href="index.php" class="brand-logo">OrangeMyAdmin</a>
        <a href="#" data-activates="side-nav" class="button-collapse show-on-large right">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li>
            <a href="index.php">Dashboard</a>
          </li>
          <li>
            <a href="bookings.php">Bookings</a>
          </li>
          <li>
            <a href="cars.php">Cars</a>
          </li>
          <li class="active">
            <a href="chat.php">Chat</a>
          </li>
          <li>
            <a href="users.php">Users</a>
          </li>
        </ul>
        <!-- Side nav -->
        <ul id="side-nav" class="side-nav">
          <li>
            <div class="user-view">
              <div class="background">
                <img src="img/ocean.jpg" alt="">
              </div>
              <a href="#">
              <?php 
                    if (empty($profile)) {

                        echo "<img src='../func/profilepicture/carprofile.png'  class='circle'>";

                    } else {

                        echo "<img src='$profile' class='circle'>";


                    }
                    ?>
              </a>
              <a href="#">
                <span class="name white-text"><?php echo $username;?></span>
              </a>
              <a href="#">
                <span class="email white-text"><?=$email;?></span>
              </a>
            </div>
          </li>
          <li>
            <a href="index.php">
              <i class="material-icons">dashboard</i> Dashboard</a>
          </li>
          <li>
            <a href="bookings.php">Bookings</a>
          </li>
          <li>
            <a href="cars.php">Cars</a>
          </li>
          <li>
            <a href="chat.php">Chat</a>
          </li>
          <li>
            <a href="users.php">Users</a>
          </li>
          <li>
            <div class="divider"></div>
          </li>
          <li>
            <a class="subheader">Account Controls</a>
          </li>
          <li>
            <a href="../index.php?logout=1" class="waves-effect">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Section: Comments -->
  <section class="section section-comments grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Comments</span>
              <table class="striped">
                <tbody>
                  <tr>
                    <td width="70">
                      <img src="img/person1.jpg" alt="" class="responsive-img circle" style="width: 40px;margin-left:10px;">
                    </td>
                    <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore, nostrum!</td>
                    <td>
                      <a href="#!" class="green-text">
                        <i class="material-icons">done</i>
                      </a>
                      <a href="#!" class="red-text">
                        <i class="material-icons">close</i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td width="70">
                      <img src="img/person2.jpg" alt="" class="responsive-img circle" style="width: 40px;margin-left:10px;">
                    </td>
                    <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore, nostrum!</td>
                    <td>
                      <a href="#!" class="green-text">
                        <i class="material-icons">done</i>
                      </a>
                      <a href="#!" class="red-text">
                        <i class="material-icons">close</i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td width="70">
                      <img src="img/person3.jpg" alt="" class="responsive-img circle" style="width: 40px;margin-left:10px;">
                    </td>
                    <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore, nostrum!</td>
                    <td>
                      <a href="#!" class="green-text">
                        <i class="material-icons">done</i>
                      </a>
                      <a href="#!" class="red-text">
                        <i class="material-icons">close</i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td width="70">
                      <img src="img/person4.jpg" alt="" class="responsive-img circle" style="width: 40px;margin-left:10px;">
                    </td>
                    <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore, nostrum!</td>
                    <td>
                      <a href="#!" class="green-text">
                        <i class="material-icons">done</i>
                      </a>
                      <a href="#!" class="red-text">
                        <i class="material-icons">close</i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-action">
              <ul class="pagination">
                <li class="disabled">
                  <a href="#!" class="blue-text">
                    <i class="material-icons">chevron_left</i>
                  </a>
                </li>
                <li class="active blue lighten-2">
                  <a href="#!" class="white-text">1</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">2</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">3</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">4</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">5</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">
                    <i class="material-icons">chevron_right</i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

     <!-- Footer -->
     <footer class="section blue darken-2 white-text center">
    <p>Orange cabs MyAdmin Copyright &copy; <script>
                document.write((new Date()).getFullYear());
            </script></p>
  </footer>

  <!-- Preloader -->
  <div class="loader preloader-wrapper big active">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div>
      <div class="gap-patch">
        <div class="circle"></div>
      </div>
      <div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>

  <script>
    // Hide Sections
    $('.section').hide();

    setTimeout(function () {
      $(document).ready(function () {
        // Show sections
        $('.section').fadeIn();

        // Hide preloader
        $('.loader').fadeOut();

        //Init Side nav
        $('.button-collapse').sideNav();

        // Init Modal
        $('.modal').modal();

      });
    }, 1000);
  </script>
</body>

</html>