<?php
include('dbcon.php');
if (isset($_POST['update_students'])) {
    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    $query = "UPDATE `students` SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' WHERE `id` = '$idnew'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header("Location: index.php?update_msg=You have successfully updated the data.");
        exit();
    }
}
?>


<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
  <div class="form-group">
    <label for="f_name">First Name</label>
    <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>">
  </div>
  <div class="form-group">
    <label for="l_name">Last Name</label>
    <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>">
  </div>
  <div class="form-group">
    <label for="age">Age</label>
    <input type="number" name="age" class="form-control" value="<?php echo $row['age']; ?>">
  </div><br>
  <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>
