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
    require_once 'functions/appointment.php';
    require_once 'functions/appointmentCntrl.php';

    $userId = $_SESSION['user_id']; // Assuming user is logged in
    $limit = 3;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $limit;
    $status = 'Confirmed';

    $csrf = new CSRFtoken();
    $token = $csrf->generate();
    $csrfToken = $_SESSION['csrf_token'];
    
    try {
        if (!$csrf->validate($csrfToken)) {
            throw new Exception('Invalid CSRF token.');
        }
        $appointmentCntrl = new AppointmentCntrl($con, $userId, null, null, null, null); // Create the controller object
        $appointments = $appointmentCntrl->viewAppointment($userId, $status, $limit, $offset); // Fetch appointments for the logged-in user
        $totalAppointments = count($appointmentCntrl->viewAppointment($userId, PHP_INT_MAX, 0)); // Get the total number of appointments

        if (empty($appointments)) { ?>
            <div class="container">
                <div class="row justify-content-center">
                <?php include 'navs/sidebar.php'; ?>
                    <div class="col-md-6 appointment-container">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white text-center">
                                <h2>My Appointments</h2>
                            </div>
                            <div class="card-body">
                                <div class="appointment-item mb-3 text-center">
                                    <h2 class="mb-5">You Have No Confirmed Appointment</h2>
                                    <h4>Please Wait</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="container">
                <div class="row justify-content-center">
                <?php include 'navs/sidebar.php'; ?>
                    <div class="col-md-6 appointment-container">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white text-center">
                                <h2>My Appointments</h2>
                            </div>
                            <div class="card-body">
                                <?php foreach ($appointments as $appointment) { ?>
                                    <div class="appointment-item mb-3">
                                        <h4><strong>Date:</strong> <?php echo $appointment['date'] ?></h4>
                                        <p><strong>Purpose:</strong> <?php echo $appointment['purpose'] ?></p>
                                        <p><strong>Status:</strong> <?php echo $appointment['status'] ?></p>
                                    </div>
                                <?php } ?>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <?php if ($page > 1) { ?>
                                            <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li>
                                        <?php } ?>
                                        <?php for ($i = 1; $i <= ceil($totalAppointments / $limit); $i++) { ?>
                                            <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                        <?php } ?>
                                        <?php if ($page * $limit < $totalAppointments) { ?>
                                            <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li>
                                        <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <?php }
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
    ?>


</body>

</html>