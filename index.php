<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

  <!-- <link rel="stylesheet" href="css/style.css"> -->

  <!-- <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/icon-styles.css"> -->

  <!--This ones the compressed css file -->
  <link rel="stylesheet" href="css/style.min.css">
  <link rel="shortcut icon" type="image/png" href="img/favicon.png">
  <title>Natours | Exciting tours for adventurous people</title>
</head>

<body>

  <div class="navigation">
    <input type="checkbox" class="navigation__checkbox" id="navi-toggle">
    <label for="navi-toggle" class="navigation__button">
      <span class="navigation__icon">
        &nbsp;
      </span>
    </label>
    <div class="navigation__background"> &nbsp; </div>
    <nav class="navigation__nav">
      <ul class="navigation__list">
        <li class="navigation__item"><a href="" class="navigation__link"><span>01 </span>About Natours</a></li>
        <li class="navigation__item"><a href="" class="navigation__link"><span>02 </span>Your benefit</a></li>
        <li class="navigation__item"><a href="" class="navigation__link"><span>03 </span>Popular tours</a></li>
        <li class="navigation__item"><a href="https://sugamphirke.com/Projects/natours/accounts/logout.php" class="navigation__link"><span>04 </span>Logout</a></li>
        <li class="navigation__item"><a href="" class="navigation__link"><span>05 </span>Book now</a></li>
      </ul>
    </nav>
  </div>

  <header class="header">
    <div class="header__logo-box">
      <img src="img/logo-white.png" alt="Logo" class="header__logo">
    </div>

    <div class="accounting">
      <a href="https://sugamphirke.com/Projects/natours/accounts/" class="accounting__image-button">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player id="anime1" src="https://assets3.lottiefiles.com/packages/lf20_sy48zdcn.json" background="transparent" speed="1" style="width: 50px; height: 50px;" loop autoplay></lottie-player>
        <lottie-player id="anime2" class="accounting__anime" src="https://assets5.lottiefiles.com/packages/lf20_Hltaflytha.json" background="transparent" speed="1" style="width: 50px; height: 50px;" loop autoplay></lottie-player>
      </a>
      <div id="account" class="accounting__username-block"></div>
    </div>

    <div class="header__text-box">
      <h1 class="heading-primary">
        <span class="heading-primary--main">Outdoors</span>
        <span class="heading-primary--sub">is where life happens</span>
      </h1>
      <a href="#" class="btn btn--white btn--animated">Discover our tours</a>
    </div>
  </header>

  <main>

    <section class="section-about">
      <div class="u-center-text u-bottom-margin-big">
        <h2 class="heading-secondary"> <!-- this is centered in the utility file -->
          Exciting tours for adventurous people
        </h2>
      </div>

      <div class="row">
        <div class="col-1-of-2">
          <h3 class="heading-tertiary u-bottom-margin-small">
            You're going to fall in love with nature
          </h3>
          <p class="paragraph">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga error quasi facilis dolore
            voluptatem quisquam nobis odit velit iste libero labore laudantium nulla eos ad amet esse,
            assumenda laboriosam dolore!
          </p>
          <h3 class="heading-tertiary u-bottom-margin-small">
            Live adventures like you never have before
          </h3>
          <p class="paragraph">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, modi eius atque unde architecto ullam
            sapiente nulla molestiae nobis quod.
          </p>

          <a href="#" class="btn-text">Learn more &rarr;</a>
        </div>
        <div class="col-1-of-2">
          <div class="composition">
            <img src="img/nat-2-large.jpg" srcset="img/nat-2.jpg 300w, img/nat-2-large.jpg 1000w" sizes="(max-width: 56.25em) 20vw, (max-width: 37.5em) 30vw, 300px" alt="Photo 1" class="composition__photo composition__photo--p1">
            <!-- 300w and 1000w are the width descriptors that tell the browser the width of these images. -->
            <!-- sizes tell the browser what width image must be displayed at what viewport width. -->
            <img src="img/nat-1-large.jpg" srcset="img/nat-1.jpg 300w, img/nat-1-large.jpg 1000w" sizes="(max-width: 56.25em) 20vw, (max-width: 37.5em) 30vw, 300px" alt="Photo 2" class="composition__photo composition__photo--p2">
            <img src="img/nat-3-large.jpg" srcset="img/nat-3.jpg 300w, img/nat-3-large.jpg 1000w" sizes="(max-width: 56.25em) 20vw, (max-width: 37.5em) 30vw, 300px" alt="Photo 3" class="composition__photo composition__photo--p3">
          </div>
        </div>
      </div>
    </section>

    <section class="section-features">
      <div class="row">

        <div class="col-1-of-4">
          <div class="feature-box">
            <i class="feature-box__icon icon-basic-world"></i>
            <h3 class="heading-tertiary u-bottom-margin-small">Explore the world</h3>
            <p class="feature-box__text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga error quasi facilis dolore!
            </p>
          </div>
        </div>

        <div class="col-1-of-4">
          <div class="feature-box">
            <i class="feature-box__icon icon-basic-compass"></i>
            <h3 class="heading-tertiary u-bottom-margin-small">Meet nature</h3>
            <p class="feature-box__text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga error quasi facilis dolore!
            </p>
          </div>
        </div>

        <div class="col-1-of-4">
          <div class="feature-box">
            <i class="feature-box__icon icon-basic-map"></i>
            <h3 class="heading-tertiary u-bottom-margin-small">Find your way</h3>
            <p class="feature-box__text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga error quasi facilis dolore!
            </p>
          </div>
        </div>

        <div class="col-1-of-4">
          <div class="feature-box">
            <i class="feature-box__icon icon-basic-heart"></i>
            <h3 class="heading-tertiary u-bottom-margin-small">Live a healthier life</h3>
            <p class="feature-box__text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga error quasi facilis dolore!
            </p>
          </div>
        </div>

      </div>
    </section>

    <section class="section-tours">
      <div class="u-center-text u-bottom-margin-big">
        <h2 class="heading-secondary">
          Most popular tours
        </h2>
      </div>

      <div class="row">
        <div class="col-1-of-3">
          <div class="card">
            <div class="card__side card__side--front">
              <div class="card__picture card__picture--1">
                &nbsp;
              </div>
              <h4 class="card__heading">
                <span class="card__heading-span card__heading-span--1">
                  The Sea Explorer
                </span>
              </h4>
              <div class="card__details">
                <ul>
                  <li>3 day tours</li>
                  <li>Up to 30 people</li>
                  <li>2 tour guides</li>
                  <li>Sleep in cozy hotels</li>
                  <li>Difficulty: easy</li>
                </ul>
              </div>
            </div>
            <div class="card__side card__side--back card__side--back-1">
              <div class="card__cta">
                <div class="card__price-box">
                  <p class="card__price-only">Only</p>
                  <p class="card__price-value">₹29,700/-</p>
                </div>
                <a href="#popup" style="position:sticky;" class="btn btn--white">Book Now</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-1-of-3">
          <div class="card">
            <div class="card__side card__side--front">
              <div class="card__picture card__picture--2">
                &nbsp;
              </div>
              <h4 class="card__heading">
                <span class="card__heading-span card__heading-span--2">
                  The Forest Hiker
                </span>
              </h4>
              <div class="card__details">
                <ul>
                  <li>7 day tours</li>
                  <li>Up to 40 people</li>
                  <li>6 tour guides</li>
                  <li>Sleep in provided tents</li>
                  <li>Difficulty: medium</li>
                </ul>
              </div>
            </div>
            <div class="card__side card__side--back card__side--back-2">
              <div class="card__cta">
                <div class="card__price-box">
                  <p class="card__price-only">Only</p>
                  <p class="card__price-value">₹49,900/-</p>
                </div>
                <a href="#popup" style="position:sticky;" class="btn btn--white">Book Now</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-1-of-3">
          <div class="card">
            <div class="card__side card__side--front">
              <div class="card__picture card__picture--3">
                &nbsp;
              </div>
              <h4 class="card__heading">
                <span class="card__heading-span card__heading-span--3">
                  The Snow Adventure
                </span>
              </h4>
              <div class="card__details">
                <ul>
                  <li>5 day tours</li>
                  <li>Up to 15 people</li>
                  <li>3 tour guides</li>
                  <li>Sleep in provided tents</li>
                  <li>Difficulty: hard</li>
                </ul>
              </div>
            </div>
            <div class="card__side card__side--back card__side--back-3">
              <div class="card__cta">
                <div class="card__price-box">
                  <p class="card__price-only">Only</p>
                  <p class="card__price-value">₹35,350/-</p>
                </div>
                <a href="#popup" style="position:sticky;" class="btn btn--white">Book Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="u-center-text u-margin-top-big">
        <a href="#" class="btn btn--green">Discover all tours</a>
      </div>
    </section>

    <section class="section-stories">
      <div class="bg-video">
        <video class="bg-video__content" autoplay muted loop>
          <source src="img/video.mp4" type="video/mp4">
          <source src="img/video.webm" type="video/webm"> <!--  coverr.io for videos  -->
          Your browser is not supported!
        </video>
      </div>
      <div class="u-center-text u-bottom-margin-big">
        <h2 class="heading-secondary">
          We make people happy genuinely
        </h2>
      </div>

      <div class="row">
        <div class="story">
          <figure class="story__shape">
            <img src="img/nat-8.jpg" alt="Person on tour" class="story__img">
            <figcaption class="story__caption">
              Mania Chugh
            </figcaption>
          </figure>
          <div class="story__text">
            <h3 class="heading-tertiary u-bottom-margin-small">
              I had the best week ever with my family
            </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem fuga, placeat molestiae praesentium quibusdam delectus facilis quo a rerum beatae dolores repellat doloremque magnam possimus impedit vel consectetur magni Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, aperiam.</repudiandae>
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="story">
          <figure class="story__shape">
            <img src="img/nat-9.jpg" alt="Person on tour" class="story__img">
            <figcaption class="story__caption">
              Sugam Phirke
            </figcaption>
          </figure>
          <div class="story__text">
            <h3 class="heading-tertiary u-bottom-margin-small">
              Wow! My life is completely different now
            </h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem fuga, placeat molestiae praesentium quibusdam delectus facilis quo a rerum beatae dolores repellat doloremque magnam possimus impedit vel consectetur magni Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, aperiam.</repudiandae>
            </p>
          </div>
        </div>
      </div>

      <div class="u-center-text u-margin-top-big">
        <a href="#" class="btn-text">Read all stories &rarr;</a>
      </div>
    </section>

    <section class="section-book">
      <div class="row">
        <div class="book">
          <div class="book__form">
            <form action="#" class="form" autocomplete="off">
              <div class="u-bottom-margin-medium">
                <h2 class="heading-secondary">
                  Start Booking Now
                </h2>
              </div>
              <div class="form__group">
                <input type="text" class="form__input" placeholder="Full Name" required id="name" autocomplete="off">
                <label for="name" class="form__label">Full Name</label>
              </div>
              <div class="form__group">
                <input type="email" class="form__input" placeholder="Email" required id="email" autocomplete="off">
                <label for="email" class="form__label">Email</label>
              </div>
              <div class="form__group u-bottom-margin-medium">
                <div class="form__radio-group">
                  <input type="radio" class="form__radio-input" id="small" name="size">
                  <label for="small" class="form__radio-label">
                    <span class="form__radio-button"></span>
                    Small tour group
                  </label>
                </div>
                <div class="form__radio-group">
                  <input type="radio" class="form__radio-input" id="large" name="size">
                  <label for="large" class="form__radio-label">
                    <span class="form__radio-button"></span>
                    Large tour group
                  </label>
                </div>
              </div>
              <div class="form__group">
                <button class="btn btn--green">Next Step &rarr;</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="footer__logo-box">
      <!-- responsive images -->
      <picture class="footer__logo">
        <source srcset="img/logo-green-small-1x.png 1x, img/logo-green-small-2x.png 2x" media="(max-width: 37.5em)">
        <!-- Here we achieve art direction. -->
        <img src="img/logo-green-2x.png" srcset="img/logo-green-1x.png 1x, img/logo-green-2x.png 2x" alt="Full Logo" class="footer__logo">
        <!-- Here we achieve density switching, a use case of responsive images. The srcset allows us to give multiple images. 1x and 2x are the density descriptor. -->
      </picture>

    </div>
    <div class="row">
      <div class="col-1-of-2">
        <div class="footer__navigation">
          <ul class="footer__list">
            <li class="footer__item"><a href="#" class="footer__link">Company</a></li>
            <li class="footer__item"><a href="#" class="footer__link">Contact Us</a></li>
            <li class="footer__item"><a href="#" class="footer__link">Careers</a></li>
            <li class="footer__item"><a href="#" class="footer__link">Privacy</a></li>
            <li class="footer__item"><a href="#" class="footer__link">Terms</a></li>
          </ul>
        </div>

      </div>
      <div class="col-1-of-2">
        <p class="footer__copyright">
          Built by <a href="https://sugamphirke.com/" class="footer__link--1">Sugam Phirke</a>. The genesis of the home page design can be traced back to the illustrious tutelage of <a href="https://codingheroes.io/" class="footer__link--1" target="_blank">Jonas Schmedtmann</a> , a venerable luminary and remarkable mentor whose exalted mentorship not only acquainted me with the intricate nuances of Advanced CSS, Sass, and JavaScript but also extended beyond the confines of traditional design paradigms. Inspired by Jonas' esteemed course on <a href="https://www.udemy.com/course/advanced-css-and-sass/" class="footer__link--1" target="_blank"> Advanced CSS and Sass</a>, his extensive knowledge of these subjects, was imparted to me with great detail and precision, thereby shaping the astonishing design!
        </p>
      </div>
    </div>
  </footer>

  <div class="popup" id="popup">
    <div class="popup__content">
      <div class="popup__left">
        <img src="img/nat-8.jpg" alt="Tour photo" class="popup__img">
        <img src="img/nat-9.jpg" alt="Tour photo" class="popup__img">
      </div>
      <div class="popup__right">
        <a href="#section-tours" class="popup__close">&times;</a>
        <h2 class="heading-secondary u-bottom-margin-small">Start Booking Now</h2>
        <h3 class="heading-tertiary u-bottom-margin-small">Important &ndash; Please read these terms before booking</h3>
        <p class="popup__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis modi aliquid est doloremque et veritatis nulla, hic, iste rem reiciendis quaerat itaque expedita quis quisquam sunt. Voluptas dolores, beatae fugit, eveniet laborum quaerat eum reprehenderit nisi eaque atque nobis minima. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eius itaque ipsum quos culpa voluptate mollitia quisquam, aliquid inventore quam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, quibusdam laudantium vel consectetur laboriosam delectus dicta qui eveniet maiores reiciendis inventore nihil quisquam facilis commodial Lorem ipsum dolor sit.!</p>
        <a href="#" class="btn btn--green">Book Now</a>
      </div>
    </div>
  </div>

  <script>
    var username = "";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "retrieve_session.php", true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        username = xhr.responseText;
        console.log(username);
        if (username) {
          // userAnimation.src = "https://assets5.lottiefiles.com/packages/lf20_Hltaflytha.json";
          var usernameBlock = document.getElementById('account');

          usernameBlock.textContent = username;
          usernameBlock.style.display = "flex";

          var anime1 = document.getElementById('anime1');
          var anime2 = document.getElementById('anime2');

          anime1.style.display = "none";
          anime2.style.display = "flex";
        }
      }
    };
    xhr.send();
  </script>
</body>

</html>