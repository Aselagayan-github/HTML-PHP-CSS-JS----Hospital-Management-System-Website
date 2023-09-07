<?php
include("connection.php");

$email = $_GET['email'];
$query = "SELECT * FROM ADMIN WHERE email = '$email'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $branch = $_POST["branch"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    // Update the database with the new data
    $sql = "UPDATE ADMIN SET
            fname = ?,
            lname = ?,
            password = ?,
            gender = ?,
            branch = ?,
            email = ?,
            phone = ?,
            address = ?
            WHERE email = ?";

    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "sssssssss", $firstName, $lastName, $password, $gender, $branch, $email, $phone, $address, $email);

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="update.css" type="text/css">
</head>
<body>
    <div class="regiform" id="regiform">
        <form method="post">
            <h1>UPDATE Form</h1>

            <div class="form">
                <div class="input_field">
                    <label>First name</label>
                    <input type="text" value="<?php echo $result['fname']; ?>" class="input" name="fname">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Last name</label>
                    <input type="text" value="<?php echo $result['lname']; ?>" class="input```html
name="lname">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" value="<?php echo $result['password']; ?>" class="input" name="password">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" value="<?php echo $result['cpassword']; ?>" class="input" name="conpassword">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Gender</label>
                    <div class="custom_selectg">
                        <select name="gender">
                            <option value="Not Selected" <?php if($result['gender'] == 'Select Gender') echo "selected"; ?>>Select Gender</option>
                            <option value="Male" <?php if($result['gender'] == 'Male') echo "selected"; ?>>Male</option>
                            <option value="Female" <?php if($result['gender'] == 'Female') echo "selected"; ?>>Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Branch</label>
                    <div class="custom_select">
                        <select name="branch">
                            <option value="Not Selected" <?php if($result['branch'] == 'Select Branch') echo "selected"; ?>>Select Branch</option>
                            <option value="Galle" <?php if($result['branch'] == 'Galle') echo "selected"; ?>>Galle</option>
                            <option value="Jaffna" <?php if($result['branch'] == 'Jaffna') echo "selected"; ?>>Jaffna</option>
                            <option value="Kurunagala" <?php if($result['branch'] == 'Kurunagala') echo "selected"; ?>>Kurunagala</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Email Address</label>
                    <input type="text" value="<?php echo $result['email']; ?>" class="input" name="email">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" value="<?php echo $result['phone']; ?>" class="input" name="phone">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Address</label>
                    <textarea class="textarea" name="address"><?php echo $result['address']; ?></textarea>
                </div>
            </div>

            <div class="input_field_terms">
                <label class="check">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p>
            </div>

            <div class="input_field">
                <input type="submit" value="UPDATE DETAILS" class="btn" name="update">
            </div>
        </form>
    </div>
</body>
</html>
