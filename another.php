<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Achievements</title>
    <style>
        /* CSS styles */
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
    <?php
    session_start();
    $_SESSION['active'] = 'facts';
    include 'db.php';
    include 'nav.php';

    // Initialize $achiev variable
    $achiev = null;

    // Fetch data based on form submission
    if (isset($_POST['submit'])) {
        // Get selected academic year and branch
        $academic_year = $_POST['academic_year'];
        $branch = $_POST['branch'];

        // Build SQL query with filters
        $sql = "SELECT ach_type, COUNT(*) as count FROM achiev WHERE 1=1";
        if ($academic_year !== "All") {
            $sql .= " AND academic_year = '$academic_year'";
        }
        if ($branch !== "All") {
            $sql .= " AND branch = '$branch'";
        }
        $sql .= " GROUP BY ach_type";

        // Execute the query
        $achiev = mysqli_query($conn, $sql);
    } else {
        // If form is not submitted, fetch all records
        $achiev = mysqli_query($conn, "SELECT ach_type, COUNT(*) as count FROM achiev GROUP BY ach_type");
    }

    // Initialize arrays to store data for Chart.js
    $achTypes = [];
    $achCounts = [];

    // Collect data for Chart.js
    if ($achiev && mysqli_num_rows($achiev) > 0) {
        while ($row = mysqli_fetch_assoc($achiev)) {
            $achTypes[] = $row['ach_type'];
            $achCounts[] = $row['count'];
        }
    }
    ?>

    <!-- Navbar code -->
    <!-- Include nav.php contents here -->

    <main>
        <div>
            <form id="filterForm" method="POST">
                <br>
                <center>
                    <h2 style="font-family: MV Boli; font-size: 30px; color:maroon">Students' Achievements Report</h2>
                    <br>
                    <!-- Search input field -->
                    <label for="regd_no"><b>Registration Number:</b></label>
                    <input type="text" id="regd_no" name="regd_no" placeholder="Optional"
                        value="<?php if(isset($_POST['submit'])) echo $_POST['regd_no']; ?>">
                    <br><br>
                    <b>Branch:</b>
                    <select name="branch" id="branchSelect">
                        <option value="All" <?php if (!isset($_POST['submit']) || ($_POST['submit'] && $_POST['branch'] === 'All')) echo 'selected'; ?>>
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
                    <b>Type of Achievement:</b>
                        <select name="ach_type">
                            <option value="All" <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'All') echo 'selected'; ?>>All</option>
                            <option value="Technical" <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'Technical') echo 'selected'; ?>>Technical</option>
                            <option value="Cultural" <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'Cultural') echo 'selected'; ?>>Cultural</option>
                            <option value="Sports" <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'Sports') echo 'selected'; ?>>Sports</option>
                            <option value="Academics" <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'Academics') echo 'selected'; ?>>Academics</option>
                            <option value="Certifications" <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'Certifications') echo 'selected'; ?>>Certifications</option>
                            <option value="Other" <?php if (!empty($_POST['submit']) && $_POST['ach_type'] === 'Other') echo 'selected'; ?>>Other</option>
                        </select>

                    <br><br>

                    
                    <pre><input class="btn btn-outline-primary" type="submit" name="submit" value="Submit"></pre>

                </center>
            </form>
        </div>

        <!-- Chart container -->
        <div id="achievChartContainer">
            <canvas id="achievChart"></canvas>
        </div>
    </main>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- JavaScript for Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            // Submit form via AJAX on change of select inputs
            $('#filterForm select').change(function() {
                $('#filterForm').submit();
            });

            // Get the initial data for Chart.js
            var initialData = <?php echo json_encode($achCounts); ?>;
            var achTypes = <?php echo json_encode($achTypes); ?>;
            var uniqueColors = generateUniqueColors(initialData.length);

            // Create the chart
            var ctx = document.getElementById('achievChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: achTypes,
                    datasets: [{
                        label: 'Number of Achievements by Type',
                        data: initialData,
                        backgroundColor: uniqueColors,
                        borderColor: uniqueColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            display: true,
                            ticks: {
                                font: {
                                    size: 14 // increase x-axis font size
                                }
                            },
                            grid: {
                                display: false // remove x-axis grid lines
                            }
                        },
                        y: {
                            beginAtZero: true,
                            display: true,
                            ticks: {
                                font: {
                                    size: 14 // increase y-axis font size
                                }
                            },
                            grid: {
                                display: false // remove y-axis grid lines
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
                plugins: [{
                    id: 'customPlugin',
                    afterDatasetsDraw: function(chart) {
                        var ctx = chart.ctx;

                        chart.data.datasets.forEach(function(dataset, i) {
                            var meta = chart.getDatasetMeta(i);
                            if (!meta.hidden) {
                                meta.data.forEach(function(bar, index) {
                                    var data = dataset.data[index];
                                    ctx.fillStyle = 'black';
                                    ctx.font = '14px Arial';
                                    ctx.textAlign = 'center';
                                    ctx.textBaseline = 'bottom';
                                    ctx.fillText(data, bar.x, bar.y - 5);
                                });
                            }
                        });
                    }
                }]
            });
        });

        // Function to generate unique colors
        function generateUniqueColors(count) {
            var colors = [];
            for (var i = 0; i < count; i++) {
                var color = getRandomColor();
                while (colors.indexOf(color) !== -1) {
                    color = getRandomColor();
                }
                colors.push(color);
            }
            return colors;
        }

        // Function to generate a random color
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>
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
</body>
</html>
