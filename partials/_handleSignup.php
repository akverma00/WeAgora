<?php
    $showError="false";
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include '_dbconnect.php';
        $email=htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $password=htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
        $cpassword=htmlspecialchars($_POST['cpassword'], ENT_QUOTES, 'UTF-8');
        $phone=htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
        $name=htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');

        //check if this email exists
        $checksql="SELECT * FROM `users` WHERE `user_email`='$email'";
        $result = mysqli_query($conn , $checksql);
        $num = mysqli_num_rows($result);
        if($num>0)
        {
            $showError="Email already registered";
        }
        else{
            if($password==$cpassword)
            {
                $hash=password_hash($password, PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_created`, `user_phone`, `user_name`) 
                                    VALUES ( NULL, '$email', '$hash', CURRENT_TIMESTAMP, '$phone', '$name');";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $showAlert=true;
                    header("Location: /forum_website/index.php?signupsuccess=true");
                    exit();
                    //echo var_dump($result);
                }

            }
            else{
                $showError="Passwords do not match";
            }
        }
        //echo mysqli_error($conn) ; 
        header("Location: /forum_website/index.php?signupsuccess=false&error=$showError");
        

    }
?>