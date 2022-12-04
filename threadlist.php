<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>CoDiYaPa-A Platform that needs every coder</title>
  </head>
  <body>
   <?php
   include '_dbconnect.php';
   ?>
   <?php require '_header.php';?>
   <?php
   
   
   if ($_SERVER['REQUEST_METHOD']=='POST') {
      //id which is given in index.php for threadlist
       $title=$_POST['title'];
       $desc=$_POST['desc'];
       $title=str_replace("<","&lt;",$title);
       $title=str_replace(">","&gt;",$title);
      
       $desc=str_replace("<","&lt;",$desc);
       $desc=str_replace(">","&gt;",$desc);
       $id=$_GET['catid'];
       $sno=$_POST['sno'];
       $img=$_POST['img'];
       $sql="INSERT INTO `thread` ( `thread_title`, `thread_desc`, `thread_cat_id`,`thread_img`,`thread_user_id`,`timestamp`) VALUES ( '$title', '$desc','$img','$id','$sno',current_timestamp())";
   
      $result=mysqli_query($conn,$sql);
     if ($result) {
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong>You have entered your problem successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
   </div>';
     }
     
   
   }
   
   ?>
<?php
$id=$_GET['catid'];
$sql="SELECT * FROM `categories` WHERE `categorie_id`= '$id'";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
  $catdesc=$row['categorie_description'];
  $catname=$row['categorie_name'];
  echo '<div class="container my-4" style="min-height:40%; width:70%; ">
  <div class="jumbotron">
 <h1 class="display-4">Welcome to '.$catname.'.</h1>
    <p class="lead">'.$catdesc.'</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
  </div>
  </div>';
}
?>
<?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
echo'<div class="container"style="min-height:50%; width:70%; ">
<h2>Post A Question</h2>
<form action="'. $_SERVER['REQUEST_URI'].'" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Problem/Question</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="title">
    <input type="hidden" name="sno" value="'.$_SESSION['sno'].'"
    <small id="emailHelp" class="form-text text-muted">make sure you enter a short problem text</small>
    </div>
    <div class="form-group">
    <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile02" name="img">
    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
  </div>
  <div class="input-group-append">
  <button type="submit" class="btn btn-primary">Upload</button>
  </div>
</div>

  <label for="exampleFormControlTextarea1">Describe your Question and trouble</label>
  <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<script src="ckeditor/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>
<script>
var desc=CKEDITOR.replace("desc");
CKFINDER.setupCKEditor(desc);
</script>';
}
else {
  echo'<div class="container"style="min-height:50%; width:70%; ">
  <h2>Post A Question</h2>
  <div class="alert alert-warning" role="alert">
  You are not Logged in! please log in for Post a question
</div>
</div>';
}

?>

<?php
$id=$_GET['catid'];
$sql="SELECT * FROM `thread` WHERE `thread_cat_id`=$id";
$result=mysqli_query($conn,$sql);
$noresult=true;
while ($row=mysqli_fetch_assoc($result)) {
  $noresult=false;
  $id=$row['thread_id'];
 $user=$row['thread_user_id'];
 $title=$row['thread_title'];
 $desc=$row['thread_desc'];
 $thread_user_id=$row['thread_user_id'];
 
 $result2=mysqli_query($conn,$sql2);
 $row2=mysqli_fetch_assoc($result2);
 echo '<div class="container mb-3"style="min-height:40%; width:70%; ">
 <div class="media my-3">
   <img class="mr-3" src="img/userdefault.jpg" width="33px"; alt="Generic placeholder image">
   <div class="media-body">
   <p class="lead my-0">
    <b>'.$row2['user_username'].' '.$row['timestamp'].' </b></p>   
   <h5 class="mt-0"><a style="text-decoration:none;"href="thread.php?threadid='.$id.'" >'.$title.'</a></h5>
     '.$desc.' </div>
 </div>
 </div>';

}
if($noresult){
  echo '
  <div class="container"style="min-height:40%; width:70%; " >
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <p><b>No Questions Found!</b></p>
    <p class="lead">Be the first person of asking Question.</p>
  </div>
</div>
</div>';

echo '';
}
?>
<?php
    include '_footer.php';
   ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>