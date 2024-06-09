<!-- sidebar.php -->
<div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
        <div class="media d-flex align-items-center">
            <div class="media-body">
    <?php 
    require 'dbcon.php';
    require_once 'autoload.php';
    require_once 'functions/customer.profile.php';
    require_once 'functions/customer.profileCntrl.php';

    $userId = $_SESSION['user_id'];

    $fname = ['fname'];
    $mname = ['mname'];
    $lname = ['lname'];
    $status = "User";


    try {
        $profile = new ProfileCntrl($con, $userId, $fname, $mname, $lname, null, null, null, $status);
        $views = $profile->viewProfile($userId);

        if (!empty($views)) {
            foreach ($views as $view) {
    ?>
                <h4 class="m-0"><?php echo $view['fname'] . " " . $view['mname'] . " " . $view['lname'];?></h4>
                <p class="font-weight-normal text-muted mb-0"><?php echo $status?></p>
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
    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
            <a href="profile.php" class="nav-link text-dark bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                Profile
            </a>
        </li>
        <li class="nav-item">
            <a href="pendingAppointment.php" class="nav-link text-dark">
                <i class="fa fa-calendar mr-3 text-primary fa-fw"></i>
                Pending Appointments
            </a>
        </li>
        <li class="nav-item">
            <a href="confirmedAppointment.php" class="nav-link text-dark">
                <i class="fa fa-check mr-3 text-primary fa-fw"></i>
                Confirmed Appointments
            </a>
        </li>
    </ul>
</div>
