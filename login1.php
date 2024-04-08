<?php
    include "connect.php"; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query ="SELECT * FROM Admin WHERE email = '$email' AND password ='$password' ";
    $result = $conn->query($query);
    if($result->num_rows==1){
        header("Location:indexAdmin.html");
        exit();
        
    }else{
        header("Location:index.html");
        exit();
}
$conn->close();

?>
