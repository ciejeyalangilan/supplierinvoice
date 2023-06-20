<?php

require_once('classes/database.php');

$con = new database();

session_start();
if (empty($_SESSION['username'])) {
    header('location:login.php');
}

?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($con->delete($id)) {
        header('location:index.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<?php include('includes/header.php'); ?>


<body>
    <main>

        <?php include('includes/navbar.php'); ?>

        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12 text-center mt-5">

                    <div class="form-signin">

                        <h1 class="h3 mb-3 fw-normal">Supplier List</h1>
                        <hr>

                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Date Today</td>
                                    <td>Supplier Name/Payee</td>
                                    <td>Invoice Number</td>
                                    <td>Date of Invoice</td>
                                    <td>Description</td>
                                    <td>Date Paid</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $data = $con->view();
                                $counter = 1;
                                foreach ($data as $rows) {
                                ?>

                                <tr>
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $rows['dtoday']; ?></td>
                                    <td><?php echo $rows['sname']; ?></td>
                                    <td><?php echo $rows['invnum']; ?></td>
                                    <td><?php echo $rows['invdate']; ?></td>
                                    <td><?php echo $rows['descri']; ?></td>
                                    <td><?php echo $rows['datepaid']; ?></td>
                                    <td>
                                        <a href="update.php?id=<?php echo $rows['id'] ?>"
                                            class="btn btn-success btn-sm">Update </a>
                                        <a href="index.php?id=<?php echo $rows['id'] ?>"
                                            class="btn btn-danger btn-sm">Delete </a>
                                    </td>
                                </tr>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

    </main>


</body>

</html>