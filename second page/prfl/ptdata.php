<html>
    <head>
        <title>Admin database</title>
        <style>
        a{
          border: 2px  solid black;
          font-size: 25px;
          font-weight: bold;
          margin-bottom: 15px;
          }
        body{
            background: url(iamges/regipng.png);
            background-repeat: no-repeat;
            background-size: cover;
          }
</style>
    </head>
</html>

<?php
include("connection.php");
error_reporting(0);

$query = "SELECT * FROM PATIENT";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);

if ($total != 0) {
    ?>
    <h2 align="center" > Patient Database</h2><center>
    
    <table border= "1" cellspacing="7" width="95%">
        <tr>
            <th width="5%">fname</th>
            <th width="5%">lname</th>
            <th width="5%">ID</th>
            <th width="5%">Birthday</th>
            <th width="7%">password</th>
            <th width="7%">cpassword</th>
            <th width="7%">Marital</th>
            <th width="5%">gender</th>
            <th width="5%">branch</th>
            <th width="8%">email</th>
            <th width="5%">phone</th>
            <th width="9%">address</th>
            
        </tr>
        <?php
        while ($result = mysqli_fetch_assoc($data)) {
            echo "
            <tr>
                <td>".$result['First name']."</td>
                <td>".$result['Last name']."</td>
                <td>".$result['Id']."</td>
                <td>".$result['Birthday']."</td>
                <td>".$result['Password']."</td>
                <td>".$result['ConPassword']."</td>
                <td>".$result['Marital']."</td>
                <td>".$result['Gender']."</td>
                <td>".$result['Branch']."</td>
                <td>".$result['Email']."</td>
                <td>".$result['Phone']."</td>
                <td>".$result['Address']."</td>

                
            </tr>
            ";
        }
        ?>
    </table>
    </center>
    <?php
} else {
    echo "no record";
}
?>
