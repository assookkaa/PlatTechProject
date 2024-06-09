<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include 'navs/navbar.php';
require 'dbcon.php';
require_once 'autoload.php';
require_once 'functions/appointment.php';
require_once 'functions/appointmentCntrl.php';


$csrf = new CSRFtoken();
$token = $csrf->generate();

$error_message = ''; // Initialize error message variable

// Ensure the AppointmentCntrl object is only created after the form submission
$appointment = null;

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submittedToken = $_POST['csrf_token'];
    if ($csrf->validate($submittedToken)) {
        $userId = $_SESSION['user_id']; // Assuming user is logged in
        $age = $_POST['age'];
        $date = $_POST['date'];
        $purpose = $_POST['purpose'];
        $status = "Pending"; // Default status

        try {
            $appointment = new AppointmentCntrl($con, $userId, $age, $date, $purpose, $status); // Pass $con to the constructor
            $appointment->addAppointment();
            // Redirect to prevent form resubmission
            header("Location: addapointment.php?success=true");
            exit();
        } catch (Exception $e) {
            $error_message = "Error: " . $e->getMessage();
        }
    } else {
        $error_message = "Invalid CSRF token";
    }
}
?>
    <style>
        .purpose-textarea {
            resize: vertical;
            min-height: 100px;
        }
    </style>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="mb-0">Request For Appointment</h1>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET['success']) && $_GET['success'] == 'true') {
                    echo "<div class='alert alert-success'>Appointment successfully added!</div>";
                }
                if (isset($error_message) && !empty($error_message)) {
                    echo "<div class='alert alert-danger'>$error_message</div>";
                }
                ?>
                <form method="POST">
                    <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="text" class="form-control" id="age" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="purpose">Purpose:</label>
                        <textarea class="form-control purpose-textarea" id="purpose" name="purpose" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="POST" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
