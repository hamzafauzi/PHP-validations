

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $("#registration-form").submit(function(event) {
                
                // Validate name
                var name = $("#name").val().trim();
                var nameRegex = /^[a-zA-Z\s]+$/; // Regular expression to match only alphabets and spaces

                  if (!nameRegex.test(name)) {
                    $("#name-error").text("Name can only contain letters and spaces.");
                    event.preventDefault();
                      } else if (name.length < 3) {
                      $("#name-error").text("Name must be at least 3 characters long.");
                         event.preventDefault();
                        } else {
                          $("#name-error").text("");
                        }

                
                // Validate email
                var email = $("#email").val().trim();
                if (!isValidEmail(email)) {
                    $("#email-error").text("Invalid email address.");
                    event.preventDefault();
                } else {
                    $("#email-error").text("");
                }

              // Validate password
              var password = $("#password").val();
              if (password.length < 8) {
                   $("#password-error").text("Password must be at least 8 characters long.");
                   event.preventDefault();
               } else {
                    $("#password-error").text("");
                      }

                

                
            });
            
            function isValidEmail(email) {
                var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return pattern.test(email);
            }

          
        });
    </script>
 

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    



<h1>Registration Form</h1>
<form action="" form id="registration-form" method="post" enctype="multipart/form-data">
    

    
<div class="row">
    <div class="mx-auto col-10 col-md-8 col-lg-6">
      <legend class="">Register</legend>
    
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="name">Name</label>
      <div class="controls">
        <input type="text" id="name" name="name" placeholder="" class="input-xlarge">
        <span id="name-error" class="error"></span>
      
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <span id="email-error" class="error"></span>
       
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <span id="password-error" class="error"></span>
       
       
      </div>
    </div>
 
    
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
      <button type="submit" id="submit" name="submit">Register</button> 
      </div>
      

    <a href="login.php">Already Registered? Login here</a>

    </div>
</div>
</form>
    </form>



</body>
</html>


<?php
$success=0;
$user=0;
include "conn.php";



if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    
    $sql="SELECT * FROM `login` WHERE email='$email'";

    $result=mysqli_query($con, $sql);
    if($result){
      $num=mysqli_num_rows($result);
      if($num>0){
      $user=1;
      }else{

        $sql= "insert into `login`(name,email,password) 
    values('$name', '$email', '$password')";
    $result= mysqli_query($con, $sql);
    if($result){
     $success=1;
     
     
    


    }else{
        die(mysqli_error($con));
    }

      }
    }
   


    
}

?>

<?php 

//alerts for the registration


if($user){

  echo '<div class="alert alert-danger" role="alert">
  User already exist!
</div>';
}
?>

<?php

if($success){

  echo '<div class="alert alert-success" role="alert">
  Congratualtions!! you have registered!
</div>';
}
?>