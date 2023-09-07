<?php
include("connection.php");

$email = $_GET['email'];
$query = "SELECT * FROM DOCTOR WHERE email = '$email'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $firstName = $_POST["fname"];
    $ID = $_POST["Id"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $branch = $_POST["branch"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $specialized = $_POST["ds"];
    $address = $_POST["address"];

    // Update the database with the new data
    $sql = "UPDATE DOCTOR SET
            fname = ?,
            Id = ?,
            password = ?,
            gender = ?,
            branch = ?,
            email = ?,
            phone = ?,
            specialized = ?,
            address = ?
            WHERE email = ?";

    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die('Error: ' . mysqli_error($conn));
    }

    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "ssssssssss", $firstName, $ID, $password, $gender, $branch, $email, $phone, $specialized, $address, $email);

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
    <link rel="stylesheet" href="registationd.css" type="text/css">
</head>

<body>
    <div class="regiform" id="regiform">
        <form method="post">
            <h1>UPDATE Form</h1>

            <div class="form">
                <div class="input_field">
                    <label>Full name</label>
                    <input type="text" value="<?php echo $result['fname']; ?>" class="input" name="fname">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Id No</label>
                    <input type="text" value="<?php echo $result['Id']; ?>" class="input" name="Id">
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
                    <input type="password" value="<?phpecho $result['conpassword']; ?>" class="input" name="conpassword">
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Gender</label>
                    <div class="custom_selectg">
                        <select name="gender">
                            <option value="Not Selected">Select Gender</option>
                            <option value="Male" <?php if ($result['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if ($result['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Branch</label>
                    <div class="custom_select">
                        <select name="branch">
                            <option value="Not Selected">Select Branch</option>
                            <option value="Galle" <?php if ($result['branch'] == 'Galle') echo 'selected'; ?>>Galle</option>
                            <option value="Jaffna" <?php if ($result['branch'] == 'Jaffna') echo 'selected'; ?>>Jaffna</option>
                            <option value="Kurunagala" <?php if ($result['branch'] == 'Kurunagala') echo 'selected'; ?>>Kurunagala</option>
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
                    <label>Specialized</label>
                    <div class="custom_selectdd">
                        <select name="ds">
                            <option value="Not Selected">Select specialized</option>
                            <option value="Anesthesiologists" <?php if ($result['specialized'] == 'Anesthesiologists') echo 'selected'; ?>>Anesthesiologists</option>
                            <option value="Allergists/Immunologists" <?php if ($result['specialized'] == 'Allergists/Immunologists') echo 'selected'; ?>>Allergists/Immunologists</option>
                            <option value="Cardiologists" <?php if ($result['specialized'] == 'Cardiologists') echo 'selected'; ?>>Cardiologists</option>
                            <option value="Colon and Rectal Surgeons" <?php if ($result['specialized'] == 'Colon and Rectal Surgeons') echo 'selected'; ?>>Colon and Rectal Surgeons</option>
                            <option value="Dermatologists" <?php if ($result['specialized'] == 'Dermatologists') echo 'selected'; ?>>Dermatologists</option>
                            <option value="Endocrinologists" <?php if ($result['specialized'] == 'Endocrinologists') echo 'selected'; ?>>Endocrinologists</option>
                            <option value="Emergency Medicine Specialists" <?php if ($result['specialized'] == 'Emergency Medicine Specialists') echo 'selected'; ?>>Emergency Medicine Specialists</option>
                            <option value="Family Physicians" <?php if ($result['specialized'] == 'Family Physicians') echo 'selected'; ?>>Family Physicians</option>
                            <option value="Gastroenterologists" <?php if ($result['specialized'] == 'Gastroenterologists') echo 'selected'; ?>>Gastroenterologists</option>
                            <option value="Geriatric Medicine Specialists" <?php if ($result['specialized'] == 'Geriatric Medicine Specialists') echo 'selected'; ?>>Geriatric Medicine Specialists</option>
                            <option value="Hematologists" <?php if ($result['specialized'] == 'Hematologists') echo 'selected'; ?>>Hematologists</option>
                            <option value="Internists" <?php if ($result['specialized'] == 'Internists') echo 'selected'; ?>>Internists</option>
                            <option value="Medical Geneticists" <?php if ($result['specialized'] == 'Medical Geneticists') echo 'selected'; ?>>Medical Geneticists</option>
                            <option value="Nephrologists" <?php if ($result['specialized'] == 'Nephrologists') echo 'selected'; ?>>Nephrologists</option>
                            <option value="Oncologists" <?php if ($result['specialized'] == 'Oncologists') echo 'selected'; ?>>Oncologists</option>
                            <option value="Plastic Surgeons" <?php if ($result['specialized'] == 'Plastic Surgeons') echo 'selected'; ?>>Plastic Surgeons</option>
                            <option value="Pathologists" <?php if ($result['specialized'] == 'Pathologists') echo 'selected'; ?>>Pathologists</option>
                            <option value="Psychiatrists" <?php if ($result['specialized'] == 'Psychiatrists') echo 'selected'; ?>>Psychiatrists</option>
                            <option value="Pulmonologists" <?php if ($result['specialized'] == 'Pulmonologists') echo 'selected'; ?>>Pulmonologists</option>
                            <option value="Sports Medicine Specialists" <?php if ($result['specialized'] == 'Sports Medicine Specialists') echo 'selected'; ?>>Sports Medicine Specialists</option>
                            <option value="General Surgeons" <?php if ($result['specialized'] == 'General Surgeons') echo 'selected'; ?>>General Surgeons</option>
                            <option value="Sleep Medicine Specialists" <?php if ($result['specialized'] == 'Sleep Medicine Specialists') echo 'selected'; ?>>Sleep Medicine Specialists</option>
                            <option value="Urologists" <?php if ($result['specialized'] == 'Urologists') echo 'selected'; ?>>Urologists</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form">
                <div class="input_field">
                    <label>Address</label>
                    <input type="text" value="<?php echo $result['address']; ?>" class="input" name="address">
                </div>
            </div>

            <div class="form">
                <input type="submit" value="Update" class="btn"  name="update">
            </div>
        </form>
    </div>
</body>
</html>
