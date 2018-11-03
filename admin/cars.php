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
  <title>Orange cabs | cars</title>
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
          <li >
            <a href="index.php">Dashboard</a>
          </li>
          <li>
            <a href="bookings.php">Bookings</a>
          </li>
          <li class="active">
            <a href="cars.php">Cars</a>
          </li>
          <li>
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

  <!-- Section: Categories -->
  <section class="section section-categories grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Categories</span>
              <table class="striped">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Date Created</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Web Development</td>
                    <td>Jan 1, 2018</td>
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td>Graphic Design</td>
                    <td>Jan 2, 2018</td>
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td>Tech Gadgets</td>
                    <td>Jan 3, 2018</td>
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td>Other</td>
                    <td>Jan 5, 2018</td>
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
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

  <!-- Fixed Action Button -->
  <div class="fixed-action-btn">
    <a href="#category-modal" class="modal-trigger btn-floating btn-large red">
      <i class="material-icons">add</i>
    </a>
  </div>

  <!-- Add Category Modal -->
  <div id="category-modal" class="modal">
    <div class="modal-content">
      <h4>Add Category</h4>
      <form>
        <div class="input-field">
          <input type="text" id="title">
          <label for="title">Title</label>
        </div>
      </form>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close btn blue white-text">Submit</a>
      </div>
    </div>
  </div>

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