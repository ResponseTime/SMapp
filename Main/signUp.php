<?php
$con = mysqli_connect("localhost","root","","SMapp");
if($con){
    if(!empty($_POST['user']) && !empty($_POST['pas']) && !empty($_POST['email'])){
        $user = $_POST['user'];
        $pass = $_POST['pas'];
        $mail = $_POST['email'];
        $sql = "insert into sign_Up values('$user','$pass','$mail')";
        try {
            mysqli_query($con,$sql);
            GLOBAL $user;
            $sq = "CREATE TABLE `".$user."`(followers VARCHAR(255),following VARCHAR(255))";
            mysqli_query($con,$sq);
            $err = "Account Created";
            mysqli_close($con);
        } catch (Exception $e) {
            $err = "Try changing the username";
        }
    }
    else{
        $err = "Enter all details";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="phone.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" media="screen and (max-width: 900px) and (min-width: 600px)" href="tablet.css?v=<?php echo time(); ?>">
    <title>Sign Up</title>
</head>
<body>
<div class="App"><p> SMapp</p></div>
<img class="logo" src="logo.png">
    <br>
    <form action="" method = "post">
        <input type="text" name="user" id="" placeholder = "username">
        <input type="password" name="pas" id="" placeholder = "password">
        <input type="email" name="email" id="" placeholder = "Email">
        <input type="submit" value="Create Account">
        <?php echo $err; ?>
        <button><a href="login_page.php">Login</a></button>
    </form>
</body>
</html>

