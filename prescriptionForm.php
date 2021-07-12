<?php 
    include 'db.php';
    include "config.php";
    session_start();

     if(!isset($_SESSION["id"]))
         header('Location: ' . URL . 'login.php');

    if($_SESSION['type']=='p')
        $typ ='disabled';
?>
<?php
    if($_SESSION['type']=='d') {
        $query = 'SELECT * FROM tbl_users_217 u
        INNER JOIN tbl_user_info_217 ui ON u.id = ui.id
        WHERE ui.id = '.$_GET["patientId"];
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("query failed.");
        }
        $row = mysqli_fetch_assoc($result);

        $query2 = 'SELECT * FROM tbl_user_info_217
        WHERE id = '.$_SESSION["id"];
        $result2 = mysqli_query($connection, $query2);
        if (!$result2) {
            die("query failed.");
        }
        $row2 = mysqli_fetch_assoc($result2);
    }
    if($_SESSION['type']=='p') {
        $query = 'SELECT * FROM tbl_users_217 u
        INNER JOIN tbl_user_info_217 ui ON u.id = ui.id
        WHERE ui.id = '.$_SESSION['id'];
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("query failed.");
        }
        $row = mysqli_fetch_assoc($result);

        $query2 = 'SELECT * FROM tbl_prescription_217 p
        INNER JOIN tbl_users_217 u ON p.doctor_id = u.id
        INNER JOIN tbl_user_info_217 ui ON ui.id = p.doctor_id
        WHERE prescription_id = '.$_GET["prescriptionId"].'
        ORDER BY p.sent_time';
        $result2 = mysqli_query($connection, $query2);
        if (!$result2) {
            die("query failed.");
        }
        $row2 = mysqli_fetch_assoc($result2);
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
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script src="includes/js/scripts.js"></script>
            <link rel="stylesheet" href="includes/css/style.css">
        </head>
        <body id="prescription">
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
            <form action=getForm.php method="get">
                <div id="wrapper">
                    <h1>Prescription</h1>
                    <?php
                        if($_SESSION['type']== 'd') {
                          
                        echo'  <section>
                                    <label class="form-label">Doctor׳s Name:</label>
                                    <input type="text" class="form-control" value="'.$_SESSION["name"]. '" '.$typ.'>
                                    <label class="form-label">Phone Number:</label>
                                    <input type="tel" class="form-control" value="'.$row2["phone"]. '"'.$typ.'>
                                </section>';
                        }
                        if($_SESSION['type']== 'p') {       
                            echo' <section
                                    <label class="form-label">Doctor׳s Name:</label>
                                    <input type="text" class="form-control" value="'.$row2["name"]. '" '.$typ.'>
                                    <label class="form-label">Phone Number:</label>
                                    <input type="tel" class="form-control" value="'.$row2["phone"]. '"'.$typ.'>
                                </section>';
                        }
                        echo '<section>
                                    <label class="form-label">Patient׳s Name:</label>
                                    <input type="text" class="form-control" value="'.$row["name"]. '"'.$typ.'>
                                    <label class="form-label">ID Number:</label>
                                    <input type="text" class="form-control" value="'.$row["phone"]. '"'.$typ.'>
                                    <label class="form-label">Birthday:</label>
                                    <input type="text" class="form-control" value="'.$row["birthday"]. '"'.$typ.'>
                                    <label class="form-label">Sexual:</label>
                                    <input type="text" class="form-control" value="'.$row["gender"]. '"'.$typ.'>
                                    <label class="form-label">Address:</label>
                                    <input type="text" class="form-control" value="'.$row["address"]. '  ' .$row["city"]. '"'.$typ.'>
                                </section>'
                    ?>
                    <section>
                        <p>Constipation</p>
                        <select class="form-select" name="medicineList" aria-label="Default select example" <?php echo $typ?>>
                            <option selected>Select Medicine</option>
                            <option value="DULCOLAX 400MG">DULCOLAX 400MG</option>
                            <option value="HYDRALAZINE 100MG">HYDRALAZINE 100MG</option>
                            <option value="AMIKACIN 200MG">AMIKACIN 200MG</option>
                            <option value="LEVOTHYROXINE 300MG">LEVOTHYROXINE 300MG</option>
                            <option value="TENOFOVIR 100MG">TENOFOVIR 100MG</option>
                            <option value="VOXELOTOR 200MG">VOXELOTOR 200MG</option>
                        </select>
                        <section class="medicine">
                            <label>Per Day:</label>
                            <input type="text" name="per_day" <?php echo 'value="' .$row2["per_day"].'" '.$typ.''?>>
                            <label>Duration:</label>
                            <input type="text" name="duration" <?php echo 'value="' .$row2["duration"].'" '.$typ.''?>>
                            <div class="mb-3">
                                <span>Description:</span>
                                <textarea name="description" class="form-control" id="textArea" rows="4" <?php echo $typ?>><?php echo $row2["description"] ?></textarea>
                            </div>
                        </section>
                        <input type="text" id="datepicker" placeholder="From" name="from_date" <?php echo $typ. ' value="'.$row2["from_date"].'"'?>>
                    </section>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <?php 
                                if($_SESSION['type']=='d') {
                                    echo '<input class="btn btn-primary" type="submit" value="Submit">';
                                }
                                    echo '<input  type="hidden" name="patientId" value="'.$row["id"].'">';
                                if($_SESSION['type']=='p') {
                                    echo'<section class="buttons">
                                            <a href="#">Accept</a>
                                            <a href="new.php?deletePrescription='.$row2["prescription_id"].'">Delete</a>
                                        </section>';
                                }
                            ?>
                        </div>
                    </div>
                </form>
            </main>
            <script>
                $( function() {
                    $( "#datepicker" ).datepicker();
                } );
            </script>
        </body>
    </html>
<?php
    mysqli_close($connection);
?>