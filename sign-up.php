<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="social media campaigns">
    <title>SMC Ltd</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>

    <?php
    include_once './mysqli_connection.php';
    $err_message = "";
    $username = "";
    $email = "";
    $pass = "";
    $address = "";
    $phone = "";

    function valid_email($email)
    {
        global $connection;

        $statement = mysqli_prepare(
            $connection,
            "SELECT email FROM customer WHERE email = ? UNION SELECT email FROM admin WHERE email = ?"
        );

        mysqli_stmt_bind_param($statement, "ss", $email, $email);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);

        if (mysqli_stmt_num_rows($statement) > 0) {
            mysqli_stmt_close($statement);
            return FALSE;
        }
        return TRUE;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = trim($_POST["email"]);
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

        if (valid_email($email)) {
            $statement = mysqli_prepare(
                $connection,
                "INSERT INTO customer(customer_name, email, password, address, phone) VALUES (?,?,?,?,?)"
            );

            mysqli_stmt_bind_param($statement, "sssss", $username, $email, $pass, $address, $phone);
            mysqli_stmt_execute($statement);

            echo '<script>alert("Member Registration Success");location.assign("index.php");</script>';

            $err_message = "";
            $username = "";
            $email = "";
            $pass = "";
            $address = "";
            $phone = "";
        } else {
            echo '<script>alert("Email already exist");location.assign("index.php");</script>';
        }
    }
    ?>
</head>

<body id="top">

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <span>SMC</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="sign-in.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="sign-up.php">Register</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <section class="section-padding section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 mx-auto">
                        <h3 class="mb-4 pb-2 text-center">Member Registration Form</h3>
                        <form action="sign-up.php" name="create" method="POST" class="custom-form contact-form" role="form" novalidate>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-floating">
                                        <input type="text" name="username" value="<?php echo $username; ?>" required maxlength="30" pattern="[a-zA-Z][a-zA-Z ]+" title="User Name can only include letter and space" autofocus class="form-control" placeholder="User Name" />
                                        <label for="floatingInput">User Name</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="email" name="email" value="" required maxlength="45" title="Enter registered email to log in" class="form-control" placeholder="Email Address" pattern="[^ @]*@[^ @]*" />
                                        <label for="floatingInput">Email Address</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="password" name="pass" value="" required maxlength="20" pattern="\w+" title="Enter password containing letter and digits" onchange="create.cpassword.pattern = this.value;" class="form-control" placeholder="Password" />
                                        <label for="floatingInput">Password</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="password" name="cpassword" value="" required maxlength="20" title="Retype password same as above password" class="form-control" placeholder="Confirm Password" />
                                        <label for="floatingInput">Confirm Password</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="text" name="phone" value="<?php echo $phone; ?>" required maxlength="30" pattern="[0-9][0-9\-, ]+" title="Only allow number, hyphen and comma." placeholder="Phone Number" class="form-control" />
                                        <label for="floatingInput">Phone Number</label>
                                    </div>

                                    <div class="form-floating">
                                        <textarea name="address" required maxlength="100" class="form-control" placeholder="Address"><?php echo $address; ?></textarea>
                                        <label for="floatingTextarea">Address</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center gap-3">
                                <div class="col-lg-4 col-12">
                                    <button type="reset" class="form-control">Cancel</button>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <button type="submit" class="form-control">Submit</button>
                                </div>
                            </div>
                        </form>
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
                            <a href="index.php" class="site-footer-link">Login</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="about-us.php" class="site-footer-link active-footer">Register</a>
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