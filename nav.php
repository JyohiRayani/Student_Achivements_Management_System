<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>BEC Demo Template</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        header #navbar {
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
            background-color: yellow;
            /* Add padding to improve spacing */
        }

        header #navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            /* Center align the navbar items */
        }

        header #navbar ul li {
            margin: 0 30px;
            /* Adjust margin for spacing between menu items */
        }

        header #navbar ul li a {
            text-decoration: none;
            color: #333;
            transition: 0.3s;
            padding: 5px 20px;
            /* Add padding to improve clickable area */
        }

        header #navbar ul li a:hover,
        header #navbar ul li a.active {
            color: blue;
            /* Change color on hover/active */
        }

        /* Dropdown styles */
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: yellow; /* Background color */
            border: 0px solid #ddd; /* Border */
                                        /* border-radius: 0px;  Border radius */
            padding: 8px 0; /* Padding */
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Box shadow */
            z-index: 1;
        }

        .dropdown-menu a {
            color: #333; /* Text color */
            padding: 10px 20px; /* Padding */
            text-decoration: none;
            display: block;
            transition: 0.3s;
        }

        .dropdown-menu a:hover {
            background-color: #f4f4f4; /* Background color on hover */
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            background-color: yellow;
        }

    </style>
</head>

<body >

    <header>
        <div>
            <div class="text-center">
                <a href="#"><img src="head.jpg" alt="Header Image" style="width: 100%;"></a>
                <h3 class="mb-0 text-center text-bg-primary text-white">
                    <strong><h2 style="font-family: Cooper Black; font-size: 40px;">Achievement Reports</h2></strong>
                </h3>
                <nav id="navbar" class="nav-menu navbar">
                    <div class="container d-flex align-items-center justify-content-between">
                        <ul>
                            <li class="dropdown">
                                <a href="index1.php" class="nav-link scrollto <?php echo ($_SESSION['active'] == 'index1') ? 'active' : ''; ?>"><span><h5>Home</h5></span></a>
                               <!--aq <div class="dropdown-menu">
                                    <a href="#">Item 1</a>
                                    <a href="#">Item 2</a>
                                </div>-->
                            </li>
                            <li class="dropdown">
                                <a href="achievements.php" class="nav-link scrollto <?php echo ($_SESSION['active'] == 'achievement') ? 'active' : ''; ?>"> <span><h5>Achievements</h5></span></a>
                                
                            </li>
                            <!--<li class="dropdown">
                                <a href="#" class="nav-link scrollto <?php echo ($_SESSION['active'] == 'faculty') ? 'active' : ''; ?>"><i class="bx bx-user"></i> <span>Faculty</span></a>
                                <div class="dropdown-menu">
                                    <a href="#">Item 1</a>
                                    <a href="#">Item 2</a>
                                </div>-->
                            </li>

                            <!-- <li class="dropdown">
                                <a href="#" class="nav-link scrollto <?php echo ($_SESSION['active'] == 'facts') ? 'active' : ''; ?>"> <span><h5>Facts</h5></span></a>
                                <div class="dropdown-menu">
                                    <a href="another.php">Department Wise </a>
                                    <a href="facts.php">Achievement Wise</a>
                                </div>
                            </li> -->

                            <li class="dropdown">
                                <a href="student_testimonials.php" class="nav-link scrollto <?php echo ($_SESSION['active'] == 'student_testimonials') ? 'active' : ''; ?>"></i> <span><h5>Student Testimonials</h5></span></a>
                                <!--<div class="dropdown-menu">
                                    <a href="#">Item 1</a>
                                    <a href="#">Item 2</a>
                                </div>-->
                            </li>

                            <li class="dropdown">
                                <a href="contact.php" class="nav-link scrollto <?php echo ($_SESSION['active'] == 'contact') ? 'active' : ''; ?>"> <span><h5>Contact</h5></span></a>
                                <!--<div class="dropdown-menu">
                                    <a href="#">Item 1</a>
                                    <a href="#">Item 2</a>
                                </div>-->
                            </li>
                          <!-- <li class="dropdown">
                                <a href="another.php" class="nav-link scrollto <?php echo ($_SESSION['active'] == 'another') ? 'active' : ''; ?>"> <span><h5>Another</h5></span></a>
                                <!-- <div class="dropdown-menu">
                                    <a href="#">Item 1</a>
                                    <a href="#">Item 2</a>
                                </div> -->
                            </li> 
                        </ul> 
                    </div>
                    <!-- <div>
                        <ul>
                            <li><a href="Dashboard/profiel_index.php" class="nav-link scrollto <?php echo ($_SESSION['active'] == 'Dashboard/profiel_index') ? 'active' : ''; ?>"><i class="bx bx-user"></i> <span>Register</span></a></li>
                        </ul>
                    </div> -->
                </nav>
            </div>
        </div>
    </header>

    <!-- Your content goes here -->

</body>

</html>
