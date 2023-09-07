<?php
include("connection.php");

$email = $_GET['email'];

// Check if the email exists in the database
$query = "SELECT * FROM ADMIN WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Process the form submission
    if (isset($_POST['delete'])) {
        // Delete the record
        $deleteQuery = "DELETE FROM ADMIN WHERE email = '$email'";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="registationa1.css" type="text/css">
</head>
<body>
    <div class="regiform" id="regiform">
        <form method="post">
            <h1>DELETE Form</h1>

            <div class="form">
                <div class="input_field">
                    <label>First name</label>
                    <input type="text" value="<?php echo $row['fname']; ?>" class="input" name="fname" readonly>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Last name</label>
                    <input type="text" value="<?php echo $row['lname']; ?>" class="input" name="lname" readonly>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" value="<?php echo $row['password']; ?>" class="input" name="password" readonly>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" value="<?php echo $row['cpassword']; ?>" class="input" name="conpassword" readonly>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Gender</label>
                    <div class="custom_selectg">
                        <select name="gender" disabled>
                            <option value="Not Selected" <?php if($row['gender'] == 'Select Gender') echo "selected"; ?>>Select Gender</option>
                            <option value="Male" <?php if($row['gender'] == 'Male') echo "selected"; ?>>Male</option>
                            <option value="Female" <?php if($row['gender'] == 'Female') echo "selected"; ?>>Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Branch</label>
                    <div class="custom_select">
                        <select name="branch" disabled>
                            <option value="Not Selected" <?php if($row['branch'] == 'Select Branch') echo "selected"; ?>>Select Branch</option>
                            <option value="Galle" <?php if($row['branch'] == 'Galle') echo "selected"; ?>>Galle</option>
                            <option value="Jaffna" <?php if($row['branch'] == 'Jaffna') echo "selected"; ?>>Jaffna</option>
                            <option value="Kurunagala" <?php if($row['branch'] == 'Kurunagala') echo "selected"; ?>>Kurunagala</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Email Address</label>
                    <input type="text" value="<?php echo $row['email']; ?>" class="input" name="email" readonly>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" value="<?php echo $row['phone']; ?>" class="input" name="phone" readonly>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Address</label>
                    <textarea class="textarea" name="address" readonly><?php echo $row['address']; ?></textarea>
                </div>
            </div>

            <div class="input_field_terms">
                <label class="check">
                    <input type="checkbox" disabled>
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p>
            </div>

            <div class="input_field">
                <input type="submit" value="DELETE DETAILS" class="btn" name="delete">
            </div>
        </form>
    </div>
</body>
</html>
