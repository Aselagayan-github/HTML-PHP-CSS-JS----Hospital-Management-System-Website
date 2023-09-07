<?php
include("connection.php");

$Email = $_GET['Email'];

// Check if the email exists in the database
$query = "SELECT * FROM PATIENT WHERE Email = '$Email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Process the form submission
    if (isset($_POST['delete'])) {
        // Delete the record
        $deleteQuery = "DELETE FROM PATIENT WHERE Email = '$Email'";
        if (mysqli_query($conn, $deleteQuery)) {
            echo "Record deleted successfully.";
            // Additional logic or redirection after successful deletion
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
} else {
    echo "Email not found.";
}

mysqli_close($conn);
?>

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
        <link rel="stylesheet" href="registationp.css" type="text/css">
    </head>

    <body>
        

        <div class="regiform" id="regiform">

            <form  method="post">
            <h1>DELETE Form</h1>

            <div class="form">
                <div class="input_field">
                     <label>First name </label>
                     <input type="text" value="<?php echo ['fname']; ?>" class="input" name="fname">
                </div>
            </div>

            <div class="form">
                <div class="input_field"> 
                     <label>Last name </label>
                     <input type="text" value="<?php echo ['lname']; ?>" class="input" name="lname">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Id No </label>
                     <input type="text" value="<?php echo ['Id']; ?>" class="input" name="Id">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Date of Birth </label>
                     <input type="text" value="<?php echo ['bd']; ?>" class="input" name="bd">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Password </label>
                     <input type="Password" value="<?php echo ['Password']; ?>" class="input" name="Password">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Conform Password </label>
                     <input type="Password" value="<?php echo ['conpassword']; ?>" class="input" name="conpassword">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Marital Status </label>
                     <div class="custom_selectm">
                        <select name="Marital"> 
                            <option value="Not Selected">Please Select</option>
                            <option value= "Single">Single</option>
                            <option Value= "Married">Married</option>
                            <option Value= "Divorced">Divorced</option>
                            <option Value= "Legeally Separated">Legeally Separated</option>
                        </select>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Gender </label>
                     <div class="custom_selectg">
                        <select name="gender"> 
                        <option value="Not Selected" <?php if(['gender'] == 'Select Gender') echo "selected"; ?>>Select Gender</option>
                            <option value="Male" <?php if(['gender'] == 'Male') echo "selected"; ?>>Male</option>
                            <option value="Female" <?php if(['gender'] == 'Female') echo "selected"; ?>>Female</option>
                        </select>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Branch </label>
                     <div class="custom_select">
                        <select name="branch"> 
                        <option value="Not Selected" <?php if(['branch'] == 'Select Branch') echo "selected"; ?>>Select Branch</option>
                            <option value="Galle" <?php if(['branch'] == 'Galle') echo "selected"; ?>>Galle</option>
                            <option value="Jaffna" <?php if(['branch'] == 'Jaffna') echo "selected"; ?>>Jaffna</option>
                            <option value="Kurunagala" <?php if(['branch'] == 'Kurunagala') echo "selected"; ?>>Kurunagala</option>
                        </select>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Email Address </label>
                     <input type="text" value="<?php echo ['email']; ?>" class="input" name="email">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Phone Number </label>
                     <input type="text" value="<?php echo ['phone']; ?>" class="input" name="phone">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                     <label>Address </label>
                     <textarea class="textarea" value="<?php echo ['address']; ?>" name="address"></textarea>
                </div>
            </div>

            <div class="input_field_terms">
                <label class="check">
                     <input type="checkbox">
                     <span class="checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p> 
                </div>
            </div> 

            <div class="input_field">
                <input type="submit" value="DELETE" class="btn" name="delete">
            </div>

            

            </form>
        </div>
    </body>
</html>