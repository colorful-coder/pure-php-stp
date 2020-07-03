<?php
    include 'header.php';
?>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <h2>Employees Registeration</h2>
        </div>
        <form class="form" method="post" enctype="multipart/form-data" action="">
            <div class="row form-group">
                <label class="col-md-2 col-form-label">Name:</label>
                <div class="col-md-10">
                    <input type="text" name="name" class="form-control" required>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-2 col-form-label">Address:</label>
                <div class="col-md-10">
                    <input type="text" name="address" class="form-control" required>
                </div>
            </div>
            <div class="row form-group">
                <label class="col-md-2 col-form-label">Salary:</label>
                <div class="col-md-10">
                    <input type="text" name="salary" class="form-control" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <button class="btn btn-success mr-5" type="submit" name="save">Save</button>
                <button class="btn btn-warning" type="reset">Clear</button>
            </div>
        </form> 
    </div>
    <?php
        if (isset($_POST["save"])) {
            $sql = "INSERT INTO employees (name, address, salary) VALUES ('$_POST[name]','$_POST[address]','$_POST[salary]')";
            if ($conn->query($sql) === TRUE) {    
                $_SESSION['message'] = "New record created successfully"; 
                header('location: index.php');
            } else {    
                echo "Error: " . $sql . "<br>" . $conn->error; 
            }
        }
        $conn->close(); 
    ?>
</body>
</html>