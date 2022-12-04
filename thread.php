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
 
    $content=$_POST['comment'];
    $content=str_replace("<","&lt;",$content);
    $content=str_replace(">","&gt;",$content);
    $id=$_GET['threadid'];
    $sno=$_POST['sno'];
    $sql="INSERT INTO `comments` ( `comment_content`,`thread_id`, `comment_by`, `comment_time`) VALUES ( '$content',  '$id','$sno', current_timestamp())";
    $result=mysqli_query($conn,$sql);
  
    
    if ($result) {
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong>Your Comment/Answer has been posted successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       </div>';
    }
  }
?>
<?php
$id=$_GET['threadid'];
$sql="SELECT * FROM `thread` WHERE `thread_id`=$id";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
 
 $title=$row['thread_title'];
 $desc=$row['thread_desc'];
$user=$row['thread_user_id'];
$sql2="SELECT * FROM  `users` WHERE `user_id` LIKE '$user'";
 $result2=mysqli_query($conn,$sql2);
 $row2=mysqli_fetch_assoc($result2);
  echo '<div class="container my-4" style="min-height:40%; width:70%; ">
  <div class="jumbotron">
 <h1 class="display-4">'.$title.'.</h1>
    <p class="lead">'.$desc.'</p>
    <hr class="my-4">
    <p class="lead">
    <b>  Posted By:'.$row2['user_username'].' </b>'.$row['timestamp'].'
    </p>
  <div><a href="" class="btn btn primary"style="color:white;font-size:6px;"> like</a>
  <a href="" class="btn btn primary"style="color:white;font-size:6px;">Share</a></div>
  </div>
  </div>';
}
?>
<?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
echo'<div class="container"style="min: height 250px; width:70%; ">
<h2>Post Your Comment/Answer</h2>
<form action="'. $_SERVER['REQUEST_URI'].'" method="post">
  <div class="form-group">
  <input type="hidden" name="sno" value="'.$_SESSION['sno'].'"
  <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile02"name="img">
    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
  </div>
  <div class="input-group-append">
  <button type="submit" class="btn btn-primary">Upload</button>
  </div>

     <label for="exampleFormControlTextarea1">Comment</label>
     <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Post a comment</button>
    </form>
    </div>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckeditor/ckfinder.js"></script>
    <script>
    var editor=CKEDITOR.replace("comment");
    CKFINDER.setupCKEditor(comment);
    </script>';
}
else {
  echo'<div class="container"style="min-height:50%; width:70%; ">
  <h2>Post Your Comment/Answer</h2>
  <div class="alert alert-warning" role="alert">
  You are not Logged in! please log in for Post a comment,
</div>
</div>';
}

?>

 <div class="container" style="min-height:40%; width:70%; ">

<h2>Discussions</h2>

<?php
$id=$_GET['threadid'];
$sql="SELECT * FROM `comments` WHERE `thread_id`=$id";
$result=mysqli_query($conn,$sql);
$noresult=true;

while ($row=mysqli_fetch_assoc($result)) {
  
  $content=$row['comment_content'];
  $user_id=$row['comment_id'];
  $user=$row['comment_by'];

  $sql2="SELECT * FROM  `users` WHERE `user_id` LIKE $user_id";
 $result2=mysqli_query($conn,$sql2);
 $row2=mysqli_fetch_assoc($result2);
  $noresult=false;
  
  echo'<div class="container my-3"style="min-height:40%; width:100%; ">
 <div class="media my-0">
   <img class="mr-3" src="img/userdefault.jpg" width="33px"; alt="Generic placeholder image">
   <div class="media-body ">
   <p class="lead my-0">
    <b>'.$user.' </b>'.$row['comment_time'].' </p> 
    '.$content.'
    </div>
    
 </div>
 </div>';
}
if($noresult){
  echo '
  <div class="container-fluid"style="min-height:40%; width:100%; " >
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <p><b>No Discussions Found!</b></p>
    <p class="lead">Be the first person of commenting Answer.</p>
  </div>
</div>
</div>';

echo '';
}
?>
</div>

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