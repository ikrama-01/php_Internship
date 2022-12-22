<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>  
<?php
session_start();
     $conn = mysqli_connect("localhost","root","","db1","3307");

     if(!$conn)
     {
         echo "Can't Connect to the Database";
     
     }
     $username = trim($_POST['username']);
     $password = trim($_POST['password']);
     if($username=="" OR $password=="")
     {
        echo "<script>alert('try again');
        window.location.href= 'login.php';
        </script>;"; 
     }
     

     $query = "SELECT fname,lname from table1 where fname='$username'";
     $result=mysqli_query($conn,$query);
     $row=mysqli_fetch_assoc($result);

     if($username!=$row['fname'] OR $password!=$row['lname'])
     {
         echo " <script> alert('wrong username or password');location.href = 'login.php';</script>";
     }

     else if($username==$row['fname'] AND $password==$row['lname'])
     {
        if(!empty($_POST['check']))
        {
            setcookie("user",$username,time()+(365*24*60*60));
            setcookie("pass",$password,time()+(365*24*60*60));
            $_SESSION['user']=$username;
        }
        else
        {
            if (isset($_COOKIE['user']))
            {
                setcookie("user", "");
            }
            if (isset($_COOKIE['pass']))
            {
                setcookie("pass", "");
            }
            $_SESSION['user']=$username;
        }
        header("location:admin.php");
     }

?>
    <script>
        let info ={
            uname : $username;
            passw : $password;
        }
        module.exports = {info};
    </script>
</body>
</html>