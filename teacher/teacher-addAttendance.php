<?php
include '../connection.php';

session_start();
$id = $_SESSION['teacher_id'];

$sql = "SELECT teacher_name FROM teachers WHERE teacher_id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $teacher_name = $row['teacher_name'];
}

// Fetch course details
$courses_sql = "SELECT Course_Name FROM course_details";
$courses_result = $conn->query($courses_sql);

// Fetch student details
$students_sql = "SELECT Std_id, Std_name, Course_name FROM students_details";
$students_result = $conn->query($students_sql);

$students = [];
if ($students_result->num_rows > 0) {
    while ($row = $students_result->fetch_assoc()) {
        $students[$row['Course_name']][] = [
            'id' => $row['Std_id'],
            'name' => $row['Std_name']
        ];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Attendance</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background: linear-gradient(to bottom right, #1e3c72, #2a5298, #6dd5ed, #ffffff);
        margin: 0;
        padding: 0;
    }

    /* Admission Container Styling */
    .attendance-container {
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

    .attendance-container h2 {
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

    .form-group input[type="text"],
    .form-group select {
        width: 100%;
        padding: 12px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-size: 16px;
    }

    .student-attendance {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .student-attendance label {
        width: 70%;
    }

    .student-attendance input[type="radio"] {
        margin-left: 10px;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #6dd5ed;
        box-shadow: 0 0 10px rgba(109, 213, 237, 0.5);
    }

    .form-group input[type="submit"] {
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

    .form-group input[type="submit"]:hover {
        background: linear-gradient(to right, #6dd5ed, #2a5298, #1e3c72);
        transform: scale(1.02);
    }

    /* Responsive Design for Extra Small Devices (Phones, Less than 576px) */
    @media (max-width: 575px) {
        body {
            padding: 20px 10px;
        }

        .attendance-container {
            padding: 20px;
            margin: 20px auto;
        }

        .attendance-container h2 {
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

        .attendance-container {
            padding: 20px;
            margin: 30px auto;
        }

        .attendance-container h2 {
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

        .attendance-container {
            padding: 20px;
            margin: 30px auto;
        }

        .attendance-container h2 {
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

        .attendance-container {
            padding: 20px;
            margin: 30px auto;
        }

        .attendance-container h2 {
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
    </style>
    <script>
    const students = <?php echo json_encode($students); ?>;

    function updateStudentDetails() {
        const courseName = document.getElementById('course_name').value;
        const studentList = students[courseName] || [];

        const studentContainer = document.getElementById('student_list');
        studentContainer.innerHTML = '';

        studentList.forEach(student => {
            const div = document.createElement('div');
            div.className = 'student-attendance';

            const label = document.createElement('label');
            label.textContent = `${student.name} (${student.id})`;

            const presentRadio = document.createElement('input');
            presentRadio.type = 'radio';
            presentRadio.name = `attendance_${student.id}`;
            presentRadio.value = 'Present';

            const absentRadio = document.createElement('input');
            absentRadio.type = 'radio';
            absentRadio.name = `attendance_${student.id}`;
            absentRadio.value = 'Absent';

            div.appendChild(label);
            div.appendChild(presentRadio);
            div.appendChild(document.createTextNode(' Present'));
            div.appendChild(absentRadio);
            div.appendChild(document.createTextNode(' Absent'));

            studentContainer.appendChild(div);
        });
    }
    </script>
</head>

<body>
    <div class="attendance-container">
        <a href="teacher-manageAttendance.php" class="button">⬅️Back</a>
        <h2>Add Attendance</h2>
        <form action="teacher-addAttendance-submit.php" method="post">
            <div class="form-group">
                <label for="teacher_id">Teacher ID:</label>
                <input type="text" id="teacher_id" name="teacher_id" value="<?php echo $id; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="teacher_name">Teacher Name:</label>
                <input type="text" id="teacher_name" name="teacher_name" value="<?php echo $teacher_name; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <select id="course_name" name="Course_name" required onchange="updateStudentDetails()">
                    <option value="" disabled selected>Select course</option>
                    <?php
                    if ($courses_result->num_rows > 0) {
                        while ($row = $courses_result->fetch_assoc()) {
                            echo "<option value='" . $row['Course_Name'] . "'>" . $row['Course_Name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div id="student_list"></div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>