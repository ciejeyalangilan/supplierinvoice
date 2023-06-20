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
                        


                        <?php
                            if (isset($_POST['save'])) {
                                $dtoday = $_POST['dtoday'];
                                $sname = $_POST['sname'];
                                $invnum = $_POST['invnum'];
                                $invdate = $_POST['invdate'];
                                $descri = $_POST['descri'];
                                $datepaid = $_POST['datepaid'];
                                if ($con->save($dtoday, $sname, $invnum, $invdate, $descri, $datepaid )) {
                                    header('location:index.php');
                                } else {
                                    echo "error";
                                }
                            }

                        ?>

                        <form method="post">
                            <div class="form-group mb-3">
                                <label>Date Today:</label>
                                <input type="text" class="form-control" name="dtoday" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Supplier Name:</label>
                                <input type="text" class="form-control" name="sname" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Invoice Number:</label>
                                <input type="text" class="form-control" name="invnum" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Date of Invoice:</label>
                                <input type="text" class="form-control" name="invdate" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Description/Particulars:</label>
                                <input type="text" class="form-control" name="descri" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Date Paid:</label>
                                <input type="text" class="form-control" name="datepaid" required>
                            </div>
                          
                            <div class="form-group mb-3">
                                <input type="submit" class="btn btn-success btn-lg" name="save" value="Save">
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>

    </main>


</body>

</html>