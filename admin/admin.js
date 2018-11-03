//Ajax Call for the add car form 
//Once the form is submitted
$("#addcarsform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "addcars.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#addcarsResult").html(data);
                // //hide modal
                
                setTimeout(function(){
                    $("#addcarsform")[0].reset();
                },3000);

                setTimeout(function(){
                    $("#addcarsResult").hide();
                },3000);

                // setTimeout(function(){
                //     $("#cars-modal").hide();
                // },3000);
            }
        },
        error: function(){
            $("#addcarsResult").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

//Ajax Call for the add driver form
//Once the form is submitted
$("#adddriverform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to login.php using AJAX
    $.ajax({
        url: "adddriver.php",
        type: "POST",
        data: datatopost,
        success: function(data){

            $("#adddriverResult").html(data);
               
                setTimeout(function(){
                    $("#adddriverform")[0].reset();
                },3000);

                setTimeout(function(){
                    $("#adddriverResult").hide();
                },3000);

                 // //hide modal
                // setTimeout(function(){
                //     $("#driver-modal").hide();
                // },3000);
        },
        error: function(){
            $("#adddriverResult").html("<div class='alert alert__danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }   
    });
});

