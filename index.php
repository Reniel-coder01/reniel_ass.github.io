<?php include 'header.php'; ?>
<?php include 'dbcon.php'; ?>

  <div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Manage Records</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENTS</button>
  </div>
  </div>

    <table>
        <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th><center>Update</center></th>
                <th><center>Delete</center></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM students";
                $result = mysqli_query($connection, $query); 

                if (!$result){
                    die("Query Failed: " . mysqli_error($connection));
                }else{
                    while ($row = mysqli_fetch_assoc($result))
                {
                ?>

                <tr>
                    <td><?php echo $row ['id']; ?></td>
                    <td><?php echo $row ['first_name']; ?></td>
                    <td><?php echo $row ['last_name']; ?></td>
                    <td><?php echo $row ['age']; ?></td>
                    <td><center><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></center></td>
                    <td><center><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></center></td>

                </tr>
            <?php } 
            } ?>
        </tbody>
    </table>

<?php
if(isset($_GET['update_msg'])){
    echo "<h6 style='color: blue; text-align: center;'>" . $_GET['update_msg'] . "</h6>";
}
?>

<?php
if(isset($_GET['delete_msg'])){
    echo "<h6 style='color: red; text-align: center;'>" . $_GET['delete_msg'] . "</h6>";
}
?>

    <?php
if(isset($_GET['message'])){
    echo "<h6 style='color: red; text-align: center;'>" . $_GET['message'] . "</h6>";
}
?>
<?php
if(isset($_GET['insert_msg'])){
    echo "<h6 style='color: green; text-align: center;'>" . $_GET['insert_msg'] . "</h6>";
}
?>




<!-- Modal -->
<form action="insert_data.php" method="post">

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">+ Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control">
          </div>

           <div class="mb-3">
            <label for="l_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="l_name" name="l_name">
          </div>

          <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="text" class="form-control" id="age" name="age">
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'footer.php'; ?>

    