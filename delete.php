
<?php
include 'conn.php';
if(isset($_GET['deleteid'])){

    $id=$_GET['deleteid'];
    if(isset($_GET['confirm'])){
        $confirm=$_GET['confirm'];
        if($confirm == "yes"){
            $sql="UPDATE `login` SET is_deleted=1 WHERE id=$id";
            $result=mysqli_query($con,$sql);
            if($result){
                header('location: table.php');
            }else{
                echo '<script>alert ("Data not deleted");</script>';
            }
        }else{
            header('location: table.php');
        }
    }else{
        echo '<script>
                if(confirm("Are you sure you want to delete?")){
                    window.location.href = "delete.php?deleteid='.$id.'&confirm=yes";
                }else{
                    window.location.href = "table.php";
                }
             </script>';
    }
}
?>