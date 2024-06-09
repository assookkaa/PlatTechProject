<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <?php
    include 'navs/navbar.php';
    require 'dbcon.php';
    require_once 'autoload.php';
    require_once 'functions/customer.profile.php';
    require_once 'functions/customer.profileCntrl.php';

    $userId = $_SESSION['user_id'];

    $fname = ['fname'];
    $mname = ['mname'];
    $lname = ['lname'];
    $address = ['address'];
    $contactNum = ['contact_num'];
    $email = ['email'];
    $status = "User";

    $csrf = new CSRFtoken();
    $token = $csrf->generate();
    $csrfToken = $_SESSION['csrf_token'];
    
    try {
        if (!$csrf->validate($csrfToken)) {
            throw new Exception('Invalid CSRF token.');
        }
        
        $profile = new ProfileCntrl($con, $userId, $fname, $mname, $lname, $address, $contactNum, $email, $status);
        $views = $profile->viewProfile($userId);

        if (!empty($views)) {
            foreach ($views as $view) {
    ?>
                <div class="container">
                    <div class="row justify-content-center">
                    <?php include 'navs/sidebar.php'; ?>
                        <div class="col-md-6 profile-container">
                            <div class="card shadow-sm">
                                <div class="card-header profile-header bg-primary text-white text-center">
                                    <h2>My Information</h2>
                                </div>
                                <div class="card-body profile-info">
                                    <h3 class="text-center">Profile Information</h3>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>First Name:</strong> <?php echo $view['fname']; ?></li>
                                        <li class="list-group-item"><strong>Middle Name:</strong> <?php echo $view['mname']; ?></li>
                                        <li class="list-group-item"><strong>Last Name:</strong> <?php echo $view['lname']; ?></li>
                                        <li class="list-group-item"><strong>Address:</strong> <?php echo $view['address']; ?></li>
                                        <li class="list-group-item"><strong>Contact Number:</strong> <?php echo $view['contact_num']; ?></li>
                                        <li class="list-group-item"><strong>Email Address:</strong> <?php echo $view['email']; ?></li>
                                        <!-- Hidden field for account type -->
                                        <li class="list-group-item" style="display: none;"><strong>Account Type:</strong> <?php echo $view['acc_id']; ?></li>
                                    </ul>
                                    <div class="text-center mt-4">
                                        <!-- Button to trigger modal -->
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#changeInfoModal">Change Information</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
            }
        } else {
            echo "<p>No user profiles found.</p>";
        }
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
    ?>
    <!-- Modal for changing information -->
    <div class="modal fade" id="changeInfoModal" tabindex="-1" role="dialog" aria-labelledby="changeInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeInfoModalLabel">Change Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form to change information -->
                    <form>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Enter your first name">
                        </div>
                        <!-- Add more form fields as needed -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
</body>

</html>