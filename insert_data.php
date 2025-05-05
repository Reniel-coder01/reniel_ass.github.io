<?php
include 'dbcon.php';

if(isset($_POST['add_students'])){
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

     // Validation for empty fields
    if (empty($fname)) {
        header('location:index.php?message=First Name is required!');
        exit();
    }
    if (empty($lname)) {
        header('location:index.php?message=Last Name is required!');
        exit();
    }
    if (empty($age)) {
        header('location:index.php?message=Age is required!');
        exit();
    }

    if (empty($fname) || empty($lname) || empty($age)) {
    header('location:index.php?message=ALL FIELDS ARE REQUIRED!');
    exit();
}else {
    $query = "INSERT INTO students (first_name, last_name, age) VALUES ('$fname', '$lname', '$age')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?message=Student added successfully!');
        exit();
    }
}

?>
