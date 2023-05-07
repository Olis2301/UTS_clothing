<?php
require_once "templates/navbar.php";

$product = query("SELECT * FROM product");
?>

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container mt-5 pt-5" data-aos="fade-in">
        <h1>Selamat datang dan selamat berbelanja</h1>
        <h2>Toko online terpercaya</h2>
        <img src="assets/img/Shopping Hd Transparent, Shopping, Shopping Cart, Shopping Bag, Purchase PNG Image For Free Download.jpg" alt="Hero Imgs" data-aos="zoom-out" data-aos-delay="100">
        <a href="#get-started" class="btn-get-started scrollto">Barang Kami</a>
        <div class="btns">

        </div>
    </div>
</section>



<main id="main">

    <!-- ======= Get Started Section ======= -->
    <section id="get-started" class="padd-section text-center">

        <div class="container" data-aos="fade-up">
            <div class="section-title text-center">

                <h2 style="color: blanchedalmond;">Berikut adalah barang-barang Yang Tersedia Di Toko Kami</h2>
                <p class="separator">Kualitas oke harga ga bikin boke</p>

            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php foreach ($product as $p) : ?>
                    <div class="col-md-6 col-lg-4 my-3" data-aos="zoom-in" data-aos-delay="100">
                        <div class="feature-block">

                            <img style="width: 100%; height: 100%;" src="assets/img/<?= $p['sku']; ?>.jpg" alt="img">
                            <h4><?= $p['name']; ?></h4>
                            <p style="color: darkgoldenrod;">Rp. <?= number_format($p['sell_price'], 2, ",", "."); ?></p>
                            <p>Stock : <?= $p['stock'] ?></p>
                            <a href="detail.php?id=<?= $p["id"]; ?>">Lihat / </a> <a href="checkout.php"> Beli</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    </section><!-- End Get Started Section -->

    <!-- ======= About Us Section ======= -->



    <!-- ======= Screenshots Section ======= -->
    <section id="screenshots" class="padd-section text-center">

        <div class="container" data-aos="fade-up">
            <div class="section-title text-center">
                <h2>App Gallery</h2>
                <p class="separator">Galery penjual</p>
            </div>

            <div class="screens-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <div class="swiper-slide"><img src="assets/img/g<?= $i; ?>.jpg" class="img-fluid" alt=""></div>
                    <?php endfor ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </section><!-- End Screenshots Section -->

    <!-- ======= Video Section ======= -->
    <section id="video" class="text-center">
        <div class="overlay">
            <div class="container-fluid container-full" data-aos="zoom-in">

                <div class="row">
                    <a href="https://www.youtube.com/watch?v=xKSlJ2TapyA" class="glightbox play-btn"></a>
                </div>

            </div>
        </div>
    </section><!-- End Video Section -->
    <center>
        <!-- ======= Team Section ======= -->
        <section id="team" class="padd-section text-center">

            <div class="container" data-aos="fade-up">
                <div class="section-title text-center">

                    <h2 style="color: blanchedalmond;">Team</h2>
                    <p class="separator">Berikut adalah nama Owner Website kami</p>
                </div>

                <div class="row">



                    <div class="c" data-aos="zoom-in" data-aos-delay="200">
                        <div class="team-block bottom">
                            <img src="assets/img/g8.jpg" class="img-responsive" alt="img">
                            <div class="team-content">
                                <ul class="list-unstyled">
                                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                    <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                    <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                                </ul>
                                <span>Owner</span>
                                <h4>Muhammad Nurcholis</h4>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section><!-- End Team Section -->
    </center>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="padd-section">

        <div class="container" data-aos="fade-up">
            <div class="section-title text-center">
                <h2>Contact</h2>
                <p class="separator">Silakan hubungi kami bila ada yang ingin anda tanyakan</p>
            </div>

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-3 col-md-4">

                    <div class="info">
                        <div>
                            <i class="bi bi-geo-alt"></i>
                            <p>Griya bukit jaya<br>Bogor</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <p>kholisdecoy24@gmail.com</p>
                        </div>

                        <div>
                            <i class="bi bi-phone"></i>
                            <p>089635957141</p>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="https://www.facebook.com/profile.php?id=100085966475130" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/muzdiciai/" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/olis-decoy-b40314258/" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>

                </div>

                <div class="col-lg-5 col-md-8">
                    <div class="form">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->

</main>

<?php
require_once "templates/footer.php"
?>