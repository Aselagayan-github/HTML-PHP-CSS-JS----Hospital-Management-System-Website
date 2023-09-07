<?php include("connection.php"); ?>

<?php 
   if ($_POST['registers']){
    $fname    = $_POST['fname'];
    $lname    = $_POST['lname'];
    $Id       = $_POST['Id'];
    $Bd       = $_POST['bd'];
    $px       = $_POST['password'];
    $cpw      = $_POST['conpassword'];
    $Marital  = $_POST['Marital'];
    $gender   = $_POST['gender'];
    $branch   = $_POST['branch'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];

    if($fname !=" " && $lname !=" " && $Id !=" "  &&  $Bd !=" " && $px !=" " && $cpw !=" " && $Marital !=" " && $gender !=" " &&
    $branch !=" " && $email !=" " && $phone !=" " && $address !=" " && $px=$cpw ){
        

    $query = "INSERT INTO  PATIENT VALUES('$fname','$lname','$Id','$Bd','$px','$cpw','$Marital','$gender','$branch','$email','$phone','$address')";
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