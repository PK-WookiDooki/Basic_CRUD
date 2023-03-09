<?php require_once "./templates/header.php"; ?>

<div class=" container">
    <div class="row p-0 my-5">
        <div class="col-12 mx-auto ">
            <div class="shadow rounded-1 p-3 align-middle ">
                <h2 class=" text-center">Debt Lists</h2>
                <?php
                    $sql = "SELECT * FROM my_table";

                    if(isset($_GET["q"])){
                        $q = $_GET['q'];
                        $sql .= " WHERE name LIKE '%$q%'";
                    }
                    $query = mysqli_query($conn, $sql);

                    $totalSql = "SELECT sum(debt) AS total FROM my_table";
                    if(isset($_GET["q"])){
                        $q = $_GET['q'];
                        $totalSql .= " WHERE name LIKE '%$q%'";
                    }
                    $totalQuery = mysqli_query($conn, $totalSql);

                    if(isset($_SESSION["status"])){
                        print (alert($_SESSION["status"]["message"]));

                        $_SESSION["status"] = null;
                    }
                ?>

                <div class="row d-flex justify-content-between align-items-center my-3">
                    <h6 class="col-4">Total List: <?= $query->num_rows?></h6>
                    <div class="col-7 col-lg-3">
                    <form action="" method="get" class="input-group">
                        <input type="text" name="q" value="<?php if(isset($_GET['q'])):?><?= $_GET['q'];?> <?php endif; ?>" class="form-control" id="">
                        <?php if(isset($_GET['q'])):?>
                            <a href="./list_index.php" class="btn btn-danger input-group-text">
                                <i class="bi bi-x"></i>
                            </a>
                        <?php endif; ?>
                        <button class=" btn btn-primary input-group-text">Search</button>
                    </form>
                    </div>
                </div>

                <table class=" table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th class="text-end">Id</th>
                            <th>Name</th>
                            <th class="text-end">Debt</th>
                            <th>Date</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while( $row= mysqli_fetch_assoc($query)) : ?>
                            <tr class="text-center align-middle" >
                                <td class="text-end"> <?= $row["id"] ?> </td>
                                <td> <?= $row["name"] ?> </td>
                                <td class="text-end"> <?= $row["debt"] ?> MMK </td>
                                <td> <i class="bi bi-calendar-check"></i> <?= mySqlTimestampToPHPDate($row["created_at"]) ?> </td>
                                <td class=" d-flex justify-content-center gap-2">
                                    <a href="./list_update.php?id=<?= $row['id']; ?>" class="btn btn-primary">
                                    <i class=" bi bi-pencil"></i>
                                    </a> 
                                    <form action="./list_delete.php" method="post" class=" d-inline">
                                        <input type="hidden" name="id" value="<?= $row['id'];?>">
                                        <button onclick="return confirm('Are you sure you want to DELETE this?')" class="btn btn-danger">
                                            <i class=" bi bi-trash3"></i>
                                        </button>
                                    </form>
                                 </td>
                            </tr>
                        <?php endwhile;?>
                    </tbody>
                    <tfoot>
                    <tr class="text-center">
                        <td class="" colspan="2">Total</td>
                        <td colspan="1" class="text-end"><?= mysqli_fetch_assoc($totalQuery)['total'] ?> MMK</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once "./templates/footer.php"; ?>
