<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/package/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Responsive website food</title>
</head>

<body>
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo"><img src="assets/img/bv.png" style="width:3.9rem; height:3.9rem;" alt=""></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="#services" class="nav__link">Services</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">Contact us</a></li>
                    <li class="nav__item"><a href="login.php" class="nav__link">Login</a></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
            <span>&#9776;</span>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <section class="home" id="home">
            <div class="home__container bd-container bd-grid">
                <div class="home__data">
                    <h1 class="home__title">UOG <span style="color:white;">Online</span><BR>Examination</h1>
                    <h2 class="home__subtitle">Try the exam of <br> your course.</h2>
                    <a href="login.php" class="button">start now</a>
                </div>
                <img src="assets/img/left-image.png" alt="">
            </div>
        </section>

        <section class="about section bd-container" id="about">
            <div class="about__container  bd-grid">
                <div class="about__data">
                    <span class="home__subtitle">About us</span>
                    <p class="about__description">universty of gonder online examination for regular and extension students. you can have exam online by using our website</p>
                    <a href="about.php" class="button">Read more</a>
                </div>

                <img src="assets/img/gf.jpg" alt="" class="about__img">
              
            </div>
        </section>

        <!--========== SERVICES ==========-->
        <section class="services section bd-container" id="services">
            <span class="section-subtitle">Examination</span>
            <h2 class="section-title">Our services</h2>

            <div class="services__container  bd-grid">
                <div class="services__content">
                    <h3 class="services__title">Excellent students</h3>
                    <p class="services__description">We offer our students excellent quality services for many years, with the best and educational level in ethiopia.</p>
                </div>

                <div class="services__content">
                    
                    <h3 class="services__title">Excellent teachers</h3>
                    <p class="services__description">We offer excellent teachers and with full labratory instruments.</p>
                </div>

                <div class="services__content">
                   
                    <h3 class="services__title">online examination</h3>
                    <p class="services__description">We offer online examination it means it simplify teacher and student works.</p>
                </div>
            </div>
        </section>

      
        <!--========== CONTACT US ==========-->
        <section class="contact section bd-container" id="contact">
            <div class="contact__container bd-grid">
                <div class="contact__data">
                    <span class="section-subtitle contact__initial">Let's talk</span>
                    <h2 class="section-title contact__initial">Contact us</h2>
                    <p class="contact__description">If you want to have a exam in our software, contact us and we will accept you quickly.</p>
                </div>

                <div class="contact__button">
                    <a href="#" class="button">Contact us now</a>
                </div>
            </div>
        </section>
    </main>

    <!--========== FOOTER ==========-->
    <footer class="footer section bd-container">
        <div class="footer__container bd-grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">UOG Online Examination</a>
                <span class="footer__description"></span>
                <div>
                <a href="https://www.facebook.com/TheUniversityofGondar" class="footer__social"><i class="bx bxl-facebook-circle" style="color:white;" aria-hidden="true" ></i></a>
                <a href="https://www.uog.edu.et" class="footer__social"><i class="bx bxl-google" style="color:white;"></i></a>
                <a href="https://twitter.com/ugondar?lang=en#:~:text=University%20of%20Gondar%20(%40UGondar)%20%7C%20Twitter" class="bx bxl-twitter"><i style="color:white;" class="fa fa-twitter" ></i></a>
                <a href="https://www.instagram.com/universityofGondar/?hl=en" class="footer__social"><i class="bx bxl-instagram" style="color:white;" ></i></a>
         
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Services</h3>
                <ul>
                    <li><a href="#" class="footer__link">online examination</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Information</h3>
                <ul>
                    <li><a href="#" class="footer__link">Contact us</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Adress</h3>
                <ul>
                    <li>Uog.edu.et</li>
                </ul>
            </div>
        </div>

        <p class="footer__copy">&#169; 2021 by information system departement students. All right reserved</p>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>