<?php
require_once('./php/config.php');
//  required function include
require("include/header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Received</title>
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/png">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'list':
                require_once 'php/list.php';
                break;
            case 'add':
                require_once 'php/add.php';
                break;
            case 'edit':
                require_once 'php/edit.php';
                break;
            case 'delete':
                require_once 'php/delete.php';
                break;
            case 'inpdf':
                require_once 'php/inpdf.php';
                break;
            default:
                require_once 'php/list.php';
                break;
        }
    } else {
        require_once 'php/list.php';
    }

    ?>
</body>
</html>