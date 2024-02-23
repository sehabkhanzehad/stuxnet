<?php
require "../database/database.php";

$sql = "SELECT * FROM users";
$result = mysqli_query($dbConnect, $sql);
?>

<?php require "dashboardHeader.php"; ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header text-center bg-primary">
                    <h3 class="text-white">User List</h3>
                </div>
                <div class="card-body">
                <?php if (isset($_SESSION["success"])) { ?>
                <div class="alert alert-success"><h6 class="text-center"><?= $_SESSION["success"] ?></h6></div>
            <?php }
            unset($_SESSION["success"]) ?>
                    <table class="table table-striped">
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
        
                        <?php foreach ($result as $key => $user) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $user["name"] ?></td>
                                <td><?= $user["username"] ?></td>
                                <td><?= $user["email"] ?></td>
                                <td><?= $user["image"] ?></td>
                                <td><a href="userDelete.php?id=<?= $user["id"] ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "dashboardFooter.php"; ?>