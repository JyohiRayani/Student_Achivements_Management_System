<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Testimonials Form</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Custom Styles */
    body {
        background-color: #f8f9fa;
    }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: #007bff;
        color: #fff;
        border-radius: 15px 15px 0 0;
    }
    .form-control {
        border-radius: 10px;
    }
    label {
        font-size: 18px;
        font-weight: bold;
    }
    #image_preview1 {
        max-width: 100px;
        max-height: 100px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }
    /* Adjustments for small devices */
    @media (max-width: 576px) {
        .card-body {
            padding: 15px;
        }
    }
</style>
</head>
<body>

<main style="margin-top: 58px;">
    <div class="container pt-4">
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center" style="font-family: magneto; font-size: 32px;"><strong>Student Testimonials Form</strong></h5>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" style="max-width: 600px; margin: 0 auto;">
                        <div class="form-group">
                            <label for="student_name">Name</label>
                            <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="regd_no">Register No</label>
                            <input type="text" class="form-control" id="regd_no" name="regd_no" placeholder="Enter Register No">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" name="content" rows="4" class="form-control" placeholder="Enter Content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">Image File:</label><br>
                            <img id="image_preview1" src="#" alt="Image Preview" />
                            <input type="file" id="file" class="form-control" name="imagePrv" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</main>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image_preview1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file").change(function() {
        readURL1(this);
    });
</script>

</body>
</html>
