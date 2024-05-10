<?php
include 'db.php';

if(isset($_GET['regd_no'])) {
    $regd_no = mysqli_real_escape_string($conn, $_GET['regd_no']);
    $query = "SELECT * FROM achiev WHERE regd_no = '$regd_no'";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $student_data = mysqli_fetch_assoc($result);
        echo json_encode($student_data);
    } else {
        echo "No student found with the provided registration number.";
    }
} else {
    echo "Registration number not provided.";
}
?>
