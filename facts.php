<?php
session_start();
$_SESSION['active'] = 'facts';
include 'db.php';
include 'nav.php';

// Initialize $achiev variable
$achiev = null;
if (isset($_POST['submit'])) {
    // Get selected academic year and event type
    $academic_year = $_POST['academic_year'];
    $ach_type = $_POST['ach_type'];
    $regd_no = $_POST['regd_no'];
    $branch=$_POST['branch'];
    // Build SQL query with filters
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


    // Execute the query
    $achiev = mysqli_query($conn, $sql);
} else {
    // If form is not submitted, fetch all records
    $achiev = mysqli_query($conn, "SELECT * FROM achiev");
}
// Initialize arrays to store data for Chart.js
$achTypeLabels = ['Technical', 'Cultural', 'Sports', 'Academics', 'Certifications', 'Other'];
$achTypeCounts = [0, 0, 0, 0, 0, 0]; // Adjusted to include six elements

// Collect data for Chart.js
if ($achiev && mysqli_num_rows($achiev) > 0) {
    while ($achievData = mysqli_fetch_array($achiev)) {
        $achType = $achievData['ach_type'];
        // Increment the counter for the corresponding achievement type
        if (in_array($achType, $achTypeLabels)) {
            $index = array_search($achType, $achTypeLabels);
            $achTypeCounts[$index]++;
        }
    }
}

// Calculate total count of achievements
$totalAchievements = array_sum($achTypeCounts);
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
            height: 100%;
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

        /* Chart container */
        #achievChartContainer {
            margin-top: 20px;
            width: 80%;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

    <!-- Navbar code -->
    <!-- Include nav.php contents here -->

    <main>
        <div>
            <form method="POST">
                <br>
                <center>
                    <h2 style="font-family: Algerian; font-size: 30px;">Students' Achievements Report</h2>
                    <br>
                    <!-- Search input field -->
                    <label for="regd_no"><b>Registration Number:</b></label>
                    <input type="text" id="regd_no" name="regd_no" placeholder="Optional"
                        value="<?php if(isset($_POST['submit'])) echo $_POST['regd_no']; ?>">
                    <br><br>

                    <b>Academic Year :</b>
                    <select name="academic_year" id="academic_year">
                        <option value="All"
                            <?php if(isset($_POST['submit']) && $_POST['academic_year'] === 'All') echo ' selected'; ?>>
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
                    <pre><input class="btn btn-outline-primary" type="submit" name="submit" value="Submit"></pre>

                </center>
            </form>
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
                    <!-- Displaying registration number -->
                    <p class="card-text"><strong>Regd.No:</strong> <?php echo $achievData['regd_no'] ?></p>
                    <p class="card-text"><strong>Branch:</strong> <?php echo $achievData['branch'] ?></p>
                    <p class="card-text"><strong>Achievement Type:</strong> <?php echo $achievData['ach_type'] ?></p>
                    <p class="card-text"><strong>Achievement:</strong> <?php echo $achievData['ach_sub_type'] ?></p>
                    <p class="card-text"><strong>Prize:</strong> <?php echo $achievData['prize'] ?></p>
                    <p class="card-text"><strong>Event:</strong> <?php echo $achievData['event_name'] ?></p>
                    <p class="card-text"><strong>Academic Year:</strong> <?php echo $achievData['academic_year'] ?></p>
                    <p class="card-text"><strong>Date:</strong> <?php echo $achievData['date'] ?></p>
                    <!-- Display student name and registration number -->
                    <p class="card-text"><strong>Student Name:</strong> <?php echo $achievData['student_name'] ?></p>
                    <p class="card-text"><strong>Registration Number:</strong> <?php echo $achievData['regd_no'] ?></p>
                    <!-- Display student photo -->
                    <img src="path_to_student_photos/<?php echo $achievData['img']; ?>" alt="Student Photo">
                </div>
            </div>
            <?php endwhile;
            } else {
                // Handle the case when $achiev is null or empty
                echo "<p>No achievements found.</p>";
            }
            ?>
        </div>

        <!-- Chart container -->
        <div id="achievChartContainer">
            <canvas id="achievChart"></canvas>
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
            var modalContent = document.querySelector(".modal-content");

            modal.style.display = "block";
            modalImg.src = "Dashboard/" + imgSrc;

            // Increase height of modal content
            modalContent.style.maxHeight = "90%"; // Adjust as needed

            // Close modal when user clicks on 'x'
            var span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
                modal.style.display = "none";
                // Reset height of modal content when closing modal
                modalContent.style.maxHeight = ""; // Reset to default
            }
        }
    </script>

    <!-- JavaScript for Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        // Get the canvas element
        var ctx = document.getElementById('achievChart').getContext('2d');

        // Create the chart
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($achTypeLabels); ?>,
                datasets: [{
                    label: 'Number of Achievements',
                    data: <?php echo json_encode($achTypeCounts); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)', // Red
                        'rgba(54, 162, 235, 0.5)', // Blue
                        'rgba(255, 206, 86, 0.5)', // Yellow
                        'rgba(75, 192, 192, 0.5)', // Green
                        'rgba(153, 102, 255, 0.5)', // Purple
                        'rgba(255, 159, 64, 0.5)' // Orange
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            display: false // Remove x-axis grid lines
                        }
                    },
                    y: {
                        grid: {
                            display: false // Remove y-axis grid lines
                        },
                        beginAtZero: true
                    }
                },
                plugins: {
                    datalabels: {
                        color: 'black',
                        anchor: 'end',
                        align: 'top',
                        formatter: function(value, context) {
                            // Display the value on top of the bar
                            return value;
                        },
                        // Display total count at the top of the chart
                        total: {
                            formatter: function() {
                                return 'Total: ' + <?php echo $totalAchievements; ?>;
                            },
                            color: 'black',
                            anchor: 'center',
                            align: 'center',
                            display: true
                        }
                    }
                },
                // Chart title based on selected academic year
                plugins: {
                    title: {
                        display: true,
                        text: 'Student Achievements Report - Academic Year: ' + document.getElementById('academic_year').value
                    }
                }
            }
        });
    </script>
    <?php
include 'db.php';
// Initialize $achiev variable
$achiev = null;

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get selected academic year and event type
    $academic_year = $_POST['academic_year'];
   
    $regd_no = $_POST['regd_no'];

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

    // Execute the query
    $achiev = mysqli_query($conn, $sql);
} else {
    // If form is not submitted, fetch all records
    $achiev = mysqli_query($conn, "SELECT * FROM achiev");
}
?>
<main>
     <div class="container">  
        <br> 
        <?php 
            // Check if $achiev is not null before using it
            if ($achiev && mysqli_num_rows($achiev) > 0) {
                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Image</th>';
                echo '<th>Student Name</th>';
                echo '<th>Regd. No</th>';
                echo '<th>Branch</th>';
                echo '<th>Achievement Type</th>';
                echo '<th>Achievement</th>';
                echo '<th>Prize</th>';
                echo '<th>Event</th>';
                echo '<th>Academic Year</th>';
                echo '<th>Date</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
        
            while ($achievData = mysqli_fetch_array($achiev)) {
                echo '<tr onclick="showModal(\'' . $achievData['img'] . '\')">';
                echo '<td><img src="Dashboard/' . $achievData['img'] . '" alt="Achievement Image" style="width: 100px; height: auto;"></td>';
                echo '<td>' . $achievData['student_name'] . '</td>';
                echo '<td>' . $achievData['regd_no'] . '</td>';
                echo '<td>' . $achievData['branch'] . '</td>';
                echo '<td>' . $achievData['ach_type'] . '</td>';
                echo '<td>' . $achievData['ach_sub_type'] . '</td>';
                echo '<td>' . $achievData['prize'] . '</td>';
                echo '<td>' . $achievData['event_name'] . '</td>';
                echo '<td>' . $achievData['academic_year'] . '</td>';
                echo '<td>' . $achievData['date'] . '</td>';
                echo '</tr>';
        }
        
                echo '</tbody>';
                echo '</table>';
        } else {
            // Handle the case when $achiev is null or empty
            echo "<p>No achievements found.</p>";
        }
    ?>
</div>
</main>



    
    
</body>

</html>
