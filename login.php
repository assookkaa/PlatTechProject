<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toothfairy Dental Clinic - Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<?php
session_start();
require_once 'autoload.php';
require_once 'dbcon.php';
$csrf = new CSRFtoken();
$token = $csrf->generate();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $csrfToken = $_POST['csrf_token'];

    try {
       
        if (!$csrf->validate($csrfToken)) {
            throw new Exception('Invalid CSRF token.');
        }

      
        $login = new userAuth($con);
        $user = $login->login($email, $password);

        $_SESSION['user_id'] = $user->getId();
        $_SESSION['account_type'] = $user->getCustomer(); 

        header('Location: index.php');
        exit;
    } catch (Exception $e) {
        echo "Login failed: " . $e->getMessage();
    }
}
?>


<body>

    <!-- Header -->
    <header class="custom-header text-white text-center py-3">
        <h1>Toothfairy Dental Clinic</h1>
    </header>


    <div class="container-fluid flex-grow-1 d-flex flex-column">
        <div class="row flex-grow-1">
            <!-- Left Side - Clinic Information -->
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-start p-5">
                <div class="about-box p-5">
                    <h2 class="display-4">Welcome to Toothfairy Dental Clinic</h2>
                    <p class="lead">
                        Our mission is to provide top-quality dental care in a comfortable and friendly environment.
                    </p>
                    <ul>
                        <li>Comprehensive Dental Exams</li>
                        <li>Professional Cleanings</li>
                        <li>Cosmetic Dentistry</li>
                        <li>Restorative Dentistry</li>
                        <li>Emergency Dental Services</li>
                    </ul>
                    <p>Visit us at <strong>1234 Toothfairy Lane</strong> or call us at <strong>(555) 123-4567</strong> for an appointment.</p>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-5">
                <div class="login-box p-4">
                    <h2 class="mb-4 text-center">Login</h2>
                    <form method="POST">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <!-- CSRF Token -->
                        <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
                        <button type="submit" name = "login" class="btn btn-primary btn-block">Login</button>
                        <p class="mt-3 text-center">
                            Don't have an account? <a href="register.php">Register here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; 2024 Toothfairy Dental Clinic. All rights reserved.</p>
        <p class="mb-0">Follow us on
            <a href="#" class="text-white">Facebook</a>,
            <a href="#" class="text-white">Twitter</a>, and
            <a href="#" class="text-white">Instagram</a>.
        </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>