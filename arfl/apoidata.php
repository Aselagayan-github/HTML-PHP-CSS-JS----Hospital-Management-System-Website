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

$query = "SELECT * FROM APOI";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);

if ($total != 0) {
    ?>
    <h2 align="center" > Appoinment Database(Edit,Insert,Delete)</h2><center>
    <a class="btn btn-primary" href="apoiadd/appoinment.php" role="button">Add Appoinment</a>
    <table border= "1" cellspacing="7" width="85%">
        <tr>
            <th width="5%">fname</th>
            <th width="5%">ID</th>
            <th width="5%">Birthday</th>
            <th width="5%">gender</th>
            <th width="5%">branch</th>
            <th width="8%">email</th>
            <th width="5%">phone</th>
            <th width="8%">Operation</th>
        </tr>
        <?php
        while ($result = mysqli_fetch_assoc($data)) {
            echo "
            <tr>
                <td>".$result['fname']."</td>
                <td>".$result['Id']."</td>
                <td>".$result['bd']."</td>
                <td>".$result['gender']."</td>
                <td>".$result['branch']."</td>
                <td>".$result['email']."</td>
                <td>".$result['phone']."</td>
                

                <td><a href='apoiadd/apoiedit.php?email=$result[email]'>EDIT</a>
                <a href='apoiadd/apoidelete.php?email=$result[email]'>DELETE</a></td>
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
