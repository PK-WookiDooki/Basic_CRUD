<?php require_once "./templates/header.php"; ?>

<div class=" container">
    <div class="row p-0 my-5">
        <div class="col-12 col-lg-5 mx-auto ">
            <div class="shadow rounded-1 p-3 py-4">
                <h3 class=" text-center">Create List</h3>


                <?php

                    if($_SERVER["REQUEST_METHOD"] === "POST"){
                        $name = $_POST["name"];
                        $money = $_POST["money"];
                    

                    $sql = "INSERT INTO my_table (name,debt) VALUES ('$name', $money)";

                    if(mysqli_query($conn, $sql)){
                        $_SESSION["status"] = [
                            "message" => "Data Inserted!"
                        ];
                        header("Location:list_index.php");
                    }
                }
                ?>
                
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class=" form-label">Name</label>
                        <input type="text" name="name" class="form-control" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="money" class=" form-label">Money</label>
                        <input type="number" name="money" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once "./templates/footer.php"; ?>
