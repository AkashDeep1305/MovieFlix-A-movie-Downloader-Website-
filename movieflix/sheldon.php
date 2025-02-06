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
        <video src="video" loop muted></video>
        <nav>
            <div class="logo_ul">
                Movie <span>flix</span>
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
                <!-- Movie <span>flix</span> -->
                <div class="sub" style="display: none;">
                    <div class="user-info">
                        <img src="profile_img/<?php echo $_SESSION['profile_image']; ?>" alt="" class="prof">
                        <h3><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; ?></h3>
                    </div>
                    <ul>
                        <li><a href="data/manage.php?ref=sheldon.php" id="manageProfileLink"><i class="material-symbols-outlined">
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

                </div>
            </div>
            </div>
        </nav>

        <div class="content">
            <h1 id="title">Movie Title</h1>
            <p id="p">Movie Description</p>
            <div class="details">
                <h6>A Movieflix Original Movie</h6>
                <h5 id="gen">Genre</h5>
                <h4 id="date">Release Date</h4>
                <h3 id="rate"><span>IMDB</span><i class="bi bi-star-fill"> </i></h3>

            </div>
            <div class="btns">
                <a id="play">Play<i class="bi bi-play-fill"></i></a>
                <!-- <a href="#" id="play">Watch<i class="bi bi-play-fill"></i></a> -->
                <a href="#" download="_480" id="low_q">480p</a>
                <a href="#" download="_720" id="medium_q">720p</a>
                <a href="#" download="_1080" id="high_q">1080p</a>
            </div>
        </div>

        <section>
            <h4>Popular</h4>
            <i class="bi bi-chevron-left"></i>
            <i class="bi bi-chevron-right"></i>
            <div class="cards">
                
            </div>
        </section>
    </header>
    <script src="js/script.js"></script>

    <script>

        document.querySelector('.cards').addEventListener('click', function(e) {
            let card = e.target.closest('.card');
            if (card) {
                let cardId = card.getAttribute('data-id');
                // console.log(cardId);

                window.location.href = `sheldon.php?id=${cardId}`;
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Function to get URL parameters
            function getParameterByName(name, url = window.location.href) {
                name = name.replace(/[\[\]]/g, '\\$&');
                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, ' '));
            }

            // Get id from URL
            let id = getParameterByName('id');

            // Function to update the content
            function updateContent(id) {
                id = Number(id);
                fetch(json_url)
                    .then((response) => response.json())
                    .then((data) => {
                        let content = data.find((item) => item.id === id);
                        if (content) {
                            // console.log("Content found:", content);
                            document.getElementById('title').innerText = content.name;
                            document.getElementsByTagName('video')[0].setAttribute('src', content.trailer);
                            document.getElementsByTagName('video')[0].play();
                            document.getElementById('low_q').href = content.low;
                            document.getElementById('medium_q').href = content.medium;
                            document.getElementById('high_q').href = content.high;
                            document.getElementById('p').innerText = content.p;
                            document.getElementById('gen').innerText = content.genre;
                            document.getElementById('date').innerText = content.date;
                            document.getElementById('rate').innerHTML = `<span>IMDB</span><i class="bi bi-star-fill">${content.imdb}</i>`;
                        }
                    })
                    .catch((error) => {
                        console.error('Error fetching data:', error);
                    });
            }

            updateContent(id);
        });

    </script>

    <script>
        <?php if(isset($showError) && !empty($showError)): ?>
        alert("<?php echo $showError; ?>");
        <?php endif; ?>
    </script>

</body>

</html>