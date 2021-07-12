<?php 
    include 'db.php';
    include "config.php";
    session_start();

     if(!isset($_SESSION["id"]))
         header('Location: ' . URL . 'login.php');
?>

<?php
    $query = 'SELECT * FROM tbl_users_217 
    WHERE id ='. $_SESSION["id"];
    $result = mysqli_query($connection, $query);
    $row    = mysqli_fetch_array($result);
    if (!$result) {
        die("query failed.");
    }
?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title>MediFast</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
                crossorigin="anonymous"></script>
            <script src="includes/js/scripts.js"></script>
            <link rel="stylesheet" href="includes/css/style.css">
        </head>

        <body id="profilePage">
            <header>
                <a id="logo" href="index.php"></a>
                <a href="profilePage.php" class="profile"><img class="profile" src="<?php echo $_SESSION["profile"] ?>" alt="profile picture"></a>
                <section class="online"></section>
                <a class="menu" href="#"></a>
                <a class="searchPhone" href="#"><img src="images/search.svg" alt="search"></a>
            </header>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="new.php">New Requests</a></li>
                    <li><a href="new.php">Pending Requests</a></li>
                </ul>
                <a class="search" href="#"><img src="images/search.svg" alt="search"></a>
            </nav>
            <main>
             
              <div id="wrapper">
                  <section>
                      <?php echo'<img src="' .$row["profile_url"]. '" alt="profile" title="profile">'?>
                      <ul>
                        <li><a href="#">Details</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="login.php?logout=true" method="post">Logout </a></li>
                      </ul>
                  </section>
                  <section>
                  <form action=profilePage.php method="get">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Full Name:</label>
                            <?php echo '<input type="text" class="form-control" name="name" value="' .$row["name"]. '">'?>    
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email:</label>
                            <?php echo '<input type="text" class="form-control" name="email" value="' .$row["email"]. '">'?>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password:</label>
                            <?php echo '<input type="password" class="form-control" id="showPass" name="pass" value="' .$row["password"]. '">'?>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Profile Picture:</label>
                            <?php echo '<input type="text" class="form-control" name="profile_url" value="' .$row["profile_url"]. '">'?>
                        </div>
                        <input type="hidden" name="state" value="edit">
                        <input type="submit" class="btn btn-info"  value="Submit">           
                    </form>
                  </section>
                  </div>
            </main>
            <script>showPassword()</script>
        </body>
    </html>
<?php
    mysqli_close($connection);
?>