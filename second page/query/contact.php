<?php include("connection.php"); 


   if ($_POST['registers']){
    $fname    = $_POST['fname'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $massage  = $_POST['Massage'];

    if($fname !=" " &&  $email !=" " && $phone !=" " && $massage !=" "){
        

    $query = "INSERT INTO QUERY VALUES('$fname','$email','$phone','$massage')";
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