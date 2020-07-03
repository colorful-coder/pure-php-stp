<?php
    include 'header.php';
?>
    <div class="container">
        <div class="row justify-content-center">
            <h2>Employees Details</h2>
        </div>
        <div class="row mb-3">
            <div class="col-md-9">
                <p class="message">
                    <?php
                        if (isset($_SESSION['message'])) {
                            echo "<div class='message'>";
                            echo $_SESSION['message']; 
                            unset($_SESSION['message']);
                            echo "</div>";
                        }
                    ?>
                </p>
            </div>
            <div class="col-md-3">
                <a href="create.php" class="btn btn-success">Add New Employee</a>
            </div>
        </div>
        <?php
            $query = "SELECT * from employees";
            $result = $conn->query($query);
            if($result->num_rows > 0) {
                echo "
                <table class='table table-bordered table-striped employee'>
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>Address</th>
                            <th scope='col'>Salary</th>
                            <th scope='col'>Action</th>
                        </tr>
                    </thead>";
                    while($row = $result->fetch_assoc()) {        
                        echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['salary'] . "</td>";
                            echo "<td>";
                                echo "<a href='read.php?id=". $row['id'] ."' class='btn btn-sm mr-3 btn-primary'>View</a>";
                                echo "<a href='update.php?id=". $row['id'] ."' class='btn btn-sm mr-3 btn-success'>Update</a>";
                                echo "<a href='delete.php?id=". $row['id'] ."' class='btn btn-sm mr-3 btn-danger'>Delete</a>";
                            echo "</td>";
                        echo "</tr>"; 
                    }    
                    echo "</table>"; 
            } else {
                echo "Result is not"; 
            }
            $conn->close();
        ?>
    </div>
</body>
</html>
