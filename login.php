<?php
    include 'db.php';
    include "config.php";

    session_start();

    if(isset($_POST["logout"]))
    {
        session_destroy();
    }
    if(!empty($_POST["loginMail"])) {
        $query  = "SELECT * FROM tbl_users_217 WHERE email='" 
        . $_POST["loginMail"] 
        . "' and password = '"
        . $_POST["loginPass"]
        ."'";
        $result = mysqli_query($connection , $query);
        $row    = mysqli_fetch_array($result);
        
        if(is_array($row)) {
            $_SESSION["id"] = $row['id'];
            $_SESSION["profile"] = $row['profile_url'];
            $_SESSION["name"] = $row['name'];
            $_SESSION["type"] = $row['type'];
            header('Location: ' . URL . 'index.php');
        } else {
            $message = "Invalid Username or Password!";
        }
    }
?>


<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Login</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
                crossorigin="anonymous"></script>
                <link rel="stylesheet" href="includes/css/style.css">
        </head>

        <body id="login">
            <div class="wrapper">
                <article></article>
                <form action="#" method="post" id="frm">
                    <div class="form-group">
                        <input type="email" class="form-control" name="loginMail" id="loginMail" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="loginPass" id="loginPass" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">LOGIN</button>
                    <div class="error-message">
                    
                        <?php if(isset($message)) { echo $message; } ?>
                    </div>
                    <p>Don't have an account? <a href="#">Sign up</a></p>
                </form>
            </div>
        </body>
    </html>
<?php
    mysqli_close($connection);
?>
