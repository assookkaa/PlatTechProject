<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="css/reg.css">
</head>
<?php
require 'dbcon.php';
require_once 'autoload.php';
$csrf = new CSRFtoken();
$token = $csrf->generate();

if (isset($_POST['register'])) {

    if ($_POST['password'] === $_POST['vpassword']) {
        $csrf = new CSRFtoken();
        if ($csrf->validate($_POST['csrf_token'])) {
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];
            $address = $_POST['address'];
            $contact_num = $_POST['contact_num'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $userRegistration = new UserRegister($con);
            $userRegistration->register($fname, $mname, $lname, $address, $contact_num, $email, $password);

            header('location: login.php');
        } else {
            echo 'Invalid CSRF token.';
        }
    } else {
        echo 'Password confirmation failed.';
    }
}
?>

<body>
    <header>
        <div class="header">
            <div class="header-content">
                <img src="assets/photos/tooth_fairy_soft_edges.png" alt="Toothfairy Dental Clinic" class="logo">
                <h1>Welcome to Toothfairy Dental Clinic</h1>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="form-container">
            <h1>Registration Form</h1>
            <form method="POST">
                <!-- Basic Information Section -->
                <div class="basic-info-section">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="half-width">
                                <label for="fname">First Name:</label>
                                <input type="text" id="fname" name="fname" required>
                            </div>
                            <div class="half-width">
                                <label for="mname">Middle Name:</label>
                                <input type="text" id="mname" name="mname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" id="lname" name="lname" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_num">Contact Number:</label>
                        <input type="text" id="contact_num" name="contact_num" required>
                    </div>
                </div>

                <!-- Email and Password Section (Initially Hidden) -->
                <div class="email-password-section hidden">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="vpassword">Confirm Password:</label>
                        <input type="password" id="vpassword" name="vpassword" required>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="form-group">
                    <button type="button" class="back-button hidden">Back</button>
                    <button type="button" class="next-button">Next</button>
                    <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
                    <input type="submit" name="register" value="Register" class="hidden">
                </div>
            </form>
            <p>Already have an account? <a href="login.php">Log in</a></p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Toothfairy Dental Clinic. All rights reserved.</p>
        <p>Follow us on <a href="#" class="text-white">Facebook</a>, <a href="#" class="text-white">Twitter</a>, and <a href="#" class="text-white">Instagram</a>.</p>
    </footer>

    <script src="css/next.js"></script>
</body>