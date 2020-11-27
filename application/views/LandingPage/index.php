<section class="preloader">
    <div class="spinner">

        <span class="spinner-rotate"></span>

    </div>
</section>


<!-- MENU -->
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="index.html" class="navbar-brand">FOOD <span>.</span> TIN</a>
        </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-nav-first">
                <li><a href="#about" class="smoothScroll">Tentang</a></li>
                <li><a href="#team" class="smoothScroll">Penjaga Kantin</a></li>
                <li><a href="#menu" class="smoothScroll">Menu</a></li>
                <li><a href="#testimonial" class="smoothScroll">Ulasan</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <a href="<?= base_url(); ?>Home/index" class="section-btn">Home</a>
                <a href="<?= base_url(); ?>Auth/index" class="section-btn">Login</a>
                <a href="<?= base_url(); ?>Auth/regis" class="section-btn">Registrasi</a>
            </ul>
        </div>

    </div>
</section>


<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
    <div class="row">

        <div class="owl-carousel owl-theme">
            <div class="item item-first">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-8 col-sm-12">
                            <h3>Kantin Pintar</h3>
                            <h1>Tujuan kami adalah memberikan kemudahan untuk para siswa</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-second">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-8 col-sm-12">
                            <h3>Menu Terbaik</h3>
                            <h1>Anda bisa langsung melihatnya di menu kami</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-third">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-8 col-sm-12">
                            <h3>Lokasi Kantin</h3>
                            <h1>Nikmati menu spesial kami setiap hari Senin dan Jumat</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- ABOUT -->
<section id="about" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-12">
                <div class="about-info">
                    <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
                        <h4>Baca Cerita Kami</h4>
                        <h2>Kami Telah Membuat Website ini Sejak Oktober 2020</h2>
                    </div>

                    <div class="wow fadeInUp" data-wow-delay="0.4s">
                        <p>Tujuan kami membuat website ini tidak lain hanya untuk memudahkan para siswa dalam
                            bertransaksi di masing masing sekolah. Dengan adanya fitur order, para siswa tidak perlu mengunjungi kantin untuk memesan makanan. </p>
                        <p>Nantinya makanan yang telah dipesan akan diantarkan ke kelas kelas. Harapan kami hanyanya mampu memberikan efesiensi waktu untuk para siswa maupu guru. Thank you.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="wow fadeInUp about-image" data-wow-delay="0.6s">
                    <img src="<?= base_url(); ?>asset/LPStyle/images/about-image.jpg" class="img-responsive" alt="">
                </div>
            </div>

        </div>
    </div>
</section>


<!-- TEAM -->
<section id="team" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2>Penjaga Kantin</h2>
                    <h4>Penjaga Kantin Terbaik &amp; Ramah</h4>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                    <img src="<?= base_url(); ?>asset/LPstyle/images/tim1.jpg" class="img-responsive" alt="">
                    <div class="team-hover">
                        <div class="team-item">
                            <h4>Murid Jasa Boga SMK Negeri 24 Jakarta</h4>
                            <ul class="social-icon">
                                <li><a href="#" class="fa fa-linkedin-square"></a></li>
                                <li><a href="#" class="fa fa-envelope-o"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Muhamad Iqbal</h3>
                    <p>XII Tata Boga 1</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                    <img src="<?= base_url(); ?>asset/LPstyle/images/tim2.jpg" class="img-responsive" alt="">
                    <div class="team-hover">
                        <div class="team-item">
                            <h4>Murid Rekayasa Perangkat Lunak SMK Negeri 24 Jakarta</h4>
                            <ul class="social-icon">
                                <li><a href="#" class="fa fa-instagram"></a></li>
                                <li><a href="#" class="fa fa-flickr"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Ahasyweros</h3>
                    <p>XII Rekayasa Perangkat Lunak 1</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                    <img src="<?= base_url(); ?>asset/LPstyle/images/tim3.jpg" class="img-responsive" alt="">
                    <div class="team-hover">
                        <div class="team-item">
                            <h4>Murid Tata Busana SMK Negeri 24 Jakarta</h4>
                            <ul class="social-icon">
                                <li><a href="#" class="fa fa-github"></a></li>
                                <li><a href="#" class="fa fa-google"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Dwi Kurniawan</h3>
                    <p>XII Tata Busana 1</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- MENU-->
<section id="menu" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2>Menu</h2>
                    <h4>Makanan &amp; Minuman</h4>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <a href="<?= base_url(); ?>asset/LPstyle/images/1.jpg" class="image-popup" title="American Breakfast">
                        <img src="<?= base_url(); ?>asset/LPstyle/images/1.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                            <div class="menu-item">
                                <h3>Kwetiaw Spesial</h3>
                                <p>Kwetiaw / Telur / Ayam / Sayuran</p>
                                <p>Kantin Pramuka</p>
                            </div>
                            <div class="menu-price">
                                <span>Rp. 13.000</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <a href="<?= base_url(); ?>asset/LPstyle/images/2.jpg" class="image-popup" title="Self-made Salad">
                        <img src="<?= base_url(); ?>asset/LPstyle/images/2.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                            <div class="menu-item">
                                <h3>Nasi Goreng Spesial</h3>
                                <p>Nasi / Telur / Ayam / Sayur</p>
                                <p>Kantin Osis</p>
                            </div>
                            <div class="menu-price">
                                <span>Rp. 13.000</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <a href="<?= base_url(); ?>asset/LPstyle/images/3.jpg" class="image-popup" title="Chinese Noodle">
                        <img src="<?= base_url(); ?>asset/LPstyle/images/3.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                            <div class="menu-item">
                                <h3>Mie Goreng Spesial</h3>
                                <p>Mie Goreng / Telur / Ayam / Sayur</p>
                                <p>Kantin UPW</p>
                            </div>
                            <div class="menu-price">
                                <span>Rp. 13.000</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <a href="<?= base_url(); ?>asset/LPstyle/images/4.jpg" class="image-popup" title="Rice Soup">
                        <img src="<?= base_url(); ?>asset/LPstyle/images/4.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                            <div class="menu-item">
                                <h3>Mie Ayam Spesial</h3>
                                <p>Mie / Ayam / Sayuran / </p>
                                <p>Kantin Busana</p>
                            </div>
                            <div class="menu-price">
                                <span>Rp. 10.000</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <a href="<?= base_url(); ?>asset/LPstyle/images/5.jpg" class="image-popup" title="Project title">
                        <img src="<?= base_url(); ?>asset/LPstyle/images/5.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                            <div class="menu-item">
                                <h3>Soto Ayam Spesial</h3>
                                <p>Bihun / Ayam / emping/ telur</p>
                                <p>Kantin Pramuka</p>
                            </div>
                            <div class="menu-price">
                                <span>Rp. 13.000</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <a href="<?= base_url(); ?>asset/LPstyle/images/6.jpg" class="image-popup" title="Project title">
                        <img src="<?= base_url(); ?>asset/LPstyle/images/6.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                            <div class="menu-item">
                                <h3>Ayam Geprek Spesial</h3>
                                <p>Ayam / Sambel</p>
                                <p>Bisnis Center</p>
                            </div>
                            <div class="menu-price">
                                <span>Rp. 10.000</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <a href="<?= base_url(); ?>asset/LPstyle/images/7.jpg" class="image-popup" title="Project title">
                        <img src="<?= base_url(); ?>asset/LPstyle/images/7.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                            <div class="menu-item">
                                <h3>Bakso Urat</h3>
                                <p>Bakso / Mie / Sayuran / Tetelan</p>
                                <p>Kantin RPL</p>
                            </div>
                            <div class="menu-price">
                                <span>Rp. 13.000</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <a href="<?= base_url(); ?>asset/LPstyle/images/8.jpg" class="image-popup" title="Project title">
                        <img src="<?= base_url(); ?>asset/LPstyle/images/8.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                            <div class="menu-item">
                                <h3>Jus Mangga</h3>
                                <p>Mangga / Air / Susu</p>
                                <p>Kantin Pramuka</p>
                            </div>
                            <div class="menu-price">
                                <span>Rp. 7.000</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <a href="<?= base_url(); ?>asset/LPstyle/images/9.jpg" class="image-popup" title="Project title">
                        <img src="<?= base_url(); ?>asset/LPstyle/images/9.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                            <div class="menu-item">
                                <h3>Eh Teh Manis</h3>
                                <p>Teh / Es / Gula</p>
                                <p>Kantin RPL</p>
                            </div>
                            <div class="menu-price">
                                <span>Rp. 4.000</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <a href="<?= base_url(); ?>asset/LPstyle/images/10.jpg" class="image-popup" title="Project title">
                        <img src="<?= base_url(); ?>asset/LPstyle/images/10.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                            <div class="menu-item">
                                <h3>Air Mineral</h3>
                                <p>Aneka Macam Merk</p>
                                <p>Bisnis Center</p>
                            </div>
                            <div class="menu-price">
                                <span>Rp. 4.000</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <a href="<?= base_url(); ?>asset/LPstyle/images/11.jpg" class="image-popup" title="Project title">
                        <img src="<?= base_url(); ?>asset/LPstyle/images/11.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                            <div class="menu-item">
                                <h3>Jus Jeruk</h3>
                                <p>Jeruk / Air / Susu</p>
                                <p>Kantin RPL</p>
                            </div>
                            <div class="menu-price">
                                <span>Rp. 7.000</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <a href="<?= base_url(); ?>asset/LPstyle/images/12.jpg" class="image-popup" title="Project title">
                        <img src="<?= base_url(); ?>asset/LPstyle/images/12.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                            <div class="menu-item">
                                <h3>Jus Sirsak</h3>
                                <p>Sirsak / Air / Susu</p>
                                <p>Kantin Osis</p>
                            </div>
                            <div class="menu-price">
                                <span>Rp. 7.000</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- TESTIMONIAL -->
<section id="testimonial" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2>Ulasan</h2>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <p>Website ini sangat berguna untuk saya. karena saya malas memesan makanan ke kantin</p>
                        <div class="tst-author">
                            <h4>Ahasyweros</h4>
                            <span>Murid XII RPL 1 </span>
                        </div>
                    </div>

                    <div class="item">
                        <p>Website ini sangat berguna untuk saya. karena saya tidak sempat ke kantin, dikarenakan banyak ujian praktek</p>
                        <div class="tst-author">
                            <h4>Putri Aini Zahra</h4>
                            <span>Murid XII Jasa Boga 3</span>
                        </div>
                    </div>

                    <div class="item">
                        <p>Website ini sangat berguna untuk saya. Karena banyak tugas yang harus saya kerjakan</p>
                        <div class="tst-author">
                            <h4>Syafa Nabila Kesha Priatna</h4>
                            <span>Murid XII Tata Busana 1</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- FOOTER -->
<footer id="footer" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-8">
                <div class="footer-info">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s">Temukan Kami</h2>
                    </div>
                    <address class="wow fadeInUp" data-wow-delay="0.4s">
                        <p>Jl Masjid Arahman,<br> Bekasi 13820<br>Jati Rahayu</p>
                    </address>
                </div>
            </div>

            <div class="col-md-4 col-sm-8">
                <div class="footer-info">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s">Reservasi</h2>
                    </div>
                    <address class="wow fadeInUp" data-wow-delay="0.4s">
                        <p>0812 1234 9795 | 0821 7457 1245</p>
                        <p><a href="mailto:info@company.com">foodtin@gmail.com</a></p>
                        <p>Instagram : foodtin_aja </p>
                    </address>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                    <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>
                    <li><a href="#" class="fa fa-google"></a></li>
                </ul>

                <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s">
                    <p><br>Copyright &copy; 2020 <br>Foodtin

                        <br><br>Developer: <a rel="nofollow" href="http://templatemo.com" target="_parent">SMKN 24</a></p>
                </div>
            </div>

        </div>
    </div>
</footer>