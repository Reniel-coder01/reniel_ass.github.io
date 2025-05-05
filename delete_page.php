<?php
include 'dbcon.php';
if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; // Cast ID to integer
    $query = "DELETE FROM `students` WHERE `id` = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?delete_msg=Record has been deleted successfully.');
        exit();
    }
}
?>