<?php 
  require_once('../config/dbconnect.php');
  $sql = "SELECT * FROM `itempurchaseorders`";
  $query = mysqli_query($connect, $sql);
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
        crossOrigin="anonymous">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    :root {
      --primary: #08aeea;
      --secondary: #13D2B8;
      --purple: #bd93f9;
      --pink: #ff6bcb;
      --blue: #8be9fd;
      --gray: #333;
      --font: "Poppins", sans-serif;
      --gradient: linear-gradient(40deg, #ff6ec4, #7873f5);
      --shadow: 0 0 15px 0 rgba(0,0,0,0.05);
    }
    *,
    *:before,
    *:after {
      box-sizing: border-box;
    }
    html {
      font-size: 62.5%;
    }

    body {
      font-family: var(--font);
      font-size: 1.4rem;
      overflow-x: hidden;
      font-weight: 300;
    }

    img {
      display: block;
      max-width: 100%;
    }

    a {
      text-decoration: none;
    }

    input,
    button,
    textarea,
    select {
      font-family: var(--font);
      font-size: 1.4rem;
      font-weight: 300;
      outline: none;
      border: 0;
      margin: 0;
      padding: 0;
      border-radius: 0;
      -webkit-appearance: none;
    }

    button {
      cursor: pointer;
    }
    
            .dropdown {
              --primary: #33ccff;
              --secondary: #47536b;
              width: 100%;
              position: relative;
              border-radius: 8px;
            }
            .dropdown-caret {
              color: var(--primary);
            }
            .dropdown-select {
              background-color: white;
              box-shadow: var(--shadow);
              padding: 1.5rem;
              border-radius: inherit;
              display: flex;
              align-items: center;
              justify-content: space-between;
              cursor: pointer;
            }
            .dropdown-select * {
              pointer-events: none;
            }
            .dropdown-list {
              position: absolute;
              top: 100%;
              left: 0;
              right: 0;
              margin-top: 1rem;
              padding: 1.5rem;
              background-color: white;
              box-shadow: var(--shadow);
              padding: 1.5rem;
              border-radius: 8px;
              display: none;
              list-style: none;
            }
            .dropdown-list:before {
              content: "";
              height: 1rem;
              position: absolute;
              top: 0;
              left: 0;
              right: 0;
              background-color: transparent;
              transform: translateY(-100%);
            }
            .dropdown-list.show {
              display: block;
            }
            .dropdown-item {
              padding: 1.5rem;
              color: var(--secondary);
              transition: all 0.25s ease;
              border-radius: 8px;
              cursor: pointer;
            }
            .dropdown-item:hover {
              color: var(--primary);
              background-color: #f1fbff;
            }
      </style>
</head>
<body>

    <div class="dropdown" id="lightdropdown">
    <div class="dropdown-select">
        <span class="dropdown-selected">Option A</span>
        <i class="fa fa-angle-down dropdown-caret"></i>
    </div>
    <ul class="dropdown-list show">
      <?php
      while($row = mysqli_fetch_assoc($query)) { ?>
        <li class="dropdown-item" data-value="Option A">
        <?php echo $row['poId'] ; ?>
        </li>
        <!-- <li class="dropdown-item" data-value="Option B">
        Option B
        </li>
        <li class="dropdown-item" data-value="Option C">
        Option C -->
        </li>
      <?php } ?>
    </ul>
    </div>
</body>
</html>