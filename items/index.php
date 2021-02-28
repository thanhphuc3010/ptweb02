<?php
    require_once('./config/dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Dashboard Items</title>
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/png">
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <?php
        if(isset($_GET['page_layout'])) {
            switch ($_GET['page_layout']) {
                case 'list':
                    require_once 'PHP_Items/list.php';
                    break;
                case 'add':
                    require_once 'PHP_Items/add.php';
                    break;
                case 'edit':
                    require_once 'PHP_Items/edit.php';
                    break;
                case 'delete':
                    require_once 'PHP_Items/delete.php';
                    break;
                case 'view':
                    require_once 'PHP_Items/view.php';
                    break;
                default:
                    require_once 'PHP_Items/list.php';
                    break;
            }
        } else{
            require_once 'PHP_Items/list.php';
        }
    ?>
</body>
</html>