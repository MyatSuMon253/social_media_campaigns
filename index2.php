<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Air</title>
        <link href="css.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php
        session_start();
        require_once 'mysqli_connection.php';
        $emessage = "";
        
        if(isset($_POST["login"])) {
            $memail = trim($_POST["email"]);
            $mpassword = $_POST["pass"];
            
            $statement = mysqli_prepare($connection, "SELECT adminid, password FROM admin WHERE email = ?");
            mysqli_stmt_bind_param($statement, "s", $memail);
            mysqli_stmt_execute($statement);
            mysqli_stmt_bind_result($statement, $id, $pwd);
            if(mysqli_stmt_fetch($statement)) {
                if(password_verify($mpassword, $pwd)) {
                    $_SESSION["adminid"] = $id;
                    header("Location: viewdetail.php");
                }
                else {
                    echo '<script>alert("Invalid user");</script>';
                }
            }
            else {
                mysqli_stmt_close($statement);
                $statement = mysqli_prepare($connection, "SELECT customerid, customername, password FROM customer WHERE email = ?");
                mysqli_stmt_bind_param($statement, "s", $memail);
                mysqli_stmt_execute($statement);
                mysqli_stmt_bind_result($statement, $id, $cname, $pwd);
                if(mysqli_stmt_fetch($statement)) {
                    if(password_verify($mpassword, $pwd)) {
                        $_SESSION["customerid"] = $id;
                        $_SESSION["customername"] = $cname;
                        header("Location: index.php");
                    }
                    else {
						echo '<script>alert("Invalid user");</script>';
                    }
                }
                else {
					echo '<script>alert("Wrong user");</script>';
                }
            }
			
        }
    ?>
     
        <div class="menu">
            <a href="" style="margin-left: 0px;">Home</a>
            <a href="register.php" style="margin-left: 37px;">Register Here</a>
            <a href="" style="margin-left: 37px;">Contact Us</a>
            <a href="" style="margin-left: 37px;">About</a>
        </div>
        <div class="holder">
            <form name="frm" method="POST">
                <fieldset>
                    <legend>Log In!</legend>
                    Email <input type="email" name="email" value="" required maxlength="45" title="Enter registered email to log in." autofocus /><br><br>
                    Password <input type="password" name="pass" value="" required maxlength="20" title="Enter password to log in." /><br><br>
                    <input type="submit" value="Log In" name="login"  style="margin-right: 7px;" />
                    <input type="submit" value="Cancel" name="cancel" formnovalidate />
                   
                </fieldset>
            </form>
        </div>
    </body>
</html>
