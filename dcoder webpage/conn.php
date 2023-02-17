<?php
$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST, 'email');
$subject = filter_input(INPUT_POST, 'subject');
$message = filter_input(INPUT_POST, 'message');

if (!empty($name)) {
    if (!empty($email)) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "conn";

        //create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if(mysqli_connect_error()){
            die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
        }   
        else{
            $sql = "INSERT INTO conf (name, email, subject, message) VALUES ('$name','$email','$subject','$message')";
            if($conn ->query($sql)){
                
            }
            else {
                echo "ERROR" . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
    }
    else{
        echo "Email should not be empty";
    }
}
else{
    echo "Username should not be empety";
}
