<?php
include("connection.php");

$email = $_GET['email'];
$query = "SELECT * FROM APOI WHERE email = '$email'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $firstName = $_POST["fname"];
    $id = $_POST["Id"];
    $Birthday = $_POST["bd"];
    $gender = $_POST["gender"];
    $branch = $_POST["branch"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    

    // Update the database with the new data
    $sql = "UPDATE APOI SET
            fname = ?,
            Id = ?,
            bd = ?,
            gender = ?,
            branch = ?,
            email = ?,
            phone = ?,
            WHERE email = ?";

    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "sssssssss", $firstName, $id, $Birthday, $gender, $branch, $email, $phone, $email);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
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
        <link rel="stylesheet" href="apoin.css" type="text/css">
    </head>

    <body>
        

        <div class="regiform" id="regiform">

            <form  method="post">
            <h1>Delete Form</h1>

            <div class="form">
                <div class="input_field">
                     <label> Name </label>
                     <input type="text" value="<?php echo ['fname']; ?>" class="input" name="fname">
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

            

            <div class="input_field">
                <input type="submit" value="UPDATE" class="btn" name="update">
            </div>

            

            </form>
        </div>
    </body>
</html>

