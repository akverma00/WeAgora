<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fontawesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css">
    <!-- Styles-->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.2/css/mdb.min.css">
    
    <title>WeAgora</title>
  </head>
  <body>
    <!-- Header -->    
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <!-- Header -->
    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="https://source.unsplash.com/2000x900/?coding,programmers" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://source.unsplash.com/2000x900/?microsoft,coding" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://source.unsplash.com/2000x900/?microsoft,OS" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- Carousel -->
    
    <div class="container mt-2">
      <h2 class="text-center bold bg-light">WeAgora - Categories</h2>
      <div class="row">
      <?php
        $sql="SELECT * FROM `categories`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
          $cat_name=$row['category_name'];
          $cat_desc=$row['category_description'];
          $cat_id=$row['category_id'];
          echo '
          <div class="col-md-4 mt-1 mb-1">
              <!-- Card Narrower -->
            <div class="card card-cascade narrower">
              <!-- Card image -->
              <div class="view view-cascade overlay">
                <img class="card-img-top" src="https://source.unsplash.com/500x350/?'.$cat_name.'"
                  alt="Card image cap">
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <!-- Title -->
                <h4 class="font-weight-bold card-title"><a href="threadlist.php?cat_id='.$cat_id.'">'.$cat_name.'</a></h4>
                <!-- Text -->
                <p class="card-text">'.substr($cat_desc,0,200).'</p>
                <!-- Button -->
                <a class="btn btn-unique btn-primary" href="threadlist.php?cat_id='.$cat_id.'">View Threads</a>
              </div>
  
            </div>
            <!-- Card Narrower -->
  
          </div>';
        }
      ?>

      </div>

    
    </div>
    
    <!-- Footer -->    
    <?php include 'partials/_footer.php'; ?>
    <!-- Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.2/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.2/js/popper.min.js"></script>
    <script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.2/js/mdb.min.js"></script>
  </body>
</html>