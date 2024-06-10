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
            background-color: whitesmoke; /* Dark white */
        }
        .table {
            background-color: white; /* White */
        }
        @media (max-width: 768px) {
            #sidebar-wrapper {
                display: none;
            }
            #header {
                position: fixed;
                width: 100%;
                z-index: 1000;
            }
            #main-content {
                margin-top: 100px; /* Adjust this value as per the height of your header */
            }
        }
    </style>
</head>

<body>
    <header id="header">
    <?php include 'adminNavs/headbar.php'; ?>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-12 col-md-3" id="sidebar-wrapper">
                <?php include 'adminNavs/sidebar.php'; ?>
            </div>

            <!-- Main Content -->
            <div class="col-12 col-md-9 mt-5" id="main-content">
                <h2>All Patients</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Email Address</th>
                        <th>Role</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    require_once '/laragon/www/toothfairy/dbcon.php';
                    require_once "/laragon/www/toothfairy/src/csrftoken.php";
                    require_once 'backrooms/admin.customer.profile.php';
                    require_once 'backrooms/admin.customer.profileCntrl.php';

                    $user = new ProfileCntrl($con, null, null, null, null, null, null, null, null);
                    $patients = $user->viewAllProfile();
                    foreach ($patients as $patient) {
                        echo "</tr>";
                        echo "<td>{$patient['fname']} {$patient['mname']} {$patient['lname']}</td>";
                        echo "<td>{$patient['address']}</td>";
                        echo "<td>{$patient['contact_num']}</td>";
                        echo "<td>{$patient['email']}</td>";
                        echo "<td>{$patient['acc_type']}</td>";
                        echo "</tr>";
                    }
                    
                    ?>
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
