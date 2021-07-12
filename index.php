<?php 
    include 'db.php';
    include "config.php";
    session_start();

     if(!isset($_SESSION["id"]))
         header('Location: ' . URL . 'login.php');
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
        <body id="homepage">
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
                    <article class="aboutUs">
                        <h3>About us</h3>
                        <p>MediFast will provide online and fast medical care and thus prevent unnecessary reaching to
                            hospitals.</p>
                    </article>
                    <article class="carouselContainer">
                        <h3>Medical News</h3>
                        <p>The most recent medical news and articles</p>
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/corona.jpeg" class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                        <a href="https://www.bbc.com/news/world-us-canada-57000354">
                                            <p>Canada authorises Pfizer vaccine for children aged 12 to 15</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="images/baby.jpeg" class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                        <a href="https://www.bbc.com/news/education-56945821">
                                            <p>Surgery in the womb: 'I've done the best for her'.</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="images/india2.jpeg" class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                        <a href="https://www.bbc.com/news/world-asia-india-56976214">
                                            <p> India Covid: Opposition calls for full national lockdown.</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </article>
                    <section class="reqContainer">
                        <a href="new.php">
                            <section>
                                <h4>New Requsts</h4>
                            </section>
                        </a>
                        <a href="new.php">
                            <section>
                                <h4>Pending Requsts</h4>
                            </section>
                        </a>
                    </section>
                </div>
            </main>
        </body>
    </html>
<?php
    mysqli_close($connection);
?>