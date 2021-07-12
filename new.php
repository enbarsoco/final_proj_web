<?php 
    include 'db.php';
    include "config.php";
    session_start();

     if(!isset($_SESSION["id"]))
         header('Location: ' . URL . 'login.php');      
?>
<?php
    if(isset($_GET["deletePrescription"])) {
        $deletQuery="DELETE FROM tbl_prescription_217
        WHERE prescription_id=" . $_GET["deletePrescription"] ;
        $deleteResult= mysqli_query($connection, $deletQuery);

        if(!$deleteResult) {
            die("DB query failed.");
        }
    }
?>

<?php
    if($_SESSION['type']=='d') {
        $query = "SELECT * FROM tbl_patients_217 p
        INNER JOIN tbl_users_217 u ON p.id = u.id";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("query failed.");
        }
    }
    else if($_SESSION['type']=='p') {
        $query = 'SELECT * FROM tbl_prescription_217 p
        INNER JOIN tbl_users_217 u ON p.patient_id = u.id
        INNER JOIN tbl_user_info_217 ui ON u.id = ui.id
        WHERE u.id = '.$_SESSION["id"];
        $result = mysqli_query($connection, $query);
        $tmp    = mysqli_query($connection, $query);
        if (!$result) {
            die("query failed.");
        }
        $row = mysqli_fetch_assoc($tmp);
    }
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title>MediFast</title>
            <script src="includes/js/scripts.js"></script>
            <link rel="stylesheet" href="includes/css/style.css">
        </head>

        <body id="listPage">
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
                    <?php
                        if($_SESSION['type']=='d') {
                            $q = "SELECT count(*) a FROM tbl_patients_217";
                            $cResult = mysqli_query($connection, $q);
                            if (!$cResult) {
                                die("query failed.");
                            }
                        }
                        else {
                            $q = 'SELECT count(*) a FROM tbl_prescription_217
                            WHERE patient_id ='.$_SESSION["id"];
                            $cResult = mysqli_query($connection, $q);
                            if (!$cResult) {
                                die("query failed.");
                            }
                        }
                        $row =mysqli_fetch_assoc($cResult);
                        echo '<h3>Hello '. $_SESSION["name"] .'!</h3>
                              <p class="pending">You have '.$row["a"] .' new requests</p>';
                    ?>          
                    <section class="mainContent">
                        <?php
                            if($_SESSION['type']=='d') {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo '<article>
                                            <img class="patient-img" src="'. $row["profile_url"] .'" alt="proflie" title="profile">
                                            <p class="client"><b>'. $row["name"] .'</b></p>
                                            <p class="sickness">'. $row["symptom"] .'</p>
                                            <p class="time">'. $row["sent_time"] .'<br>Today</p>
                                            <a href="object.php?patientId='. $row["id"]. '"></a>
                                            </article>';
                                }
                            }
                            else {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $query2 = 'SELECT * FROM tbl_users_217 
                                    WHERE id = '.$row["doctor_id"];
                                    $result2 = mysqli_query($connection, $query2);
                                    if (!$result2) {
                                        die("query failed.");
                                    }
                                    $row2 = mysqli_fetch_assoc($result2);  
                                    echo '<article>
                                            <img class="patient-img" src="'. $row2["profile_url"] .'" alt="proflie" title="profile">
                                            <p class="client"><b>'. $row2["name"] .'</b></p>
                                            <p class="time">'. $row["sent_time"] .'<br>Today</p>
                                            <a href="prescriptionForm.php?prescriptionId='. $row["prescription_id"]. '"></a>
                                          </article>';
                                }
                            }
                        ?>
                    </section>
                </div>
            </main>
        </body>
    </html>
<?php
    mysqli_close($connection);
?>
