<?php include("connection.php"); ?>


<?php 
   if ($_POST['registers']){
    $fname    = $_POST['fname'];
    $Id       = $_POST['Id'];
    $px       = $_POST['password'];
    $cpw      = $_POST['conpassword'];
    $gender   = $_POST['gender'];
    $branch   = $_POST['branch'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $ds       = $_POST['ds'];

    if($fname !=" " && $Id !=" " && $px !=" " && $cpw  !="" && $gender !=" " &&
    $branch !=" " && $email !=" " && $phone !=" " && $ds !=" " && $px=$cpw ){
        

    $query = "INSERT INTO DOCTOR VALUES('$fname','$Id','$px','$cpw','$gender','$branch','$email','$phone','$ds')";
    $data = mysqli_query($conn,$query);

    if($data){
        echo "<script>alert('Registration Sucessfull')</script>";
    }    
    else{
        echo "<script>alert('Registration faild')</script>";
    }

    }
    else{
        echo "<script>alert ('Please fill the form')</script>";
    }
    }

?>