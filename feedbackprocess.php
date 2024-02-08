<?php
// what to do with the data
if(isset($_POST['submit'])){
    $fname = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
// connect to the database server
include 'db_config.php';

// write sql statement to insert data
$sql = "insert into 24_feedback(name, email, phone, message)
        values('$fname', '$email', '$phone', '$message')";

if($conn->query($sql)===TRUE){
    
    echo "<script>alert('Your data was recorded!'); window.location.href = 'index.php';;</script>";
}
else{
    echo "Error :" .$sql . "<br>" . $conn->error;
}

// close the database connection
$conn->close();


}


?>