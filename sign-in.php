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
    session_start();
    require_once 'mysqli_connection.php';

    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
    }
    if (!isset($_SESSION['lockout_time'])) {
        $_SESSION['lockout_time'] = 0;
    }
    if (!isset($_SESSION['current_time'])) {
        $_SESSION['current_time'] = 0;
    }
    $lockout_duration = 600;
    $err_message = "";

    function increment_failed_attempts()
    {
        // Increment the login attempts
        $_SESSION['login_attempts'] += 1;

        if ($_SESSION['login_attempts'] >= 3) {
            $_SESSION['lockout_time'] = $_SESSION['current_time'];
            $err_message =  "You have been locked out due to too many failed login attempts. Please try again after 10 minutes.";
            echo '<script>alert("' . $err_message . '");</script>';
        } else {
            $err_message = "Login failed. Attempt: " . $_SESSION['login_attempts'];
            echo '<script>alert("' . $err_message . '");</script>';
        }
    }

    function reset_attempts()
    {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['lockout_time'] = 0;
        $_SESSION['current_time'] = 0;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login_email = trim($_POST["email"]);
        $login_password = $_POST["pass"];
        $_SESSION['current_time'] = time();

        // Check if lockout period has expired
        if ($_SESSION['login_attempts'] >= 3 && $_SESSION['current_time'] - $_SESSION['lockout_time'] < $lockout_duration) {
            $err_message = "You are locked out. Please try again after " . (10 - ceil(($_SESSION['current_time'] - $_SESSION['lockout_time']) / 60)) . " minutes.";
            echo '<script>alert("' . $err_message . '");</script>';
        } else {
            // Reset lockout if time has expired
            if ($_SESSION['login_attempts'] >= 3 && $_SESSION['current_time'] - $_SESSION['lockout_time'] >= $lockout_duration) {
                reset_attempts();
            }

            $statement = mysqli_prepare(
                $connection,
                "SELECT admin_id, password FROM admin WHERE email = ?"
            );

            mysqli_stmt_bind_param($statement, "s", $login_email);
            mysqli_stmt_execute($statement);
            mysqli_stmt_bind_result($statement, $id, $pwd);

            if (mysqli_stmt_fetch($statement)) {
                if (password_verify($login_password, $pwd)) {
                    $_SESSION["admin_id"] = $id;
                    reset_attempts();
                    header("Location: index.php");
                } else {
                    increment_failed_attempts();
                }
            } else {
                mysqli_stmt_close($statement);
                $statement = mysqli_prepare(
                    $connection,
                    "SELECT customer_id, customer_name, password FROM customer WHERE email = ?"
                );

                mysqli_stmt_bind_param($statement, "s", $login_email);
                mysqli_stmt_execute($statement);
                mysqli_stmt_bind_result($statement, $id, $cname, $pwd);

                if (mysqli_stmt_fetch($statement)) {
                    if (password_verify($login_password, $pwd)) {
                        $_SESSION["customer_id"] = $id;
                        $_SESSION["customer_name"] = $cname;
                        reset_attempts();
                        header("Location: index.php");
                    } else {
                        increment_failed_attempts();
                    }
                } else {
                    increment_failed_attempts();
                }
            }
        }
    }
    ?>
</head>

<body>

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
                            <a class="nav-link active" href="sign-in.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sign-up.php">Register</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <section class="section-padding section-bg">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mx-auto">
                        <h3 class="mb-4 pb-2 text-center">Member Login Form</h3>
                        <form action="sign-in.php" method="POST" class="custom-form contact-form" role="form" novalidate>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-floating">
                                        <input type="email" name="email" id="email" value="" required maxlength="45" title="Enter registered email to log in" autofocus class="form-control" placeholder="Email Address" pattern="[^ @]*@[^ @]*" />
                                        <label for="floatingInput">Email Address</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-floating">
                                        <input type="password" name="pass" id="pass" value="" required maxlength="20" title="Enter password to log in" class="form-control" placeholder="Password" />
                                        <label for="floatingInput">Password</label>
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
                            <a href="index.php" class="site-footer-link active-footer">Login</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="about-us.php" class="site-footer-link">Register</a>
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