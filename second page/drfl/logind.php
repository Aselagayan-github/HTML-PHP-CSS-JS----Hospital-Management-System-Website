<?php
    include ("connection.php");?>
<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $pw       = $_POST['Password'];
        $branch   = $_POST['branch'];

        $query = "SELECT * FROM  doctor WHERE ID ='$username' && password ='$pw' && branch = '$branch '";
        $data = mysqli_query($conn,$query);

        $total = mysqli_num_rows($data);
        
        if($total == 1)
        {
            echo "Login sucessfull";
            
        }
        else{
            echo "login failed";
        }


    }


?>