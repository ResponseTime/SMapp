<?php

$con = mysqli_connect("localhost","root","","SMapp");
if($con){
    if(!empty($_POST['usoe'])){
        if(str_contains($_POST['usoe'],'@')){
            $us = $_POST['usoe'];
            $sql = "select * from sign_up where email = '$us'";
            $dataset = mysqli_query($con,$sql);
            if(mysqli_num_rows($dataset)>0){
                session_start();
                $_SESSION["use"] = $us;
                header('location: forget.php');
            }
            else{
                echo "User Not Found";
            }
        }
        else{
            $hj = $_POST['usoe'];
            $sql = "select * from sign_up where USN = '$hj'";
            $dataset = mysqli_query($con,$sql);
            if(mysqli_num_rows($dataset)>0){
                session_start();
                $_SESSION["use"] = $hj;
                header('location: forget.php');
            }
            else{
                echo "User Not Found";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
</head>
<body>
    <form action="" method = "post">
        <input type="text" name="usoe" id="uso">
        <input type="submit" value="Submit">
    </form>
</body>
</html>

