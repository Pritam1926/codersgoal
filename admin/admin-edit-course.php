<?php
include '../connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM course_details WHERE Course_id = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
else {
    echo "No ID provided for Edit.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit course</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background: linear-gradient(to bottom right, #1e3c72, #2a5298, #6dd5ed, #ffffff);
        margin: 0;
        padding: 0;
    }

    /* Form Container Styling */
    .form-container {
        max-width: 650px;
        margin: 50px auto;
        background: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    .button {
        text-decoration: none;
        font-size: 1.2em;
        color: black;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #1e3c72;
        font-size: 28px;
        font-weight: bold;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: black;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-size: 16px;
    }

    .form-group input:focus {
        border-color: #6dd5ed;
        box-shadow: 0 0 10px rgba(109, 213, 237, 0.5);
    }

    .form-group button {
        width: 100%;
        padding: 15px;
        background: linear-gradient(to right, #1e3c72, #2a5298, #6dd5ed);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .form-group button:hover {
        background: linear-gradient(to right, #6dd5ed, #2a5298, #1e3c72);
        transform: scale(1.02);
    }
    /* Responsive Design for Extra Small Devices (Phones, Less than 576px) */
    @media (max-width: 575px) {
        body {
            padding: 20px 10px;
        }

        .form-container {
            padding: 20px;
            margin: 20px auto;
        }

        .form-container h2 {
            font-size: 1.3em;
        }

        .form-group label {
            font-size: 1em;
        }

        .form-group input,
        .form-group button {
            font-size: .9em;
            padding: 10px;
        }
    }

    /* Responsive Design for Small Devices (Phones, Landscape, 576px and up) */
    @media (min-width: 576px) and (max-width: 767px) {
        body {
            padding: 20px 20px;
        }

        .form-container {
            padding: 20px;
            margin: 30px auto;
        }

        .form-container h2 {
            font-size: 1.5em;
        }
        .form-group label {
            font-size: 1.1em;
        }
        .form-group input,
        .form-group button {
            font-size: 1em;
            padding: 10px;
        }
    }

    /* Responsive Design for Medium Devices (Tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 991px) {
        body {
            padding: 20px 20px;
        }

        .form-container {
            padding: 20px;
            margin: 30px auto;
        }

        .form-container h2 {
            font-size: 1.8em;
        }
        .form-group label {
            font-size: 1.2em;
        }
        .form-group input,
        .form-group button {
            font-size: 1.1em;
            padding: 10px;
        }
    }

    /* Responsive Design for Large Devices (Desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1199px) {
        body {
            padding: 20px 20px;
        }

        .form-container {
            padding: 20px;
            margin: 30px auto;
        }

        .form-container h2 {
            font-size: 1.8em;
        }
        .form-group label {
            font-size: 1.1em;
        }
        .form-group input,
        .form-group button {
            font-size: 1em;
            padding: 10px;
        }
    }
    </style>
</head>

<body>
    <div class="form-container">
        <a href="admin-manageCourse.php" class="button">⬅️Back</a>
        <h2>Edit Course Details</h2>
        <form action="admin-edit-course-submit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="course_id">Course ID:(view Only)</label>
                <input type="text" id="course_id" name="Course_id" value="<?php echo $row['Course_id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <input type="text" id="course_name" name="Course_Name" value="<?php echo $row['Course_Name']; ?>">
            </div>
            <div class="form-group">
                <label for="fees">Fees:</label>
                <input type="text" id="fees" name="Fees" value="<?php echo $row['Fees']; ?>">
            </div>
            <div class="form-group">
                <label for="duration">Duration:</label>
                <input type="text" id="duration" name="Duration" value="<?php echo $row['Duration']; ?>">
            </div>
            <div class="form-group">
                <label for="current_syllabus">Current Syllabus:</label>
                <a href="../uploads/<?php echo $row['Syllabus']; ?>" target="_blank">View Current Syllabus</a>
            </div>
            <div class="form-group">
                <label for="syllabus">Upload New Syllabus:</label>
                <input type="file" id="syllabus" name="Syllabus" accept=".pdf,.doc,.docx,.txt">
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="Start_date" value="<?php echo $row['Start_date']; ?>">
            </div>
            <div class="form-group">
                <label for="teacher_name">Teacher Name:</label>
                <input type="text" id="teacher_name" name="teacher_name" value="<?php echo $row['teacher_name']; ?>">
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>


</html>