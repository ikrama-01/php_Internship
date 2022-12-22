<?php
   
        $conn = mysqli_connect("localhost","root","","db1","3307");

        if(!$conn)
        {
            echo "Can't Connect to the Database";
        
        }
       

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        $query = "INSERT INTO table1(fname, lname) VALUES('$fname','$lname')";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            echo "<script> location.href = 'thankyou.html';</script>";
            exit();
        }



?>
