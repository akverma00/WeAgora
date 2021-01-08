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
    
    <title>Search Results - WeAgora</title>
  </head>
  <body>
    <!-- Header -->    
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <!-- Header -->
    <div class="container">
        <h1 class="font-weight-bold">Search Results for "<em><?php echo htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');?></em>"</h1>
        
        <?php
            $search=$_GET['search'];
            $sql="SELECT * FROM `threads` WHERE MATCH thread_sub,thread_desc against ('$search')";
            $result=mysqli_query($conn,$sql);
            $found=false;
            while($row=mysqli_fetch_assoc($result))
            {
                $found=true;
                $thread_id=$row['thread_id'];
                $thread_sub=$row['thread_sub'];
                $thread_desc=$row['thread_desc'];
                $thread_created=$row['thread_created'];
                $thread_user_id=$row['thread_user_id'];
                        
                $user_sql="SELECT `user_name` FROM `users` WHERE `user_id`='$thread_user_id'";
                $user_info=mysqli_query($conn,$user_sql);
                //echo var_dump($user_sql);
                $user_name=mysqli_fetch_assoc($user_info)['user_name'];
                echo '        
                <div class="media my-3">
                    <img class="d-flex mr-3" width="50px"  src="https://source.unsplash.com/50x50/?person" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="my-0 py-0 font-weight-bold"><a class="text-dark" href="thread.php?thread_id='.$thread_id.'">'.$thread_sub.'</a></h5>
                        '.$thread_desc.'
                    </div>
                    <p class="font-weight-bold my-0">Created by <a href="user.php?uid='.$thread_user_id.'">'.$user_name.'</a> at '.$thread_created.'</p>
                </div>';
            }
            if(!$found)
            {
                echo '<div class="jumbotron jumbotron-fluid bg-light">
                <div class="container">
                  <h2 class="display-4">No threads found</h2>
                  <p class="lead">Be the first to start the discussion.</p>
                </div>
              </div>';
            }

        ?>
        
        
        
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