<?php
session_start();
$_SESSION['active'] = 'about';
include 'db.php';
include 'nav.php';

// Initialize $result variable
$result = null;

// Check if form is submitted
if (isset($_GET['submit'])) {
    // Get search query
    $search_query = $_GET['regd_no'];

    // Build SQL query with search filter
    $query = "SELECT * FROM profile WHERE regd_no LIKE '%$search_query%'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Database query failed: " . mysqli_error($conn));
    }
} else {
    // If form is not submitted, fetch all records
    $query = "SELECT * FROM profile";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Database query failed: " . mysqli_error($conn));
    }
}
?>

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
            cursor: pointer; /* Add cursor pointer to indicate it's clickable */
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

<body>
    <main>
        <br><br>
        <span class="position-relative top-0 start-50 translate-middle-x">
            <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div style="display: flex; align-items: center;">
                    <input type="text" id="search" name="regd_no" placeholder="Search by Registration Number" style="padding: 8px; border-radius: 5px; border: 1px solid #ced4da;">
                    <button type="submit" name="submit" style="background-color: #007bff; color: #fff; border: none; padding: 8px 12px; border-radius: 5px;"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </span>

        <section id="facts" class="facts">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($achievData = mysqli_fetch_array($result)) : ?>
                            <div class="col-lg-4">
                                <div class="card" onclick="fetchData('<?php echo $achievData['regd_no']; ?>')">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <br><br><br>
                                                    <h5 class="card-title"><?php echo $achievData['student_name'] ?></h5>
                                                    <p class="card-text"><strong>Regd.No:</strong> <?php echo $achievData['regd_no'] ?></p>
                                                    <!-- <p class="card-text"><strong>Branch :</strong> <?php echo $achievData['branch'] ?></p>
                                                    <p class="card-text"><strong>Section:</strong> <?php echo $achievData['section'] ?></p>-->
                                                </div>
                                                <div class="col">
                                                    <img src="Dashboard/<?php echo $achievData['img'] ?>" class="rounded rounded-pill" height="200" width="200" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    } else {
                        echo "<div class='col'><center><p>No records found.</p></center></div>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <script>
        function fetchData(regd_no) {
            // Send AJAX request to fetch data for the clicked registration number
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Update page content with fetched data
                    var response = JSON.parse(this.responseText);
                    // Example: Display fetched data in alert
                    alert("Name: " + response.student_name + "\nRegistration Number: " + response.regd_no);
                }
            };
            xhr.open("GET", "fetch_data.php?regd_no=" + regd_no, true);
            xhr.send();
        }
    </script>
</body>

</html>
