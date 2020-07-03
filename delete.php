<?php
    include 'header.php';
?>
<body>
    <div class="container">
        <form class="form" method="post" enctype="multipart/form-data" action="">
            <div class="row justify-content-center">
                <p>Are you sure want to delete???????</p>
            </div>
            <div class="row justify-content-center">
                <button class="btn btn-danger mr-5" name="delete" type="submit">Delete</button>
                <a href="index.php" class="btn btn-success pull-right">Cancle</a>
            </div>
        </form>
    </div>
    
    <?php
        if(isset($_POST['delete'])) {
            $id = $_GET['id'];
            $query = "DELETE FROM employees WHERE id=$id";
            if ($conn->query($query) === TRUE) {
                $_SESSION['message'] = "Delete Employee Successfully";    
                header('location: index.php');
            } else {    
                echo "Error deleting record: " . $conn->error; 
            }
        }
    ?>
</body>
</html>