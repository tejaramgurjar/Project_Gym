<?php

$con = mysqli_connect("localhost","root","","yourdb");

if($con === false){
    die("ERROR!!!!!!!!".mysqli_connect_error());
}else 
    echo "Connectedd!!";

    $name = $_REQUEST["name"];
    $phone = $_REQUEST["phone"];
    $email = $_REQUEST["email"];

    

    $sql = "INSERT INTO gym VALUES ('$name', '$phone', '$email')";

    if (mysqli_query($con,$sql)) {
         echo "Data inserted successfully!";
    } else {
        echo "Error";
    }
        
mysqli_close($con);
?>
