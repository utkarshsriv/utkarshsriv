<?php
session_start();
echo '<nav style="height :80px;"class="sticky-top navbar navbar-expand-lg navbar-dark bg-primary">
<a class="navbar-brand" href="index.php">CoDiYaPa</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      $sql="SELECT * FROM  `categories`";
      $result=mysqli_query($conn,$sql);
      while ($row=mysqli_fetch_assoc($result)) {
        # code...
        
        echo '<a class="dropdown-item" href="threadlist.php?catid='.$row['categorie_id'].'">'.$row['categorie_name'].'</a>';
      }
       
    echo'</li>
   </ul>
  <div class="row my-4">';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
    # code...
 echo'   <form class="form-inline my-2 my-lg-0"action="search.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search"aria-label="Search">
      <button class="btn btn-outline-info my-2 my-sm-0"  type="submit">Search</button>
      </form>
     <a class="btn btn-success ml-2 mr-4" style="text-decoration:none; color:white;" href="_logout.php">Logout</a>';
      
  }
  else{
  echo'<form class="form-inline my-2 my-lg-0"action="search.php" method="get">
    <input class="form-control mr-sm-2" type="search" placeholder="Search"name="search" aria-label="Search">
    <button class="btn btn-outline-info my-2 my-sm-0 hvr-buzz" type="submit">Search</button>
    </form>
    <button class="btn btn-success ml-4" data-toggle="modal" data-target="#loginmodal" href="/_handlelogin.php" >Login </button>
    <button class="btn btn-success mx-2"data-toggle="modal" data-target="#signupmodal" href="/_handlesignup.php">SignUp</button>';
  }
 echo' </div>
</div>
</nav>';
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
  # code...
  echo '';
}
include '_loginmodal.php';
include '_signupmodal.php';

?>