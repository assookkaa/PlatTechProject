<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: whitesmoke;
            /* Dark white */
        }

        .table {
            background-color: white;
            /* White */
        }
    </style>
</head>

<body>
    <header>
        <?php include 'adminNavs/headbar.php'; ?>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <?php include 'adminNavs/sidebar.php'; ?>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 mt-5">
                <h2>All Patients</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Schedule Date</th>
                            <th>Purpose</th>
                            <th>Status</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '/laragon/www/toothfairy/dbcon.php';
                        require_once "/laragon/www/toothfairy/src/csrftoken.php";
                        require_once 'backrooms/admin.customer.profile.php';
                        require_once 'backrooms/admin.customer.profileCntrl.php';
                        require_once 'backrooms/admin.appointment.php';
                        require_once 'backrooms/aadmin.appointmentCntrl.php';

                        $appoint = new AppointmentCntrl($con, null, null, null, null, null);
                        $appoints = $appoint->viewPendingAppointment();
                        $status = "Pending";
                        
                        foreach ($appoints as $patient) {
                            echo "<tr>";
                            echo "<td>{$patient['fname']} {$patient['mname']} {$patient['lname']}</td>";
                            echo "<td>{$patient['age']}</td>";
                            echo "<td>{$patient['date']}</td>";
                            echo "<td>{$patient['purpose']}</td>";
                            echo "<td>{$patient['status']}</td>";
                            echo "<td>";
                            echo "<form method='POST' action=''>";
                            echo "<input type='hidden' name='appointment_id' value='{$patient['appointment_id']}'>";
                            echo "<input type='submit' name='status' value='Confirm'>";
                            echo "<input type='submit' name='status' value='Reject'>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        
                        $appointment_id = $_POST['appointment_id'] ?? null;
                        $status = $_POST['status'] ?? null;
                        if ($status === 'Confirm') {
                            $appoint->confirmAppointment($appointment_id);
                            echo "Appointment confirmed successfully.";
                        } else if ($status === 'Reject') {
                            $appoint->rejectAppointment($appointment_id);
                            echo "Appointment rejected successfully.";
                        } else if ($status !== null) {
                            echo "Invalid status.";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>