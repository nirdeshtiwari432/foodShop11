<?php 
include "connect.php"; 
 $Username = $_POST['username'];
 $email = $_POST['email'];
 $name = $_POST['name'];
 $number = $_POST['number'];
 $password = $_POST['password'];

include "connect.php"; 

if($conn->connect_error){
    die('connection failed :'.$conn->connect_error);
}

else{
    $stmt = $conn->prepare("insert into user(Username,email,name,number,password)
    values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$Username,$email,$name,$number,$password);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo "<p>Registration success</p>";


}

?>