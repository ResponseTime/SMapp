<?php
$con = mysqli_connect("localhost","root","","SMapp");
if($con){
    if((!empty($_POST['new']) && !empty($_POST['ret']))){
        if($_POST['new']===$_POST['ret']){

            session_start();
            $entry = $_SESSION['use'];
            $new = $_POST['new'];
            $sql = "update sign_up set Pass = '$new' where email = '$entry' or usn = '$entry'";
            mysqli_query($con,$sql);
            echo "password changed";
            mysqli_close($con);
        }
        else{
            echo "Password should be same";
        }
    }
    else{
        echo "Enter new Password";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forget.css?v=<?php echo time(); ?>">
    <title>Change Password</title>
</head>
<body>
    <form action="" method = "post">
        <input type="password" name="new" id="new">
        <input type="password" name="ret" id="retype">
        <input type="submit" value="Change Password">
    </form>
    <br>
    <a href="login_page.php">Go Back to login page</a>
</body>
</html>
