<?php

require_once('classes/database.php');
$con = new database();
session_start();

if (empty($_SESSION['username'])) {
    header('location:login.php');
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
                <div class="col-md-12 mt-5">

                    <div class="col-md-4 form-signin">

                        <h1 class="h3 mb-3 fw-normal">Edit Supplier</h1>
                        <hr>


                        <?php
                            // get data
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $data = $con->viewdata($id);
                            }

                            // update data
                            if (isset($_POST['update'])) {
                                $id = $_POST['id'];
                                $dtoday = $_POST['dtoday'];
                                $sname = $_POST['sname'];
                                $invnum = $_POST['invnum'];
                                $invdate = $_POST['invdate'];
                                $descri = $_POST['descri'];
                                $datepaid = $_POST['datepaid'];
                                if ($con->update($id, $dtoday, $sname, $invnum, $invdate, $descri, $datepaid )) {
                                    header('location:index.php');
                                } else {
                                    echo "error";
                                }
                            } 

                        ?>


                        <form method="post">    
                            <div class="form-group mb-3">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Date</label>
                                <input type="text" name="dtoday" value="<?php echo $data['dtoday']; ?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Supplier Name/Payee</label>
                                <input type="text" name="sname" value="<?php echo $data['sname']; ?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Invoice Number</label>
                                <input type="text" name="invnum" value="<?php echo $data['invnum']; ?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Date of Invoice</label>
                                <input type="text" name="invdate" value="<?php echo $data['invdate']; ?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Description</label>
                                <input type="text" name="descri" value="<?php echo $data['descri']; ?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Date Paid</label>
                                <input type="text" name="datepaid" value="<?php echo $data['datepaid']; ?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="submit" name="update" class="btn btn-success btn-lg" value="Update">
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>

    </main>


</body>

</html>