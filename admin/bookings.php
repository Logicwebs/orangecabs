<?php 

session_start();

include('../func/connection.php');

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
  <title>Orange cabs | Users</title>

  <style>
    /* // [Fix] Text inputs custom error message */
    input[type=text],
    input[type=password],
    input[type=email],
    input[type=url],
    input[type=time],
    input[type=date],
    input[type=datetime-local],
    input[type=tel],
    input[type=number],
    input[type=search],
    textarea.materialize-textarea {
      &.valid + label:after,
      &.invalid + label:after,
      &:focus.valid + label:after,
      &:focus.invalid + label:after {
        white-space: pre;
      }
      &.empty {
        &:not(:focus).valid + label:after,
        &:not(:focus).invalid + label:after {
          top: 2.8rem;
          
        } 
      }
    }
  </style>
</head>

<body class="grey lighten-4">
    <?php 

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
          <li class="active">
            <a href="index.php">Dashboard</a>
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
 
  <!-- count visitors and users -->
  <?php 
    $sql = "SELECT COUNT(*) FROM users";
    $result = mysqli_query($link,$sql);
    $rows = mysqli_fetch_row($result);
    // return $rows[0];
    $number_of_users = $rows[0];
  ?>

  <!-- count bookings riders -->
  <?php 
    $sql = "SELECT COUNT(*) FROM trips";
    $result = mysqli_query($link,$sql);
    $rows = mysqli_fetch_row($result);
    // return $rows[0];
    $number_of_bookings = $rows[0];
  ?>
  <!-- Section: Stats -->
  <section class="section section-stats center">
    <div class="row">
      <div class="col s12 m6 l3">
        <div class="card-panel blue lighten-1 white-text center">
          <i class="material-icons medium">insert_emoticon</i>
          <h5>Monthly Bookings</h5>
          <h3 class="count">28300</h3>
          <div class="progress grey lighten-1">
            <div class="determinate white" style="width: 40%;"></div>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card-panel center">
          <i class="material-icons medium">mode_edit</i>
          <h5>Bookings Riders</h5>
          <h3 class="count"><?=$number_of_bookings;?></h3>
          <div class="progress grey lighten-1">
            <div class="determinate blue lighten-1" style="width: 20%;"></div>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card-panel blue lighten-1 white-text center">
          <i class="material-icons medium">mode_comment</i>
          <h5>Chat | Message</h5>
          <h3 class="count">1200</h3>
          <div class="progress grey lighten-1">
            <div class="determinate white" style="width: 40%;"></div>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card-panel center">
          <i class="material-icons medium">supervisor_account</i>
          <h5>Users</h5>
          <h3 class="count"><?=$number_of_users;?></h3>
          <div class="progress grey lighten-1">
            <div class="determinate blue lighten-1" style="width: 10%;"></div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Section: Visitors -->
  <section class="section section-visitors blue lighten-4">

    <div class="row">
      <!-- maps -->
      <div class="col s12 m6 l8">
        <div class="card-panel">
          <div id="map" style="height: 300px; width: 100%;"></div>
        </div>
      </div>

      <!-- Last comment -->
      <div class="col s12 m6 l4">
        <ul class="collection with-header latest-comments">
          <li class="collection-header">
            <h5>Latest Message</h5>
          </li>
          <li class="collection-item avatar">
            <img src="img/person1.jpg" alt="" class="circle">
            <span class="title">John Doe</span>
            <p class="truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt minima dolor error laboriosam autem ad beatae
              explicabo pariatur maxime fuga sed quod quo voluptas, adipisci illum aspernatur est, fugit tempore.</p>
            <a href="" class="approve green-text">Approve</a> |
            <a href="" class="deny red-text">Deny</a>
          </li>
          <li class="collection-item avatar">
            <img src="img/person2.jpg" alt="" class="circle">
            <span class="title">Steve Smith</span>
            <p class="truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt minima dolor error laboriosam autem ad beatae
              explicabo pariatur maxime fuga sed quod quo voluptas, adipisci illum aspernatur est, fugit tempore.</p>
            <a href="" class="approve green-text">Approve</a> |
            <a href="" class="deny red-text">Deny</a>
          </li>
          <li class="collection-item avatar">
            <img src="img/person3.jpg" alt="" class="circle">
            <span class="title">Ellen Williams</span>
            <p class="truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt minima dolor error laboriosam autem ad beatae
              explicabo pariatur maxime fuga sed quod quo voluptas, adipisci illum aspernatur est, fugit tempore.</p>
            <a href="" class="approve green-text">Approve</a> |
            <a href="" class="deny red-text">Deny</a>
          </li>
        </ul>
      </div>

    </div>
    
  </section>

  <!-- Section: Recent Posts & Todos -->
  <section class="section section-recent">
    <div class="row">
      <div class="col s12 l8 m6">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Recent Bookings request</span>
            <table class="striped">
              <thead>
                <tr>
                <th>Num.</th>
                  <th>Location</th>
                  <th>Destination</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                <?php 

                  //run a query to look for notes corresponding to user_id
                  $sql = "SELECT * FROM trips WHERE trips.date >= DATE(NOW()) AND is_delete='0' AND status_pay='unpaid' ORDER BY trip_id DESC";

                  //shows trips or alert message
                  if($result = mysqli_query($link, $sql)){

                      if(mysqli_num_rows($result)>0){

                          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                              $origine = $row['departure'];
                              $destination = $row['destination'];
                              $amountofriders = $row['amountofriders'];
                              $nameofonerider = $row['nameofonerider'];
                              $price = $row['price'];
                              $date = date('D d M, Y h:i', strtotime($row['date']));
                              $trip_id = $row['trip_id'];
                              $status = $row['status_pay'];
                              $ppayment = $row['payment'];

                              echo "
                                <tr>
                                  <td>$trip_id</td>
                                  <td>$origine</td>
                                  <td>$destination</td>
                                  <td>$date</td>
                                  <td>$status</td>
                                  <td>
                                    <a href=\"details.html\" class=\"btn blue lighten-2\">Details</a>
                                  </td>
                                </tr>
                              
                              
                              ";
                          }
                        
                      }else{
                          echo '<div class="alert warning">You have not created any trips yet!</div>'. mysqli_error($link); exit;
                      }
                      
                  }
                  else{  

                      echo '<div class="alert warning">An error occured!</div>'; exit;

                  }

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Quick Todos</span>
            <form id="todo-form">
              <div class="input-field">
                <input id="todo" type="text" placeholder="Add Todo...">
              </div>
            </form>
            <ul class="collection todos">
              <li class="collection-item">
                <div>Todo One
                  <a href="#!" class="secondary-content delete">
                    <i class="material-icons">close</i>
                  </a>
                </div>
              </li>
              <li class="collection-item">
                <div>Todo Two
                  <a href="#!" class="secondary-content delete">
                    <i class="material-icons">close</i>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- Fixed Action Button -->
  <div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
      <i class="material-icons">add</i>
    </a>
    <ul>
      <li>
        <a href="#cars-modal" class="modal-trigger btn-floating blue">
          <i class="material-icons">directions_bus</i>
        </a>
      </li>

      <li>
        <a href="#driver-modal" class="modal-trigger btn-floating blue">
          <i class="material-icons">group_add</i>
        </a>
      </li>
    </ul>
  </div>

    <!-- Footer -->
    <footer class="section blue darken-2 white-text center">
    <p>Orange cabs MyAdmin Copyright &copy; <script>
                document.write((new Date()).getFullYear());
            </script></p>
  </footer>

  <!-- Add Cars Modal -->
  <form id="addcarsform">
    <div id="cars-modal" class="modal">
      <div class="modal-content">
        <h4>Add Cars</h4>
        <div id="addcarsResult"></div>
          <div class="input-field">
            <input type="text" id="title" name="title">
            <label for="title">Title</label>
          </div>
          <div class="input-field">
            <input type="text" id="mark_car" name="mark_car">
            <label for="title">Car brand</label>
          </div>
          <div class="input-field">
            <input type="number" id="seatavailable" name="seatavailable">
            <label for="title">Seat Available</label>
          </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn blue white-text">Add New Car</button>
          <a href="#!" class="modal-action modal-close btn grey white-text">close</a>
        </div>
      </div>
    </div>
  </form>

  <!-- Add driver Modal -->
  <form id="adddriverform">
    <div id="driver-modal" class="modal">
      <div class="modal-content">
        <h4>Add Driver</h4>
      
        <div id="adddriverResult"></div>
          <div class="input-field">
            <input type="text" id="username" name="username">
            <label for="name">Username</label>
          </div>
          <div class="input-field">
            <input type="email" id="email" name="email">
            <label for="email">Email</label>
          </div>
          <div class="input-field">
            <input type="number" id="mobile" name="mobile">
            <label for="password">Mobile Number</label>
          </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn blue white-text">Add Driver</button>
          <a href="#!" class="modal-action modal-close btn grey white-text">close</a>
        </div>
      </div>
    </div>
  </form>

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
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-1SZLcvFN_cxb2HXrmtf7EhfA2O94SUs&libraries=places">
  </script>
  <script src="js/chart.js"></script>
  <script src="admin.js"></script>
  <script src="../func/maps.js"></script>

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

        // Init Select
        $('select').material_select();

        // Counter
        $('.count').each(function () {
          $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
          }, {
              duration: 1000,
              easing: 'swing',
              step: function (now) {
                $(this).text(Math.ceil(now));
              }
            });
        });

        // Comments - Approve & Deny
        $('.approve').click(function (e) {
          Materialize.toast('Comment Approved', 3000);
          e.preventDefault();
        });
        $('.deny').click(function (e) {
          Materialize.toast('Comment Denied', 3000);
          e.preventDefault();
        });

        // Quick Todos
        $('#todo-form').submit(function (e) {
          const output = `<li class="collection-item">
                <div>${$('#todo').val()}
                  <a href="#!" class="secondary-content delete">
                    <i class="material-icons">close</i>
                  </a>
                </div>
              </li>`;

          $('.todos').append(output);

          Materialize.toast('Todo Added', 3000);

          e.preventDefault();
        });

        // Delete Todos
        $('.todos').on('click', '.delete', function (e) {
          $(this).parent().parent().remove();
          Materialize.toast('Todo Removed', 3000);

          e.preventDefault();
        });

        // CKEDITOR.replace('textarea');

      });
    }, 1000);

    $(document).ready(function(){
      $( '.input-field input' ).each(function(){
        ( $( this ).val()  == '' ) ? $( this ).addClass('empty') : $(this).removeClass('empty');
      });
      $( '.input-field input' ).on('focus blur ', function(){
        ( $( this ).val()  == '' ) ? $( this ).addClass('empty') : $(this).removeClass('empty');
      });
    });
  </script>
</body>

</html>