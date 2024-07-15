<?php include('header.php'); ?>

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

<?php include('footer.php'); ?>