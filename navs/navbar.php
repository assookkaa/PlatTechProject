<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toothfairy Dental Clinic</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets/photos/tooth_fairy_soft_edges.png" alt="Toothfairy Dental Clinic" class="logo">
            Toothfairy Dental Clinic
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#about">About Us</a>
                </li>
                <?php 
                session_start();
                if(isset($_SESSION['user_id'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white mr-2" href="addapointment.php">Book an Appointment</a> <!-- Added margin-right -->
                    </li>
                    <li class="nav-item dropdown"> <!-- Added dropdown wrapper -->
                        <a class="nav-link dropdown-toggle btn btn-info text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> <!-- Dropdown menu -->
                            <a class="dropdown-item" href="profile.php">View Profile</a> <!-- Profile link -->
                            <div class="dropdown-divider"></div> <!-- Divider -->
                            <a class="dropdown-item" href="pendingAppointment.php">Pending Appointment</a> <!-- Profile link -->
                            <div class="dropdown-divider"></div> <!-- Divider -->
                            <a class="dropdown-item" href="confirmedAppointment.php">Comfirmed Appointment</a> <!-- Profile link -->
                            <div class="dropdown-divider"></div> <!-- Divider -->
                            <a class="dropdown-item" href="logout.php">Logout</a> <!-- Logout link -->
                        </div>
                    </li>
                <?php } else{ ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white" href="login.php">Book an Appointment</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
