<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toothfairy Dental Clinic</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
#thumb-up {
    position: relative;
    height: 400px; /* Adjust height as needed */
    background-image: url('assets/photos/thumb-up.jpg');
    background-size: cover;
    background-position: center;
    text-align: center;
    color: white; /* Adjust text color */
    padding: 50px;
    overflow: hidden; /* Ensure overflow doesn't affect blur */
}

#thumb-up:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
   /* Semi-transparent overlay */
    backdrop-filter: blur(5px); /* Apply blur to overlay */
}

#thumb-up h2 {
    font-size: 6rem; /* Larger font size */
    font-weight: bold;
    margin-bottom: 20px;
    position: relative; /* Ensure z-index works properly */
    z-index: 1; /* Ensure text appears above overlay */
}

#thumb-up p {
    font-size: 2rem; /* Larger font size */
    margin-bottom: 0;
    position: relative; /* Ensure z-index works properly */
    z-index: 1;
}


        /* Add hover effect to card */
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body>

    <?php include 'navs/navbar.php'; 
    
    ?>

    <!-- Thumb-up image section -->
    <section id="thumb-up" class="py-5 text-center">
        <div class="container">
            <h2 class="mb-4">Welcome to Toothfairy Dental Clinic</h2>
            <p>Providing exceptional dental care for you and your family.</p>
        </div>
    </section>

   

    <section id="services" class="services py-5">
        <div class="container text-center">
            <h2 class="mb-4">Our Services</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="assets/photos/general-dentists.jpg" class="card-img-top" alt="General Dentistry">
                        <div class="card-body">
                            <h5 class="card-title">General Dentistry</h5>
                            <ul class="list-group list-group-flush text-left">
                                <li class="list-group-item py-2">Routine check-ups and cleanings</li>
                                <li class="list-group-item py-2">Fillings (composite or amalgam)</li>
                                <li class="list-group-item py-2">Tooth extractions</li>
                                <li class="list-group-item py-2">Dental sealants</li>
                                <li class="list-group-item py-2">Fluoride treatments</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="assets/photos/Cosmetic-Dentistry.jpeg" class="card-img-top" alt="Cosmetic Dentistry">
                        <div class="card-body">
                            <h5 class="card-title">Cosmetic Dentistry</h5>
                            <ul class="list-group list-group-flush text-left">
                                <li class="list-group-item py-2">Teeth whitening (in-office or take-home kits)</li>
                                <li class="list-group-item py-2">Veneers (porcelain or composite)</li>
                                <li class="list-group-item py-2">Cosmetic bonding</li>
                                <li class="list-group-item py-2">Tooth contouring and reshaping</li>
                                <li class="list-group-item py-2">Gum contouring</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="assets/photos/restorative.jpg" class="card-img-top" alt="Restorative Dentistry">
                        <div class="card-body">
                            <h5 class="card-title">Restorative Dentistry</h5>
                            <ul class="list-group list-group-flush text-left">
                                <li class="list-group-item py-2">Dental crowns (ceramic, porcelain, or metal)</li>
                                <li class="list-group-item py-2">Dental bridges</li>
                                <li class="list-group-item py-2">Dentures (partial or full)</li>
                                <li class="list-group-item py-2">Dental implants</li>
                                <li class="list-group-item py-2">Root canal treatment</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about py-5 bg-light position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="assets/photos/smile.jpeg" alt="About Us" class="img-fluid mb-4 mb-md-0" style="opacity: 0.8;">
                </div>
                <div class="col-md-6 about-text">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2024 Toothfairy Dental Clinic. All rights reserved.</p>
            <p>Follow us on
                <a href="#" class="text-white">Facebook</a>,
                <a href="#" class="text-white">Twitter</a>, and
                <a href="#" class="text-white">Instagram</a>.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
   <!-- Bootstrap JS and dependencies -->
   <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

</body>

</html>
