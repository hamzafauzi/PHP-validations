<?php
session_start();
include "conn.php";

if(!empty($_SESSION["id"])){
    $id= $_SESSION["id"];
    $result= mysqli_query($con, "SELECT * FROM `login` WHERE id=$id");
    $row= mysqli_fetch_assoc($result);
}
else{
    header("Location: login.php");
}
?>
<!doctype html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    


<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  </head>
  <body>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
      
      
    </tr>
  </thead>
  <tbody>
   
<?php



$sql="Select * from `login` WHERE is_deleted != 1"; //"AND id!= $id" is used to hide the id in which you are logging in from
$result=mysqli_query($con,$sql);
if($result){
  if( mysqli_num_rows($result) == 0) echo '<script>alert ("No records to show);</script>';
  while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $password=$row['password'];

        
        
      
        echo ' <tr>
        
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$password.'</td>
        <td>

<button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-dark"> Update</a></button>
<button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-dark"> Delete</a></button>

</td>
        
        </tr>';
        

 
    }
}

?>



  </tbody>
</table>

<!-- Modal -->
<form action="delete.php" method="POST">
<div class="modal fade" name="deletefunction" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Are you sure you want to delete?</h5>
    
      </div>
    
      <div class="modal-footer">
      <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
  <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
</div>

      </div>
    </div>
  </div>
</div>
</form>




<script>
$(document).ready(function(){
  $('.delete_btn').click(function(e){
    e.preventDefault();

    var id = $(this).data('id'); // Extracting the record ID from onclick attribute
    console.log(id);

    // Set the ID of the record to be deleted in the modal's Delete button
    $('#confirmDeleteButton').attr('data-id', id);

    // Show the modal
    $('#confirmDeleteModal').modal('show');
  });

  $('#confirmDeleteButton').click(function(e){
    e.preventDefault();

    var id = $(this).data('id'); // Extracting the record ID from the Delete button's data-id attribute
    console.log(id);

    // You can now use this ID to perform the delete operation on the record

    // Hide the modal
    $('#confirmDeleteModal').modal('hide');
  });
});
</script>


</script>  
  
</body>

<br>

<a href= "logout.php">Log Out</a>

</div>
</html>