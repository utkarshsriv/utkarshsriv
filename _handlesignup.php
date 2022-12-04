<?php

$showerror="false";
if ($_SERVER['REQUEST_METHOD']=="POST") {
    # code...
    include '_dbconnect.php';
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $emailid=$_POST['emailid'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $username=$_POST['username'];
    $city=$_POST['city'];
    $state=$_POST['state'];
if ($password==$cpassword) {
        $hash=password_hash($password,PASSWORD_BCRYPT);
    $sql="INSERT INTO `users`(`user_firstname`, `user_lastname`, `user_emailid`, `user_password`, `user_username`, `user_city`, `user_state`) VALUES ($firstname, $lastname, $emailid, $hash, $username, $city, $state)";
    
    $result=mysqli_query($conn,$sql);
    var_dump($result);
    die();
$num=mysqli_num_rows($result);
if ($num>0) {
    # code...
    header('location:index.php?signup="true"');
}else{
    header('location:index.php?signup="false"');

}
}else {
    header('location:index.php?cpass="invalid"');
}
}
?>