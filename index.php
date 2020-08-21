<?php
    $insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $pass = "";

    $con = mysqli_connect($server, $username, $pass);

    if(!$con)
    {
        die("connection to this database failed due to". mysqli_connect_error());
    }
    // echo "Succesfully Conected";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `subodh`.`trip` (`name`, `age`, `gender`, `address`, `phone`, `email`, `dt`) VALUES ('$name', '$age', '$gender', '$address', '$phone', '$email', current_timestamp());";
    // echo $sql;
    if($con->query($sql) == true){
        // echo "Succesfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subodh Trip</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="ss.jpg" alt="ss jain subodh college" width="100%" height="80%">
    <div class="container">
        <h1>Welcome to S.S. Jain Subodh College Trip</h1>
        <p>Enter your detail and submit this form to confirm your participation in the trip.</p>
        <?php
        if($insert == true){
        echo "<p class='p2'>Thanks for submitting your form for college trip.</p>";
        }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter Your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="address" id="address" placeholder="Enter your address">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your phone">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>

