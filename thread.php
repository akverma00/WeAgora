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
    
    <title>Thread- WeAgora</title>
  </head>
  <body>
    <!-- Header -->    
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <!-- Header -->
    
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            //Insert thread to db
            $th_comment=htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');
            $thread_id=$_GET['thread_id'];
            $user_id=$_SESSION['user_id'];
            $sql="INSERT INTO `comments` (`comment_id`, `comment_thread_id`, `comment_user_id`, `comment_content`, `comment_created`) 
                                  VALUES (NULL, '$thread_id', '$user_id', '$th_comment', CURRENT_TIMESTAMP);";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success:</strong> Comment added successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Unable to add comment :</strong> '.mysqli_error($conn).'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';

            }
        }
    ?>

    <?php
      $thread_id=$_GET['thread_id'];
      $sql="SELECT * FROM `threads` WHERE `thread_id`=$thread_id";
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
        //geting user name
        $user_sql="SELECT `user_name` FROM `users` WHERE `user_id`='$thread_user_id'";
        $user_info=mysqli_query($conn,$user_sql);
        //echo var_dump($user_sql);
        $user_name=mysqli_fetch_assoc($user_info)['user_name'];
          
        echo '
          <!--Thread Title-->
          <div class="container my-1">
            <div class="jumbotron py-1">
              <h1 class="display-4">'.$thread_sub.'</h1>
              <p class="lead">'.$thread_desc.'</p>
              <hr class="my-4">
              <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
              <div class=" row messageFooter">
                <div class="actions col date">'.$thread_created.'</div>
                <div class="userInfo">
                  <a><strong>Posted by <a href="user.php?uid='.$thread_user_id.'">'.$user_name.'</a></strong></a><br>
                  
                </div>
              </div>
                
            </div>    
          </div>
          <!--Thread Title-->';
      } 
      
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
      {
        echo '
        <div class="container px-3">
            <h1><strong>Post a comment </strong></h1>
            <form  action="'.$_SERVER['REQUEST_URI'].'" method="POST">
            <div class="form-group">
                <label for="comment">Enter your comment</label>
                <input type="text" class="form-control" id="comment" name=comment aria-describedby="comment" placeholder="Enter your comment">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>        
        </div>';
      }
      else
      {
        echo '
        <div class="container px-3">
            <h1><strong>Post a comment </strong></h1>
            
            <div><strong>You are not logged in. Please login to add comments.</strong></div>     
        </div>';

      }
      
    ?>
    


    <div class="container" style="min-height: 320px">
        <h2 class="py-2 font-weight-bold " >Discussions</h2>

            
        <?php
            $found=false;
            $thread_id=$_GET['thread_id'];
            $sql="SELECT * FROM `comments` WHERE `comment_thread_id`=$thread_id";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
              $found=true;
              $comment_id=$row['comment_id'];
              $comment_content=$row['comment_content'];
              $comment_created=$row['comment_created'];
              $comment_user_id=$row['comment_user_id'];
              
              $user_sql="SELECT `user_name` FROM `users` WHERE `user_id`='$comment_user_id'";
              $user_info=mysqli_query($conn,$user_sql);
              //echo var_dump($user_sql);
              $user_name=mysqli_fetch_assoc($user_info)['user_name'];
                echo '        
                <div class="media my-3">
                    <img class="d-flex mr-3" width="50px"  src="https://source.unsplash.com/50x50/?person" alt="Generic placeholder image">
                    <div class="media-body">
                        <h6 class="mt-0  font-weight-bold"><a class="text-dark" href="user.php?uid='.$comment_user_id.'">Posted by <a href="user.php?uid='.$comment_user_id.'">'.$user_name.'</a> at '.$comment_created.'</a></h6>
                        '.$comment_content.'
                    </div>
                </div>';
            }
            
            if(!$found)
            {
                echo '<div class="jumbotron jumbotron-fluid bg-light">
                <div class="container">
                  <h2 class="display-4">No comments found</h2>
                  <p class="lead">Be the first to comment.</p>
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