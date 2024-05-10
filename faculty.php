<?php
session_start();
$_SESSION['active'] = 'faculty';
include 'db.php';
include 'nav.php';

// Assuming $conn is your database connection object
$query = "SELECT * FROM faculty_achievements"; // Replace 'your_table_name' with your actual table name
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>

<div class="carousel slide" data-bs-theme="dark" data-bs-ride="carousel" id="banners">
        <div class="carousel-inner" >
            <div class="carousel-item active " data-bs-interval="1000">              
                <img src="banners5.jpg" height="380" class="w-100 d-block">
            </div>
            <div class="carousel-item" data-bs-interval="3000">                
                <img src="banners2.jpg" height="380" class="w-100 d-block">
            </div>
            <div class="carousel-item" data-bs-interval="2000">              
                <img src="banners3.jpg" height="380" class="w-100 d-block">
            </div>
            <div class="carousel-item " data-bs-interval="1000">               
                <img src="banners4.jpg" height="380" class="w-100 d-block">
            </div>
            <div class="carousel-item" data-bs-interval="3000">               
                <img src="banners1.jpg" height="380" class="w-100 d-block">
            </div>
            <div class="carousel-item" data-bs-interval="1000">             
                <img src="banners6.jpg" height="380" class="w-100 d-block">
            </div>
        </div>
        <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#banners">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#banners">
            <span class="carousel-control-next-icon"></span>
        </button> 
        <div class="carousel-indicators">
            <button class="active" data-bs-slide-to="0" data-bs-target="#banners"></button>
            <button data-bs-slide-to="1" data-bs-target="#banners"></button>
            <button data-bs-slide-to="2" data-bs-target="#banners"></button>
            <button data-bs-slide-to="3" data-bs-target="#banners"></button>
            <button data-bs-slide-to="4" data-bs-target="#banners"></button>
            <button data-bs-slide-to="5" data-bs-target="#banners"></button>
           
        </div>
    </div>
    <br><br>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Achievers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }

        .container {
            margin: auto;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            margin-bottom: 5px;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>

<body >
            
<main>
    <section id="facts" class="facts">
        <div class="container">
        <center><h2 class="bg bg-success">Faculty Achievements</h2></center>
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="col-3">Name</th>
                        <th scope="col">Image</th>                                                       
                        <th scope="col">Achievement</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($achievData = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td class="col-3"><?php echo $achievData['name'] ?></td>                                                           
                            <td><img src="Dashboard/<?php echo $achievData['img'] ?>" class="rounded rounded-5" height="130" width="130" alt="..."></td>
                            <td><br><br><?php echo $achievData['content'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
                        <br>

                        <center><h2 class="bg bg-primary" >Research Paper Publications</h2></center>

                             <?php
                                    // Assuming $conn is your database connection object
                                    $query = "SELECT * FROM rpp"; // Replace 'your_table_name' with your actual table name
                                    $result = mysqli_query($conn, $query);

                                    if (!$result) {
                                        die("Database query failed: " . mysqli_error($conn));
                                    }
                                    ?>

                                    <table class="table table-hover ">
                                                    <thead class="bg bg-danger">
                                                        <tr>
                                                            <th scope="col" class="col-3">Name</th>
                                                            <th scope="col">Image</th>                                                       
                                                            <th scope="col">Title of the Paper</th>
                                                            <th scope="col">Journal</th>
                                                            <th scope="col">Indexing</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($achievData = mysqli_fetch_array($result)) : ?>
                                                            <tr>
                                                                <td class="col-3"><?php echo $achievData['name'] ?></td>                                                           
                                                                <td><img src="Dashboard/<?php echo $achievData['img'] ?>" class="rounded rounded-5" height="130" width="130" alt="..."></td>
                                                                <td class="col-3"><br><?php echo $achievData['paper_title'] ?></td>
                                                                <td class="col-3"><br><?php echo $achievData['journal'] ?></td>
                                                                <td><br><br><?php echo $achievData['indexing'] ?></td>
                                                            </tr>
                                <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                                        </br></br> 
            
                                                <center><h2 class="bg bg-success">Conferences Atended By Faculty</h2></center>                    

                                                <?php
                                    // Assuming $conn is your database connection object
                                    $query = "SELECT * FROM conferences"; // Replace 'your_table_name' with your actual table name
                                    $result = mysqli_query($conn, $query);

                                    if (!$result) {
                                        die("Database query failed: " . mysqli_error($conn));
                                    }
                                    ?>

                                    <table class="table table-hover ">
                                                    <thead class="bg bg-danger">
                                                        <tr>
                                                            <th scope="col" class="col-3">Name</th>
                                                            <th scope="col">Image</th>                                                       
                                                            <th scope="col">Title of the Paper</th>
                                                            <th scope="col">Conference</th>
                                                            <th scope="col">Orginized by</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($achievData = mysqli_fetch_array($result)) : ?>
                                                            <tr>
                                                                <td class="col-3"><?php echo $achievData['name'] ?></td>                                                           
                                                                <td><img src="Dashboard/<?php echo $achievData['img'] ?>" class="rounded rounded-5" height="130" width="130" alt="..."></td>
                                                                <td class="col-3"><br><?php echo $achievData['paper_title'] ?></td>
                                                                <td class="col-3"><br><?php echo $achievData['conf'] ?></td>
                                                                <td><?php echo $achievData['organized_by'] ?></td>
                                                            </tr>
                                <?php endwhile; ?>
                                                    </tbody>
                                                </table>

        </div>
    </section>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php include 'footer.php' ?>
</body>

</html>
