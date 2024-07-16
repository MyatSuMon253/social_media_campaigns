<!doctype html>
<html lang="en">
<?php include('header.php'); ?>

<body>
    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <span>SMC</span>
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="index.php" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="about-us.php">About Us</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">How to Stay Safe</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="popular-apps.php">Most Popular Social Media Apps</a></li>

                                <li><a class="dropdown-item" href="livestreaming.php">Livestreaming</a></li>

                                <li><a class="dropdown-item" href="how-to-help.php">How Parents Can Help</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="contact-us.php">Contact</a>
                        </li>

                    </ul>

                    <div class="d-none d-lg-block">
                        <a href="sign-in.php" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
                </div>
            </div>
        </nav>


        <section class="section-padding section-bg">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <h3 class="mb-4 pb-2">We'd love to hear from you</h3>
                    </div>

                    <div class="col-lg-6 col-12">
                        <form action="#" method="post" class="custom-form contact-form" role="form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-floating">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">

                                        <label for="floatingInput">Name</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-floating">
                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <input type="text" name="subject" id="name" class="form-control" placeholder="Name" required="">
                                        <label for="floatingInput">Subject</label>
                                    </div>

                                    <div class="form-floating">
                                        <textarea class="form-control" id="message" name="message" placeholder="Tell me about the project"></textarea>
                                        <label for="floatingTextarea">Message</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12 ms-auto">
                                    <button type="submit" class="form-control">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-lg-5 col-12 mx-auto mt-5 mt-lg-0">
                        <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.354622260213!2d96.13938411334496!3d16.85834328623666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1948fee76bb87%3A0x91b835d60e63bfce!2s7th%20Mile%20Bus%20Stop!5e0!3m2!1sen!2sus!4v1720839820969!5m2!1sen!2sus" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        <h5 class="mt-4 mb-2">Social Media Campaigns (SMC)</h5>

                        <p>Pyay Road &amp; 7 miles, Yangon, Myanmar</p>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <footer class="site-footer section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-12 mb-4 pb-2">
                    <a class="navbar-brand mb-2" href="index.php">
                        <span>SMC</span>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <h6 class="site-footer-title mb-3">Resources</h6>

                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="index.php" class="site-footer-link">Home</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="about-us.php" class="site-footer-link">About Us</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="popular-apps.php" class="site-footer-link">Most Popular Social Media Apps</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="livestreaming.php" class="site-footer-link">Livestreaming</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="how-to-help.php" class="site-footer-link">How Parents Can Help</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="contact-us.php" class="site-footer-link active-footer">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Information</h6>
                    <p class="text-white d-flex mb-1">
                        <a href="tel:09 789 164 616" class="site-footer-link">
                            09 789 164 616
                        </a>
                    </p>
                    <p class="text-white d-flex">
                        <a href="mailto:support@smc.com" class="site-footer-link">
                            support@smc.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">

                    <p class="copyright-text mt-lg-5 mt-4">Copyright © 2024 All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>