<?php
session_start();
$_SESSION['active'] = 'achievement';
include 'db.php';
include 'nav.php';

// Initialize $achiev variable
$achiev = null;
$count = 0; // Initialize count variable

// Initialize an associative array to store prize counts
$prizeCounts = array();

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get selected academic year and event type
    $academic_year = $_POST['academic_year'];
    $ach_type = $_POST['ach_type'];
    $regd_no = $_POST['regd_no'];
    $branch = $_POST['branch'];
    // Build SQL query with filters
    $sql = "SELECT * FROM achiev WHERE 1=1";
    if (!empty($academic_year) && $academic_year != "All") {
        $sql .= " AND academic_year = '$academic_year'";
    }
    if (!empty($ach_type) && $ach_type != "All") {
        $sql .= " AND ach_type = '$ach_type'";
    }
    if (!empty($regd_no)) {
        $sql .= " AND regd_no = '$regd_no'";
    }
    if (!empty($branch) && $branch != "All") {
        $sql .= " AND branch = '$branch'";
    }

    // Execute the main query
    $achiev = mysqli_query($conn, $sql);

    // Clone the main query for counting
    $count_query = preg_replace('/SELECT \* FROM/', 'SELECT COUNT(*) as count FROM', $sql);
    $count_result = mysqli_query($conn, $count_query);

    // Fetch count value
    $count_data = mysqli_fetch_assoc($count_result);
    $count = $count_data['count'];

    // Query to get counts for each prize category based on filters
    $prizeCountsQuery = "SELECT prize, COUNT(*) as count FROM achiev WHERE 1=1";
    if (!empty($academic_year) && $academic_year != "All") {
        $prizeCountsQuery .= " AND academic_year = '$academic_year'";
    }
    if (!empty($ach_type) && $ach_type != "All") {
        $prizeCountsQuery .= " AND ach_type = '$ach_type'";
    }
    if (!empty($regd_no)) {
        $prizeCountsQuery .= " AND regd_no = '$regd_no'";
    }
    if (!empty($branch) && $branch != "All") {
        $prizeCountsQuery .= " AND branch = '$branch'";
    }
    $prizeCountsQuery .= " GROUP BY prize";
    $prizeCountsResult = mysqli_query($conn, $prizeCountsQuery);

    // Store counts in the associative array
    while ($row = mysqli_fetch_assoc($prizeCountsResult)) {
        $prizeCounts[$row['prize']] = $row['count'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Achievements</title>
    <style>
        /* CSS styles */
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            width: calc(33.33% - 20px);
            /* Calculate width for 3 cards with padding */
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            cursor: pointer;
        }

        .card img {
            width: 100%;
            height: 50%;
            /* Set a fixed height for the images */
            object-fit: cover;
            /* Ensure images maintain aspect ratio and cover the entire space */
            transition: transform 0.3s ease;
        }

        .card:hover img {
            transform: scale(1.1);
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 150%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            display: block;
            margin: auto;
            max-width: 35%;
            max-height: 50%;
            transition: transform 0.3s ease;
        }

        .close {
            color: white;
            font-size: 30px;
            position: absolute;
            top: 15px;
            right: 25px;
            cursor: pointer;
        }

        .close:hover {
            color: #ccc;
        }

        body {
            background-image: url("background.png");
        }

        /* Styles for count container */
        .count-container {
            margin-top: 20px;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            
        }

        .count-container table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .count-container th,
        .count-container td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        .count-container th {
            color: #333;
            font-weight: bold;
        }

        .count-container td {
            background-color: #fff;
        }

        .count-container tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        
    </style>
</head>

<body style="background-image: url('background.png');">
    <aside class="text-info position-fixed top-50 start-100 translate-middle">

    </aside>
    <!-- Navbar code -->
    <!-- Include nav.php contents here -->

    <main>
        <div>
            <form method="POST">
                <br>
                <center>
                    <h2 style="font-family: MV Boli; font-size: 30px; color:maroon"><B>Students' Achievements Report</B>
                    </h2>
                    <br>
                    <!-- Search input field -->
                    <label for="regd_no"><b>Registration Number:</b></label>
                    <input type="text" id="regd_no" name="regd_no" placeholder="Optional"
                        value="<?php if (isset($_POST['submit'])) echo $_POST['regd_no']; ?>">
                    <br><br>

                    <b>Academic Year :</b>
                    <select name="academic_year">
                        <option value="All"
                            <?php if (isset($_POST['submit']) && $_POST['academic_year'] === 'All') echo ' selected'; ?>>
                            All</option>
                        <?php
                        // Fetch unique academic years from the database
                        $academic_years_query = mysqli_query($conn, "SELECT DISTINCT academic_year FROM achiev ORDER BY academic_year DESC");
                        while ($row = mysqli_fetch_assoc($academic_years_query)) {
                            $selected = isset($_POST['submit']) && $_POST['academic_year'] === $row['academic_year'] ? ' selected' : '';
                            echo "<option value='" . $row['academic_year'] . "'$selected>" . $row['academic_year'] . "</option>";
                        }
                        ?>
                    </select>
                    <br><br>
                    <b>Department :</b>
                    <select name="branch" id="branchSelect">
                        <option value="All"
                            <?php if (!isset($_POST['submit']) || ($_POST['submit'] && $_POST['branch'] === 'All')) echo 'selected'; ?>>
                            All</option>
                        <?php
                        // Fetch unique branches from the database
                        $branchQuery = mysqli_query($conn, "SELECT DISTINCT branch FROM achiev ORDER BY branch DESC");
                        while ($row = mysqli_fetch_assoc($branchQuery)) {
                            $selected = isset($_POST['submit']) && $_POST['branch'] === $row['branch'] ? 'selected' : '';
                            echo "<option value='" . $row['branch'] . "'$selected>" . $row['branch'] . "</option>";
                        }
                        ?>
                    </select>
                    <br><br>
                    <b>Type of Achievement:</b>
                    <select name="ach_type">
                        <option value="All"
                            <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'All') echo 'selected'; ?>>All
                        </option>
                        <option value="Technical"
                            <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'Technical') echo 'selected'; ?>>
                            Technical</option>
                        <option value="Cultural"
                            <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'Cultural') echo 'selected'; ?>>
                            Cultural</option>
                        <option value="Sports"
                            <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'Sports') echo 'selected'; ?>>
                            Sports</option>
                        <option value="Academics"
                            <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'Academics') echo 'selected'; ?>>
                            Academics</option>
                        <option value="Certifications"
                            <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'Certifications') echo 'selected'; ?>>
                            Certifications</option>
                        <option value="Other"
                            <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'Other') echo 'selected'; ?>>
                            Other</option>
                    </select>

                    <br><br>
                    
                    
                    <pre><input class="btn btn-outline-primary" type="submit" name="submit" value="Submit"></pre>
                </center>
            </form>
        </div>

        <!-- Display counts for each prize category in a table format -->
        <div class="count-container">
            <table class="table table-hover bg-black w-25">
                <thead>
                    <tr>
                        <th>Prize Category</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $totalCount = 0; // Initialize total count variable
                    foreach ($prizeCounts as $prize => $count) : 
                        $totalCount += $count; // Accumulate total count
                    ?>
                        <tr>
                            <td><?php echo $prize; ?></td>
                            <td><?php echo $count; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- Add a row for total count -->
                    <tr>
                        <td><strong>Total Count</strong></td>
                        <td><strong><?php echo $totalCount; ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="container">

            <?php
            // Check if $achiev is not null before using it
            if ($achiev && mysqli_num_rows($achiev) > 0) {
                while ($achievData = mysqli_fetch_array($achiev)) : ?>
                    <div class="card" onclick="showModal('<?php echo $achievData['img']; ?>')">
                        <img src="Dashboard/<?php echo $achievData['img'] ?>" alt="Achievement Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $achievData['student_name'] ?></h5>
                            <p class="card-text"><strong>Regd.No:</strong> <?php echo $achievData['regd_no'] ?></p>
                            <p class="card-text"><strong>Branch:</strong> <?php echo $achievData['branch'] ?></p>
                            <p class="card-text"><strong>Achievement Type:</strong> <?php echo $achievData['ach_type'] ?></p>
                            <p class="card-text"><strong>Achievement:</strong> <?php echo $achievData['ach_sub_type'] ?></p>
                            <p class="card-text"><strong>Prize:</strong> <?php echo $achievData['prize'] ?></p>
                            <p class="card-text"><strong>Event:</strong> <?php echo $achievData['event_name'] ?></p>
                            <p class="card-text"><strong>Academic Year:</strong> <?php echo $achievData['academic_year'] ?></p>
                            <p class="card-text"><strong>Date:</strong> <?php echo $achievData['date'] ?></p>
                        </div>
                    </div>
            <?php endwhile;
            } else {
                // Handle the case when $achiev is null or empty
                echo "<p>No achievements found.</p>";
            }
            ?>
        </div>
    </main>

    <!-- Modal HTML -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- JavaScript for modal popup -->
    <script>
        // Function to display modal with larger image
        function showModal(imgSrc) {
            var modal = document.getElementById('myModal');
            var modalImg = document.getElementById("img01");

            modal.style.display = "block";
            modalImg.src = "Dashboard/" + imgSrc;

            // Close modal when user clicks on 'x'
            var span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
