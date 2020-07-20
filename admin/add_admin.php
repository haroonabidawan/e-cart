<?php
    include("includes/db.php");
    include("includes/functions.php");
    include("includes/session.php");
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Including Head -->
    <?php
    include("includes/head.php");
    ?>


</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <?php
        include("includes/side-bar.php");
        ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <!-- Including Top Nav -->
            <?php
            include("includes/nav.php");
            ?>

            <div class="container-fluid">
                <!-- Page Content -->


                <h4 class="mt-4">Add New Admin</h3>
                    <hr>
                    <div class="container" style="padding: 70px;">
                        <form method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Phone</label>
                                    <input type="number" class="form-control" name="phone" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city"  required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>State/Provence</label>
                                    <select class="form-control" name="state"  required>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Sindh">Sindh</option>
                                        <option value="Bolochistan">Bolochistan</option>
                                        <option value="K P K">K P K</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Zip</label>
                                    <input type="number" class="form-control" name="zip"  required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Type</label>
                                    <select class="form-control" name="type"  required>
                                        <option value="2">Admin</option>
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="offset-5">
                            <button onclick="confirm('Are you sure you want to add a new admin');" type="submit" class="btn btn-outline-success" name="add_admin">Add Admin</button>
                            </div>
                        </form>
                    </div>


                    <!-- /Page Content -->
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- including script -->
    <?php
    include("includes/script.php");
    ?>
</body>

</html>