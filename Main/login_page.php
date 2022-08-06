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
    <link rel="stylesheet" href="login_page.css">
    <title>SMapp</title>
</head>
<body>
    <div class="App">SMapp</div>
    <form action="" method = "post">
        <input type="text" name="usn" id = "usn"/>
        <input type="password" name="pass" id = "pass"/>
        <div id = "err"><?php echo "$err";?></div>
        <input type="submit" value="Login" id="sub"/>
        <Button><a href="signUp.php">Sign Up</a></Button>
    </form>
</body>
</html>
