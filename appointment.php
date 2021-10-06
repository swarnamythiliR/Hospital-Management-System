<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "mysql");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for securityif(isset($_POST['submit'])){
$firstname= mysqli_real_escape_string($link, $_POST['firstname']);
$lastname = mysqli_real_escape_string($link, $_POST['lastname']);
$email= mysqli_real_escape_string($link, $_POST['email']);
$phone = mysqli_real_escape_string($link, $_POST['phone']);
$gender = mysqli_real_escape_string($link, $_POST['gender']);
$appointmentdate = mysqli_real_escape_string($link, $_POST['appointmentdate']);
$message= mysqli_real_escape_string($link, $_POST['message']);


// Attempt insert query execution
$sql = "INSERT INTO appointment(firstname,lastname,email,phone,gender,appointmentdate,message) VALUES ('$firstname','$lastname','$email','$phone','$gender','$appointmentdate','$message')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

 
// Close connection
mysqli_close($link);
?>