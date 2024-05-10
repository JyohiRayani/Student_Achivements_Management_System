<?php
session_start();
$_SESSION['active'] = 'student_testimonials';
include 'db.php';
include 'nav.php';

// Assuming $conn is your database connection object
$query = "SELECT * FROM testimonials"; // Replace 'your_table_name' with your actual table name
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Achievements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0px; /* Added padding for better spacing */
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 10px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            margin-bottom: 5px;
        }

        .card-img-circle {
            border-radius: 50%;
        } 
        body{
            background-image: url("background.png");
        }
    </style>
</head>
<body style="background-image: url('background.png');">
    
<main>
    <section id="faculty-achievements" class="faculty-achievements">
        <div class="container">
            <h2 class="text-center mb-4 " style="font-family: Algerian; font-size: 30px;">Student Testimonials</h2>
            <div class="row">
                <?php 
                if (mysqli_num_rows($result) > 0) {
                    while ($achievData = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="row">
                                
                                <div class="col-5 m-3 d-flex justify-content-center align-items-center">
                                    <img src="Dashboard/<?php echo $achievData['img'] ?>" class="card-img-top card-img-circle" alt="..." style="width: 120px; height: 120px;">
                                </div>
                                <div class="col-5">
                                    <div class="card-body">
                                        <br>
                                        <h5 class="card-title"><?php echo $achievData['student_name'] ?></h5>
                                        <h5 class="card-title"><?php echo $achievData['regd_no'] ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $achievData['content'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                    }
                } 
                ?>
            </div>
            <br>
            <!-- <div class="section-title">
          <h3>If you want to add your Testimonials <a href="std_testimonials.php"><span class="btn btn-outline-success"> click here</span></a></h3>
        </div> -->
        </div>
        
    </section>
    
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php include 'footer.php' ?>
</body>
</html>
