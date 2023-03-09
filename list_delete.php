
<?php
    session_start();
    require_once "./core/connection.php";
    require_once "./core/functions.php";
    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        $id = $_POST["id"];
        $sql = "DELETE FROM my_table WHERE id = $id";
        if(mysqli_query($conn, $sql)){

            $_SESSION["status"] = [
                "message" => "List Deleted!"
            ];

            header("LOCATION:list_index.php");
        }
    }

?>
