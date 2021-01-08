<?php
    $showError="false";
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include '_dbconnect.php';
        $email=htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $password=htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

        //check if this email exists
        $checksql="SELECT * FROM `users` WHERE `user_email`='$email'";
        $result = mysqli_query($conn , $checksql);
        $num = mysqli_num_rows($result);
        if($num==0)
        {
            $showError="Email not registered";
        }
        else{
            $row=mysqli_fetch_assoc($result);
            if(password_verify($password,$row['user_password']))
            {
                $showAlert=true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email']=$email;
                $_SESSION['user_id']=$row['user_id'];
                //echo $_SESSION['loggedin'];
                header("Location: /forum_website/index.php");
                exit();
                //echo var_dump($result);
            }
            else{
                $showError="Wrong Password";
            }
        }
        //echo mysqli_error($conn) ; 
        header("Location: /forum_website/index.php?signinsuccess=false&error=$showError");
        

    }
?>