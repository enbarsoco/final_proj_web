<?php 
    include 'db.php';
    include "config.php";
    session_start();
     if(!isset($_SESSION["id"]))
         header('Location: ' . URL . 'login.php');
?>
<?php 
        $query = 'INSERT INTO tbl_prescription_217 (patient_id, doctor_id, medicine, per_day, duration, from_date, description)
        VALUES ('.$_GET["patientId"].','.$_SESSION["id"].',"'.$_GET["medicineList"].'", '.$_GET["per_day"].', '.$_GET["duration"].', "'.$_GET["from_date"].'", "'.$_GET["description"].'")';
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("query failed.");
        }
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>From</title>
            <script src="includes/js/scripts.js"></script>
            <link rel="stylesheet" href="includes/css/style.css">
        </head>
        <body id="getForm">
            <div id="wrapper">
                <h3>Prescription Sent!</h3>
            </div>
            <script>
                reLocate();
            </script>
        </body>
    </html>