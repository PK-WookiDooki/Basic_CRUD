<?php require_once "./templates/header.php"; ?>

<div class=" container">
    <div class="row p-0 my-5">
        <div class="col-12 col-lg-5 mx-auto ">
            <div class="shadow rounded-1 p-3 py-4">
                <h3 class=" text-center">Update List</h3>


                <?php
                    $id = $_GET["id"];
                    $sql = "SELECT * FROM my_table WHERE id = $id";
                    $query = mysqli_query($conn, $sql);
                    $currentId = mysqli_fetch_assoc($query);
                ?>
                
                <form action="./list_update_info.php" method="post">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="mb-3">
                        <label for="name" class=" form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?= $currentId["name"]; ?>" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="money" class=" form-label">Money</label>
                        <input type="number" name="money" class="form-control" value="<?= $currentId["debt"]; ?>" required>
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once "./templates/footer.php"; ?>
