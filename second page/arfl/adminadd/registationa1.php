<?php include("connection.php"); ?>

<?php 
   if ($_POST['registers']){
    $fname    = $_POST['fname'];
    $lname    = $_POST['lname'];
    $px       = $_POST['password'];
    $cpw      = $_POST['conpassword'];
    $gender   = $_POST['gender'];
    $branch   = $_POST['branch'] ;
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];

    if($fname !=" " && $lname !=" " && $px !=" " && $cpw  !="" && $gender !=" " &&
    $branch !=" " && $email !=" " && $phone !=" " && $address !=" " && $px=$cpw ){
        

    $query = "INSERT INTO ADMIN VALUES('$fname','$lname','$px','$cpw','$gender','$branch','$email','$phone','$address')";
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
