let left_btn = document.querySelector('.bi-chevron-left');
let right_btn = document.querySelector('.bi-chevron-right');
let cards = document.getElementsByClassName('cards')[0];
let search = document.getElementsByClassName('search')[0];
let search_input = document.querySelector('#search_input');
let searchIcon = document.querySelector('.bi-search');
let sub = document.querySelector('.sub');
let img = document.querySelector('.search_user .img');
let logo = document.querySelector('.logo_ul ul');
let _logo = document.querySelector('.logo_ul');

searchIcon.addEventListener('click', function (event) {
    if (window.innerWidth <= 430) {
        if (search_input.style.display !== 'block') {
            search_input.style.display = 'block';
            logo.style.display = 'none';
            _logo.style.marginTop = '-14px';
            search.style.visibility = 'visible';
        } else {
            console.log('clicked');
            logo.style.display = 'flex';
            search_input.style.display = 'none';
            _logo.style.marginTop = '10px';
            search.style.visibility = 'hidden';
        }
    }
    event.stopPropagation();
})

img.addEventListener('click', function (event) {
    if (sub.style.display === 'none') {
        sub.style.display = 'block';
        search.style.visibility = 'hidden';
    } else {
        sub.style.display = 'none';
        search.style.visibility = 'visible';
    }
    event.stopPropagation();
});


// This will hide the dropdown if you click anywhere outside the .user img
window.addEventListener('click', function () {
    var dropdown = document.querySelector('.sub');
    dropdown.style.display = 'none';
});

left_btn.addEventListener('click', () => {
    cards.scrollLeft -= 140;
});
right_btn.addEventListener('click', () => {
    cards.scrollLeft += 140;
});

let json_url = "movie.json";

fetch(json_url).then(Response => Response.json())
    .then((data) => {
        data.forEach((ele, i) => {
            let { id, name, imdb, date, sposter, bposter, genre, url } = ele;
            let card = document.createElement('a');
            card.classList.add('card');
            card.href = url;
            card.setAttribute('data-id', id);
            card.innerHTML = `
        <img src="${sposter}" alt="${name}" class="poster">
        <div class="rest_card">
            <img src="${bposter}" alt="">
            <div class="cont">
                <h4>${name}</h4>
                <div class="sub">
                    <p>${genre}, ${date}</p>
                    <h3><span>IMDB</span><i class="bi bi-star-fill"></i>${imdb}</h3>
                </div>
            </div>
        </div>
        `
            cards.appendChild(card);
        });

        // search data Load
        data.forEach(element => {
            let { name, imdb, date, sposter, genre, url } = element;
            let card = document.createElement('a');
            card.classList.add('card');
            card.href = url;
            card.innerHTML = `
            <img src="${sposter}" alt="">
                <div class="cont">
                    <h3>${name}</h3>
                        <p>${genre}, ${date} , <span>IMDB</span><i class="bi bi-star-fill"></i>  ${imdb}</p>
                    </div>
        `
            search.appendChild(card);
        });
        //--------search filter-----------

        search_input.addEventListener('keyup', () => {
            let filter = search_input.value.toUpperCase();
            let a = search.getElementsByTagName('a');

            for (let index = 0; index < a.length; index++) {
                let b = a[index].getElementsByClassName('cont')[0];
                let txtValue = b.textContent || b.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[index].style.display = "flex";
                    search.style.visibility = "visible";
                    search.style.display = 'block';
                } else {
                    a[index].style.display = "none";
                }
                if (search_input.value == 0) {
                    search.style.visibility = "hidden";
                    search.style.display = 'none';
                }
            }
        });

        let video = document.getElementsByTagName('video')[0];
        let play = document.getElementById('play');

        // Set the play button to the "Play" state when the window loads
        window.addEventListener('load', () => {
            video.pause();
            play.innerHTML = `Play<i class="bi bi-play-fill"></i>`;
        });

        play.addEventListener('click', () => {

            if (video.paused) {
                video.play();
                play.innerHTML = `Pause<i class="bi bi-pause-fill"></i>`
            } else {
                video.pause();
                play.innerHTML = `Play<i class="bi bi-play-fill"></i>`
            }
        });

        let series = document.getElementById('series');

        series.addEventListener('click', () => {
            cards.innerHTML = '';

            let series_array = data.filter(ele => {
                return ele.type === "series";
            });

            series_array.forEach((ele, i) => {
                let { name, imdb, date, sposter, bposter, genre, url } = ele;
                let card = document.createElement('a');
                card.classList.add('card');
                card.href = url;
                card.innerHTML = `
            <img src="${sposter}" alt="${name}" class="poster">
            <div class="rest_card">
                <img src="${bposter}" alt="">
                <div class="cont">
                    <h4>${name}</h4>
                    <div class="sub">
                        <p>${genre}, ${date}</p>
                        <h3><span>IMDB</span><i class="bi bi-star-fill"></i>${imdb}</h3>
                    </div>
                </div>
            </div>
            `
                cards.appendChild(card);
            });
        });

        let movies = document.getElementById('movies');

        movies.addEventListener('click', () => {
            cards.innerHTML = '';

            let movies_array = data.filter(ele => {
                return ele.type === "movies";
            });

            movies_array.forEach((ele, i) => {
                let { name, imdb, date, sposter, bposter, genre, url } = ele;
                let card = document.createElement('a');
                card.classList.add('card');
                card.href = url;
                card.innerHTML = `
            <img src="${sposter}" alt="${name}" class="poster">
            <div class="rest_card">
                <img src="${bposter}" alt="">
                <div class="cont">
                    <h4>${name}</h4>
                    <div class="sub">
                        <p>${genre}, ${date}</p>
                        <h3><span>IMDB</span><i class="bi bi-star-fill"></i>${imdb}</h3>
                    </div>
                </div>
            </div>
            `
                cards.appendChild(card);
            });
        });

        let kid = document.getElementById('kid');

        kid.addEventListener('click', () => {
            cards.innerHTML = '';

            let kid_array = data.filter(ele => {
                return ele.type === "kid";
            });

            kid_array.forEach((ele, i) => {
                let { name, imdb, date, sposter, bposter, genre, url } = ele;
                let card = document.createElement('a');
                card.classList.add('card');
                card.href = url;
                card.innerHTML = `
            <img src="${sposter}" alt="${name}" class="poster">
            <div class="rest_card">
                <img src="${bposter}" alt="">
                <div class="cont">
                    <h4>${name}</h4>
                    <div class="sub">
                        <p>${genre}, ${date}</p>
                        <h3><span>IMDB</span><i class="bi bi-star-fill"></i>${imdb}</h3>
                    </div>
                </div>
            </div>
            `
                cards.appendChild(card);
            });
        });

    });


