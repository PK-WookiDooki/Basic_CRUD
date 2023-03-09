<?php 
    session_start();
    require_once './core/functions.php'; 
    require_once './core/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= url('node_modules/bootstrap-icons/font/bootstrap-icons.css') ?>">
    <title>Basic CRUD with UI</title>
    <style>
        *{
            font-family: "Lucida Sans";
        }
    </style>
</head>
<body>
    <?php require_once "navbar.php"; ?>