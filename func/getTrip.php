<?php
session_start();
include('connection.php');

//get the user_id
$user_id = $_SESSION['user_id'];

//run a query to look for notes corresponding to user_id
$sql = "SELECT * FROM trips WHERE user_id ='$user_id' AND trips.date >= DATE(NOW()) AND is_delete='0' AND status_pay='unpaid' ORDER BY trip_id DESC";

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

            echo "
            
                <div class='row loadtripbd'>

                    <div class='col-md-5'>
                        <div><span class='tripalldb departure'>Pick up point&nbsp;:&nbsp;&nbsp;</span> $origine.</div>
                        <div><span class='tripalldb departure'>Drop of point&nbsp;:&nbsp;&nbsp;</span> $destination.</div>
                        <div><span class='tripalldb date'>Date & time&nbsp;:&nbsp;&nbsp;</span>$date &nbsp;.</div>
                    </div> 

                    <div class='col-md-3'>
                        <div><span class='tripalldb price'>Price&nbsp;:&nbsp;&nbsp;R</span>$price.</div>
                        <div><span class='tripalldb amountofriders'>Amount of riders&nbsp;:&nbsp;&nbsp;</span>$amountofriders.</div>
                        <div><span class='tripalldb nameofonerider'>Name of one rider&nbsp;:&nbsp;&nbsp;</span>$nameofonerider.</div>
                    </div>

                    <div class='col-md-4'>
                        <button class='btn btn-success btn-lg gettripbtn' data-toggle='modal' data-target='#edittripModal' data-trip_id='$trip_id'>Edit Trip</button>
                        &nbsp;&nbsp;<div  data-trip_id= $trip_id'  id='paypal-button'>Pay and go!</div>
                    
                    </div>

                </div>
            
            ";
            echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
        }
       
    }else{
        echo '<div class="alert warning">You have not created any trips yet!</div>'. mysqli_error($link); exit;
    }
    
}
else{  

    echo '<div class="alert warning">An error occured!</div>'; exit;

}

?>
                          

<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'demo_sandbox_client_id',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },
    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '0.01',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

</script>


