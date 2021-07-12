<?php 
    include 'db.php';
    include "config.php";
    session_start();

     if(!isset($_SESSION["id"]))
         header('Location: ' . URL . 'login.php');
?>
<?php
    $query = 'SELECT * FROM tbl_users_217 u
    INNER JOIN tbl_user_info_217 ui ON u.id = ui.id
    WHERE ui.id = '.$_GET["patientId"];
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("query failed.");
    }
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title>MediFast</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
             integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script src="includes/js/scripts.js"></script>
            <link rel="stylesheet" href="includes/css/style.css">
        </head>
        <body id="object">
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
                    <section class="clientProfileContainer">
                        <?php 
                            echo '<img class=pic src="' .$row["profile_url"]. '"alt="profile" title="profile">
                                  <p>' .$row["name"]. '</p>
                                  <p class="phoneNum"><a href="#">' .$row["phone"]. '</a></p>'           
                        ?>
                        <?php echo'<section><a href="prescriptionForm.php?patientId=' .$row["id"]. '"><input class="prescriptionButton" type="button" value="Prescription"></a>'?>
                        </section>
                        <section><input class="informationButton" type="button" value="Ask information"></section>
                    </section>
                    <?php
                         echo '<section class = "infoContainer">
                                    <p><b>Gender</b><br>' .$row["gender"]. '</p>
                                    <p><b>Birthday</b><br>' .$row["birthday"]. '</p>
                                    <p><b>Address</b><br>' .$row["address"]. '</p>
                                    <p><b>City</b><br>' .$row["city"]. '</p>
                                    <p class="reg"><b>Registration Date</b><br>' .$row["reg_date"]. '</p>
                                    <p><b>Emergency Contact</b><br><a href="#">' .$row["emergency"]. '</a></p>
                               </section>';
                    ?>
                    <section class="questionnaireContainer">
                        <span>Request</span>
                        <section class="oneQuestionContainer">
                            <p>Does the pain radiate to one of the following areas:<br><span> Several options can be
                                    marked.</span></p>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked disabled>
                                    <label class="form-check-label">
                                        Chest
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled>
                                    <label class="form-check-label">
                                        Back
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled>
                                    <label class="form-check-label">
                                        Crotch
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled>
                                    <label class="form-check-label">
                                        Feet
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled>
                                    <label class="form-check-label">
                                        Hip
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section class="oneQuestionContainer">
                            <p>One of these symptoms came with the stomach pain:<br><span> Several options can be marked.</span>
                            </p>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled>
                                    <label class="form-check-label">
                                        Heat
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled>
                                    <label class="form-check-label">
                                        Vomiting
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked disabled>
                                    <label class="form-check-label">
                                        Constipation
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" checked disabled>
                                    <label class="form-check-label">
                                        Vomiting
                                    </label>
                                </div>
                            </div>
                        </section>
                        <div class="mb-3">
                            <label class="form-label">Description:</label>
                            <textarea name="address" class="form-control" rows="2" disabled></textarea>
                        </div>
                    </section>
                    <section class="medicalPast">
                        <p class="title">Medical Past</p>
                        <section>
                            <span class="day"></span>
                            <p class="month"></p>
                        </section>
                        <p class="sicknessName"><span class="sick"></span><br><a href="#" class="drName"></a></p>
                        <section>
                            <span class="day2"></span>
                            <p class="month2"></p>
                        </section>
                        <p class="sicknessName"><span id="sick2" data-id=<?php echo "'" . $row["id"] . "'" ?>></span><br><a href="#" class="drName2"></a></p>
                    </section>
                </div>
            </main>
            <script>insertToMedicalPast()</script>
        </body>
    </html>
<?php
    mysqli_close($connection);
?>