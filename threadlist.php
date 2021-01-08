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
    <?php
        $cat_id=$_GET['cat_id'];
        $sql="SELECT * FROM `categories` WHERE `category_id`=$cat_id";
        $result=mysqli_query($conn,$sql);
        if($row=mysqli_fetch_assoc($result))
        {
            $cat_name=$row['category_name'];
            $cat_desc=$row['category_description'];
            echo '
            <!--Category Name-->
            <div class="container my-2 bg-light">
                <div class="jumbotron ">
                    <h1 class="display-4">'.$cat_name.'</h1>
                    <p class="lead">'.$cat_desc.'</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="https://en.wikipedia.org/wiki/Special:Search?search='.$cat_name.'" target="_blank" role="button">Learn more</a>
                    </p>
                </div>    
            </div>
            <!--Category Name-->';
        }
        else{
          echo '
          <!--Category Name-->
          <div class="container my-2 bg-light">
              <div class="jumbotron ">
                  <h1 class="display-4">Category not found</h1>
                  
              </div>    
          </div>
          <!--Category Name-->';
           include 'partials/_footer.php'; 

          exit();

        }        
    ?>
    <!-- Inserting new thrads in db -->
    <?php
      if($_SERVER['REQUEST_METHOD']=='POST')
      {
          //Insert thread to db
          $th_title=htmlspecialchars($_POST['sub'], ENT_QUOTES, 'UTF-8');
          $th_desc=htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8');
          $user_id=$_SESSION['user_id'];
          $sql="INSERT INTO `threads` (`thread_id`, `thread_sub`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `thread_created`) 
                              VALUES (NULL, '$th_title', '$th_desc', '$cat_id', '$user_id' , CURRENT_TIMESTAMP);";
          $result=mysqli_query($conn,$sql);
          if($result)
          {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success:</strong> Thread added successfully.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
          }
          else{
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Unable to add thread :</strong> '.mysqli_error($conn).'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';

          }
      }
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
      {
        echo '
        <div class="container">
            <h1><strong>Start a Discussion</strong></h1>
            <form  action="'.$_SERVER['REQUEST_URI'].'" method="POST">
            <div class="form-group">
                <label for="sub">Problem Title</label>
                <input type="text" class="form-control" id="sub" name=sub aria-describedby="sub" placeholder="Enter Thread Subject">
            </div>
            <div class="form-group">
                <label for="desc">Ellaborate your concern</label>
                <textarea class="form-control" id="desc" name=desc aria-describedby="desc" rows=4></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>        
        </div>';
      }
      else{
        echo '
        <div class="container">
          <h1><strong>Start a Discussion</strong></h1>
            <div><strong>You are not logged in. Please login to create a new discussion.</strong></div>
            
        </div>';

      }
    ?>


    <div class="container" style="min-height: 320px">
        <h2 class="py-2 font-weight-bold " >Browse Questions</h2>

            
        <?php
            $cat_id=$_GET['cat_id'];
            $sql="SELECT * FROM `threads` WHERE `thread_cat_id`=$cat_id";
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