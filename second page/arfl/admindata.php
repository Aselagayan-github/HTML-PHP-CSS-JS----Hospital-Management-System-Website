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

$query = "SELECT * FROM ADMIN";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);

if ($total != 0) {
    ?>
    <h2 align="center" > Admin Database(Edit,Insert,Delete)</h2><center>
    <a class="btn btn-primary" href="adminadd/registationa.html" role="button">Add Admin</a>
    <table border= "1" cellspacing="7" width="85%">
        <tr>
            <th width="5%">fname</th>
            <th width="5%">lname</th>
            <th width="7%">password</th>
            <th width="7%">cpassword</th>
            <th width="5%">gender</th>
            <th width="5%">branch</th>
            <th width="8%">email</th>
            <th width="5%">phone</th>
            <th width="9%">address</th>
            <th width="10%">Operation</th>
        </tr>
        <?php
        while ($result = mysqli_fetch_assoc($data)) {
            echo "
            <tr>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['password']."</td>
                <td>".$result['cpassword']."</td>
                <td>".$result['gender']."</td>
                <td>".$result['branch']."</td>
                <td>".$result['email']."</td>
                <td>".$result['phone']."</td>
                <td>".$result['address']."</td>

                <td><a href='adminadd/adminedit.php?email=$result[email]'>EDIT</a>
                <a href='adminadd/admindelete.php?email=$result[email]'>DELETE</a></td>
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
