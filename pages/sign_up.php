<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body id="register">
    <div id="sign_up_box">
        <h1>BrookesConnect</h1>
        <form action="#" id="login_form">
            <div class="second_form_section">
                <div class="form_sub_section" id="first_sub">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                    <span id="span_username">Invalid username</span>
                </div>
                <div class="form_sub_section" id="second_sub">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
                    <span id="span_email">Invalid email</span>
                </div>
            </div>
            <div class="second_form_section">
                <div class="form_sub_section" id="third_sub">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <span id="span_password">Invalid password</span>
                </div>
                <div class="form_sub_section" id="fourth_sub">
                    <label for="confirm">Confirm password</label>
                    <input type="password" name="confirm" id="confirm">
                    <span id="span_confirmation">Invalid confirmation</span>
                </div>
            </div>
            <div id="extra_section">
                <span id="radio_match" >
                    Passwords must match
                </span>
            </div>
            <div id="select">
                <div id="select_body">
                    <label for="asm">Academic staff
                    <input type="radio" name="account_type" id="asm" value="asm">
                    <span class="checked"></span>
                    </label>
                    <label for="ir">Industry Representative
                    <input type="radio" name="account_type" id="ir" value="ir">
                    <span class="checked"></span>
                </div>
            </div>
            <button type="submit" name="login_button" id="login_button">Register</button>
            <hr>
            <div id="lower_section">
                <a href="login.php">Log in</a>
                <a href="landingpage.php">Browse mode</a>
            </div>
        </form>
    </div>
    <script src="../scripts/verification.js"></script>
</body>
</html>