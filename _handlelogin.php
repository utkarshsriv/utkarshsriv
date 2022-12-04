<?php
$showerror="false";
if ($_SERVER['REQUEST_METHOD']=="POST") {
    # code...
    include '_dbconnect.php';
    $email=$_POST['loginemail'];
    $pass=$_POST['loginpass'];

    $sql="SELECT * FROM `users` WHERE `user_emailid` LIKE '$email'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

if ($num==1) {
    # code...
    $row=mysqli_fetch_assoc($result);
    if (password_verify($pass,$row['user_password'])) {
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['useremail']=$email;
        $_SESSION['sno']=$sno;

        echo "logged in".$email;
        header("location:index.php");
        # code...
    }
    else {
        echo "Incorrect Password";
    }
}
else {
    echo "invalid email id";
}
}
?>