<?php

$con = mysqli_connect("localhost","root","","yourdb");

if($con === false){
    die("ERROR!!!!!!!!".mysqli_connect_error());
}else 
    echo "Connectedd!!";

    $name = $_REQUEST["name"];
    $phone = $_REQUEST["phone"];
    $email = $_REQUEST["email"];
    $gender = $_REQUEST["gender"];
    $membership = $_REQUEST["membership"];
    $duration = $_REQUEST["duration"];

    

    $sql = "INSERT INTO membership_data VALUES ('$name', '$phone', '$email' , '$gender' , '$membership' , '$duration')";

    if (mysqli_query($con,$sql)) {
         echo "Data inserted successfully!";
    } else {
        echo "Error";
    }  
        
mysqli_close($con);
?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $membership = $_POST["membership"];
    $duration = $_POST["duration"];

    // Create the email message
    $to = "your-email@example.com";  // Replace with your email address
    $subject = "New Gym Membership Form Submission";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone Number: $phone\n";
    $message .= "Gender: $gender\n";
    $message .= "Membership Type: $membership\n";
    $message .= "Membership Duration: $duration Months\n";

    // Send the email
    mail($to, $subject, $message);

    // You can add additional processing here, such as saving the data to a database

    // Redirect to a thank you page
    header("Location: thank-you.html");
    exit();
}

?>
