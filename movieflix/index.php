<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location: x.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="icon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <title>MovieFlix | Movie & Series</title>

</head>

<body>
    <header>
        <video src="video/guard3.mp4" loop muted></video>
        <nav>
            <div class="logo_ul">
                <a>
                    Movie <span>flix</span>
                </a>
                <ul style="display: flex;">
                    <li>
                        <i class="bi bi-house-door"></i>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <i class="bi bi-tv"></i>
                        <a id="series">Series</a>
                    </li>
                    <li>
                        <i class="bi bi-film"></i>
                        <a id="movies">Movies</a>
                    </li>
                    <li>
                        <i class="bi bi-emoji-laughing"></i>
                        <a id="kid">Kids</a>
                    </li>
                </ul>
            </div>
            <div class="search_user">
                <input type="text" placeholder="Search...." id="search_input">
                <i class="bi bi-search"></i>
                <img src="profile_img/<?php echo $_SESSION['profile_image']; ?>" alt="" class="img">

                <div class="sub" style="display: none;">
                <div class="user-info">
                    <img src="profile_img/<?php echo $_SESSION['profile_image']; ?>" alt="" class="prof">
                    <h3><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; ?></h3>
                </div>
                    <ul>
                        <li><a href="data/manage.php?ref=index.php"><i class="material-symbols-outlined">
                                    account_circle
                                </i>Manage Profile</a></li>
                        <li><a href="#"><i class="material-symbols-outlined">
                                    settings
                                </i>Settings</a></li>
                        <li><a href="#"><i class="material-symbols-outlined">
                                    currency_rupee
                                </i>Price Plan</a></li>
                        <li><a href="data/logout.php"><i class="material-symbols-outlined">
                                    logout
                                </i>Log Out</a></li>
                    </ul>
                </div>
                <div class="search">
                    <!-- //------ -->
                </div>
            </div>
        </nav>
        <div class="content">
            <h1 id="title">Movie<span>flix</span></h1>
            <p>Movieflix is just a Movie and Series Downloading Project for Web Development. This Project is Just for Educational Purpose only. This Project uses PHP and Sql Database.
            </p>
            <div class="details">
                <h6>A Movieflix Original</h6>
                <!-- <h5 id="gen">Thriller, Action</h5> -->
                <h4 id="date"></h4>
                <!-- <h3 id="rate"><span>IMDB</span><i class="bi bi-star-fill"> </i></h3> -->
            </div>
            <div class="btns">
                <a id="play">Play<i class="bi bi-play-fill"></i></a>
            </div>
        </div>
        <section>
            <h4>Popular</h4>
            <i class="bi bi-chevron-left"></i>
            <i class="bi bi-chevron-right"></i>
            <div class="cards">
                <!-- <a href="#" class="card"> -->
                <!-- <img src="img/theboys.jpg" alt="" class="poster">
                    <div class="rest_card">
                        <img src="img/boys.jpg" alt="">
                        <div class="cont">
                            <h4>The Boys</h4>
                            <div class="sub">
                                <p>Action, 2022</p>
                                <h3><span>IMDB</span><i class="bi bi-star-fill"></i>9.5</h3>
                            </div>
                        </div>
                    </div> -->
                <!-- </a> -->
            </div>
        </section>
    </header>

    <script src="js/script.js"></script>

    <script>
        // Add event listener to the cards
        document.querySelector('.cards').addEventListener('click', function(e) {
            let card = e.target.closest('.card');
            if (card) {
                let cardId = card.getAttribute('data-id');
                // console.log(cardId);
                window.location.href = `sheldon.php?id=${cardId}`;
            }
        });

    </script>
    
    <script>
        <?php if(isset($showError) && !empty($showError)): ?>
        alert("<?php echo $showError; ?>");
        <?php endif; ?>
    </script>
</body>

</html>