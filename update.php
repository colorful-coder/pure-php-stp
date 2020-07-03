<?php
    include 'header.php';
?>
<body>
    <?php
        $id = $_GET['id'];
        $query = "SELECT * FROM employees WHERE id=$id";
        $result = $conn->query($query);
        if (isset($result)) {
			$n = mysqli_fetch_array($result);
			$name = $n['name'];
            $address = $n['address'];
            $salary = $n['salary'];
		}
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <h2>Employees Details</h2>
        </div>
        <form class="form" method="post" enctype="multipart/form-data" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row form-group">
                <label class="col-md-2 col-form-label">Name:</label>
                <div class="col-md-10">
                    <input type="text" name="name" class="form-control" value="<?php echo $name ?>" required>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-2 col-form-label">Address:</label>
                <div class="col-md-10">
                    <input type="text" name="address" class="form-control" value="<?php echo $address ?>" required>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-2 col-form-label">Salary:</label>
                <div class="col-md-10">
                    <input type="text" name="salary" class="form-control" value="<?php echo $salary ?>" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <button class="btn btn-success mr-5" type="submit" name="update">Update</button>
                <a href="index.php" class="btn btn-primary">Cancel</a>
            </div>
        </form>
    </div>
    <?php
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $salary = $_POST['salary'];
        
            $query= "UPDATE employees SET name='$name', address='$address', salary='$salary' WHERE id=$id"; 
            if ($conn->query($query) === TRUE) {
                $_SESSION['message'] = "Update Succefully";
                header('location: index.php');
            } else {
                echo "Error updating record: " . $conn->error; 
            }
        }
        $conn->close(); 
    ?>
</body>
</html>