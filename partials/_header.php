<?php

    session_start();

    //choice : Add sticky-top class to header class
    echo '    <nav class="navbar navbar-expand-lg navbar-dark bg-dark info-color ">
    <a class="navbar-brand" href="index.php">WeAgora</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link waves-effect waves-light" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="contact.php">Contact</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Top Categories
                </a>
                <div class="dropdown-menu dropdown-info" aria-labelledby="navbarDropdownMenuLink">';

                $checksql="SELECT * FROM `categories` LIMIT 5";
                $result = mysqli_query($conn , $checksql);
                $num = mysqli_num_rows($result);
                while($row=mysqli_fetch_assoc($result))
                {
                    echo '                    
                    <a class="dropdown-item waves-effect waves-light" href="threadlist.php?cat_id='.$row['category_id'].'">'.$row['category_name'].'</a>
                    ';
                }
                
                echo '    </div>
            </li>
        </ul>
        <div class="row ">';
        
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
        {
                echo '
        
            <form class="form-inline"  action="search.php" method="GET">
                <div class="md-form my-0">
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                </div>
            </form>';
            
                echo '
                <div class="inline font-weight-bold text-white mt-3" >Welcome '.$_SESSION['email'].'
                </div>';
                echo '<a class="btn btn-primary  mx-2"  href="partials/_handleLogout.php" >Logout</a>';
            }
            else
            {
            echo '
            <button class="btn btn-primary  mx-2"  data-toggle="modal" data-target="#loginModal" >Login</button>
            <button class="btn btn-primary  mx-2"  data-toggle="modal" data-target="#signupModal">SignUp</button>';
            }
            echo '
        </div>
    </div>
</nav>';
    
include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']))
{
    if($_GET['signupsuccess']=="true")
    {
        echo '<div class="alert alert-success alert-dismissible my-0 fade show" role="alert">
        <strong>Success:</strong> Account created successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    else
    {
        echo '<div class="alert alert-danger alert-dismissible my-0 fade show" role="alert">
        <strong>Failure:</strong> '.$_GET['error'].'.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
}
if(isset($_GET['signinsuccess'])) 
{
    if($_GET['signinsuccess']=="false") 
    {
        
        echo '<div class="alert alert-danger alert-dismissible my-0 fade show" role="alert">
        <strong>Failed Login:</strong> '.$_GET['error'].'.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
}
?>