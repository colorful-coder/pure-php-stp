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
        <div class="form">
            <div class="row">
                <div class="col-md-2">
                    <label>Name</label>
                </div>
                <div class="col-md-10">
                    <?php echo $name; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Address</label>
                </div>
                <div class="col-md-10">
                    <?php echo $address; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Salary</label>
                </div>
                <div class="col-md-10">
                    <?php echo $salary; ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <a href="index.php" class="btn btn-primary">OK</a>
            </div>
        </div>
    </div>
</body>
</html>