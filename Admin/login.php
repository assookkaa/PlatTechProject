<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/login.css">
</head>
<?php
session_start();
require_once '/laragon/www/toothfairy/dbcon.php';
require_once "/laragon/www/toothfairy/src/csrftoken.php";
require_once "backrooms/admin.profile.php";
require_once "backrooms/admin.profileCntrl.php";

$csrf = new CSRFtoken();
$token = $csrf->generate();

if (isset($_POST["POST"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $csrfToken  = $_POST['csrf_token'];

    try {
        if (!$csrf->validate($csrfToken)) {
            throw new Exception("Invalid Token");
        }
        $adminController = new AdminCntrl($con);
        $adminController->login($email, $password);
        header('Location: index.php');
        exit();
    } catch (Exception $e) {
        echo "Login failed: " . $e->getMessage();
    }
}
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Admin Login</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                            </div>
                            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
                            <button type="submit" name="POST" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>