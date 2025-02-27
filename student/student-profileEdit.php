<?php
include '../connection.php';

session_start();
$Std_id = $_SESSION['Std_id'];

$sql = "SELECT * FROM students_details WHERE Std_id = '$Std_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Students Details</title>
    <style>
    /* Basic styling for the layout */
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

    .form-group input {
        width: 100%;
        padding: 12px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-size: 16px;
    }

    .form-group input[type="file"] {
        padding: 6px;
        background-color: white;
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
        <a href="student-profile.php" class="button">⬅️Back</a>
        <h2>Edit Student Details</h2>
        <form action="student-profileEdit-submit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="std_id">Student ID:(View Only)</label>
                <input type="text" id="std_id" name="Std_id" value="<?php echo $row['Std_id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="photo">Current Photo:</label>
                <img src="../uploads/<?php echo $row['Photo']; ?>" alt="Student Photo" width="60" height="60">
            </div>
            <div class="form-group">
                <label for="photo">Upload New Photo:</label>
                <input type="file" id="photo" name="Photo" accept="image/*">
            </div>
            <div class="form-group">
                <label for="sign">Current Signature:</label>
                <img src="../uploads/<?php echo $row['sign']; ?>" alt="Student Signature" width="150" height="50">
            </div>
            <div class="form-group">
                <label for="sign">Upload New Signature:</label>
                <input type="file" id="sign" name="sign" accept="image/*">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="Password" value="<?php echo $row['Password']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="Email" value="<?php echo $row['Email']; ?>">
            </div>
            <div class="form-group">
                <label for="ph_no">Phone Number:</label>
                <input type="text" id="ph_no" name="Ph_no" value="<?php echo $row['Ph_no']; ?>">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="Address" value="<?php echo $row['Address']; ?>">
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>