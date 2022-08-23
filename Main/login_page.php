<?php
$con = mysqli_connect("localhost","root","","SMapp");
if($con){
    $err = "";
    if(!empty($_POST['usn']) && !empty($_POST['pass'])){
        $usn = $_POST['usn'];
        $pass = $_POST['pass'];
        $sql = "select * from sign_up where USN = '$usn' and Pass = '$pass'";
        $dataset = mysqli_query($con,$sql);
        if(mysqli_num_rows($dataset)>0){
            $err = "Login Verified";
            mysqli_close($con);
            session_start();
            $_SESSION['user'] = $usn;
            header('location: home.php');
        }
        else{
            $err = "Username or password incorrect";
        }
    }
    else{
        $err = "Insert Login Credidentials";
    }
}
else{
    echo "Problem in the server";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_page.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="phone.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" media="screen and (max-width: 900px) and (min-width: 600px)" href="tablet.css?v=<?php echo time(); ?>">
    <title>SMapp</title>
</head>
<body>
    <div class="App"><p>SMapp</p></div>
    <img class="logo" src="logo.png">
    <br>
    <form id="sign" action="" method = "post">
        <input type="text" name="usn" id = "usn"  placeholder = "Username"/>
        <input type="password" name="pass" id = "pass" placeholder = "Password"/>
        <a href="forgot.php">Forget Password</a>
        <div id = "err"><?php echo "$err";?></div>
        <input type="submit" value="Login" id="sub"/>
        <Button><a href="signUp.php">Sign Up</a></Button>
    </form>
</body>
</html>
