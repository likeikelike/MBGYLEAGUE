<?php require 'mbgyleague/Connections/Connections.php' ?>
<?php $id=$_GET["id"];?>
<?php
    session_start();
    if(isset($_SESSION["UserID"])){

    }else{
        header('Location: Login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link href="mbgyleague/mbgyleague-css/Menu.css" rel="stylesheet" type="text/css">
    <link href="mbgyleague/mbgyleague-css/Master.css" rel="stylesheet" type="text/css">
    <style>
      table { font-family: Arial, Helvetica, sans-serif; }
      .odd {background-color: lightgray;}
      .even {background-color: white;}
      td {
        padding: 7px;
        padding-bottom: 7px;
        padding-right: 20px;
        padding-left: 15px;
      }
      .title {font-weight: bold; padding-right: 30px;}
      td:last-child {font-style: italic;}
    </style>
    <meta charset="utf-8">
    <title>Account</title>
</head>

<body>
    <div class="Container">
        <div class="Header">
        </div>
        <div class="menu">
            <div id="Menu">
                <nav>
                    <ul class="cssmenu">

                        <li><a href="Register.php">Register</a></li>
                        <li><a href="Login.php">Log in</a></li>

                    </ul>
                </nav>
            </div>

        </div>
        <div class="LeftBody">
            <p><a href="Logout.php">Log out</a></p>
        </div>
        <div class="RightBody">
          <?php
            $result = mysqli_query($con,"SELECT Name, Username FROM `user` WHERE UserID = $id;");
            $elo_result = mysqli_query($con,"SELECT elo FROM `lolplayers` WHERE id = $id;");
            $row = mysqli_fetch_array($result);
            $elo = mysqli_fetch_array($elo_result);

            echo "<table cellspacing='0'>";

              echo "<tr class='odd'>";
                echo "<td class='title'><strong>Name</strong></td>";
                echo "<td>" . $row['Name'] . "</td>";
              echo "</tr>";

              echo "<tr class='even'>";
                echo "<td class='title'>Username</td>";
                echo "<td>" . $row['Username'] . "</td>";
              echo "</tr>";

              echo "<tr class='odd'>";
                echo "<td class='title'>Rating</td>";
                echo "<td>" . $elo['elo'] . "</td>";
              echo "</tr>";

            echo "</table>";

            mysqli_close($con);
          ?>
            <?php echo $_SESSION['UserID'];?>
        </div>
        <div class="Footer"></div>
    </div>

</body>
</html>
