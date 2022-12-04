<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="blog.css">
    <title> CoDiYaPa-Blogger A Platform that needs every coder</title>
  </head>
  <body>
   <?php
   include '_dbconnect.php';
   ?>
   <?php
    include_once '_header.php';
    if (isset($_GET['signup']) || isset($_GET['cpass'])) {
      if ($_GET['signup']=='true') {
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> Sign up success you can Login Now.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
     if ($_GET['cpass']=='invalid') {
      echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
      <strong>Alas!</strong>Confirm password correctly!.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
     }  
    }
   ?>
   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://source.unsplash.com/1600x600/?Coding,programming" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
    <h5>Welcome to CoDiYaPa</h5>
    <p></p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://source.unsplash.com/1600x600/?,database" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
    <h5>Find Your Answer Easily Now.</h5>
    <p>Just by visiting CoDiYaPa.</p>
  </div>

    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://source.unsplash.com/1600x600/?webdevelopment,html" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    <h5> Ask Unlimited Questions with the CoDiYaPa</h5>
    <p>Create post as many as you can or want.</p>
  </div>
  
</div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only"></span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only"></span>
</a>
</div>
<section class="container-my-0">
<section class="hero-header primary-header slider-header md auto" id="home">
		<div class="container">
			<div class="row">
				<div class="hero-header-content">
					<p>Let's solve with us </p>
					<h1>   The heaven for<br> <b> Coders</b></h1>
					<p>
        <CoDiYaPa-Blogger><i> CoDiYaPa-Coders </i> is a website which lets you submit an article which upon approval will be up on our website and you can get a good amount of reach from here!

My Halloween decorations are staying in the box this year. To be honest, they didn’t make it out of the box last year either. My Halloween spirit has officially been bludgeoned to death by teenagers who no longer care and a persistent October fear of the Northern California wildfires. And speaking of fear, isn’t there more than enough of that going around? Maybe all of us can pretend that Halloween isn’t even happening this year?</p>
				
						<div class="main-img"><img src="/img/hero-image.svg" alt="" width="700px"></div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
	</section>


   <div class="container my-3" style="min: height 433px;">
   <h3 class="text-center my-2"> CoDiYaPa-Blogs Categories</h3>
<div class="row my-4">
<?php
$sql="SELECT * FROM `categories`";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($result)) {
  # code...
  $id=$row['categorie_id'];
  $name=$row['categorie_name'];
  $desc=$row['categorie_description'];

  echo'<div class="col-md-4">
  <div class="card" style="width: 18rem;">
<img class="card-img-top" src="https://source.unsplash.com/500x400/?'.$name.',coding" alt="Card image cap">
<div class="card-body">
  <h5 class="card-title"><a href="threadlist.php?catid='.$id.'" style="text-decoration:none;">'.$name.'</a></h5>
  <p class="card-text">'.substr($desc,1,200).'</p>
  <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
</div>
</div>
</div>';
}
?>
    
</div>
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