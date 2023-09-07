<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-device-width ,initial-scale=1.0">
        <title>Registation page</title>

        <!--front awesome cdn link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!--coustom css-->
        <link rel="stylesheet" href="apoin.css" type="text/css">
    </head>

    <body>
        

        <div class="regiform" id="regiform">

            <form  method="post">
            <h1>Appoinment Form</h1>

            <div class="form">
                <div class="input_field">
                     <label> Name </label>
                     <input type="text" class="input" name="fname">
                </div>
            </div>

            

            <div class="form">
                <div class="input_field">
                     <label>Id No </label>
                     <input type="text" class="input" name="Id">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Date of Birth </label>
                     <input type="text" class="input" name="bd">
                </div>
            </div>

           

            

            <div class="form">
                <div class="input_field">
                     <label>Gender </label>
                     <div class="custom_selectg">
                        <select name="gender"> 
                            <option value="Not Selected">Select Gender</option>
                            <option value= "Male">Male</option>
                            <option Value= "Female">Female</option>
                        </select>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Branch </label>
                     <div class="custom_select">
                        <select name="branch"> 
                            <option value="Not Selected">Select Branch</option>
                            <option value= "Galle">Galle</option>
                            <option value= "Jaffna">Jaffna</option>
                            <option value= "Kurunagala">Kurunagala</option>
                        </select>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Email Address </label>
                     <input type="text" class="input" name="email">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Phone Number </label>
                     <input type="text" class="input" name="phone">
                </div>
            </div>

            

            <div class="input_field">
                <input type="submit" value="SUBMIT" class="btn" name="submit">
            </div>

            

            </form>
        </div>
    </body>
</html>

<?php include("connection.php"); ?>

<?php 
   if ($_POST['submit']){
    $fname    = $_POST['fname'];
    $Id       = $_POST['Id'];
    $Bd       = $_POST['bd'];
    $gender   = $_POST['gender'];
    $branch   = $_POST['branch'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];

    if($fname !=" " &&  $Id !=" "  &&  $Bd !=" " && $Marital !=" " && $gender !=" " &&
    $branch !=" " && $email !=" " && $phone !=" " ){
        

    $query = "INSERT INTO  APOI VALUES('$fname','$Id','$Bd','$gender','$branch','$email','$phone')";
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