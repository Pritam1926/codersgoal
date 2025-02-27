<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Project-WEB\PHPMailer-master\src/Exception.php';
require 'C:\xampp\htdocs\Project-WEB\PHPMailer-master\src/PHPMailer.php';
require 'C:\xampp\htdocs\Project-WEB\PHPMailer-master\src/SMTP.php';

include '../connection.php';

// Generate password
function generateSecurePassword($length = 8) {
    return bin2hex(random_bytes($length / 2));  // Generates random password of given length
}

// Fetch the form data
$std_name = $_POST['Std_Name'];
$father = $_POST['Father_name'];
$dob = $_POST['DOB'];
$gender = $_POST['Gender'];
$email = $_POST['Email'];
$phone = $_POST['Ph_no'];
$qualification = $_POST['Qualification'];
$pursuing = $_POST['Pursuing'];
$address = $_POST['Address'];
$course_name = $_POST['Course_name'];
$photo = $_FILES['Photo']['name'];
$sign = $_FILES['sign']['name'];
$marksheet = $_FILES['marksheet']['name'];
$join_date = date("Y-m-d");
$transaction_id = $_POST['transaction_details'];
$password = generateSecurePassword(10);
$attendance = 0;

// File upload path
$photo_target = "../uploads/" . basename($photo);
$sign_target = "../uploads/" . basename($sign);
$marksheet_target = "../uploads/" . basename($marksheet);

// Move uploaded files to target directory
move_uploaded_file($_FILES['Photo']['tmp_name'], $photo_target);
move_uploaded_file($_FILES['sign']['tmp_name'], $sign_target);
move_uploaded_file($_FILES['marksheet']['temp_name'], $marksheet_target);

$sql = "SELECT Fees from course_details where Course_Name='$course_name'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fees = $row['Fees'];
}

// Insert the data into the database
$sql = "INSERT INTO students_details (Std_Name, DOB, Gender, Email, Qualification, Pursuing, Address, Course_name, Fees, Photo, sign, marksheet, join_date, Attendance, Ph_no, Father_name, Password, transaction_details) 
        VALUES ('$std_name', '$dob', '$gender', '$email', '$qualification', '$pursuing', '$address', '$course_name', '$fees', '$photo', '$sign', '$marksheet', '$join_date', '$attendance', '$phone', '$father', '$password', '$transaction_id')";

if ($conn->query($sql) === TRUE) {
    $std_id = $conn->insert_id; // Use insert_id to get the last inserted ID

    // Insert payment record into payments table
    $sql1 = "INSERT INTO payments (Std_id, Std_name, amount, payment_date, transaction_details)
             VALUES ('$std_id', '$std_name', '$fees', '$join_date', '$transaction_id')";
    
    if ($conn->query($sql1) === TRUE) {
        // Send email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            // SMTP settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Set SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'codergoals054@gmail.com'; // Gmail username
            $mail->Password = 'okvb xeyx fmkx mrcg'; // Gmail password or App-specific password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Email setup
            $mail->setFrom('codergoals054@gmail.com', 'Coders Goal');
            $mail->addAddress($email, $std_name);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = "Admission Confirmation";
            $mail->Body = "<p>Dear <strong>$std_name</strong>,</p> 
            <p>Congratulations! Your admission to <strong>$course_name</strong> has been successfully completed.</p> 
            <p>Here are your login details for the student portal:</p> 
            <p>Student ID: $std_id<br> 
            Password: $password</p> 
            <p>You can access the portal to stay updated with your course schedule, materials, and more.</p> 
            <p>If you have any questions or need assistance, feel free to reach out to us.</p> 
            <p>Welcome aboard! We look forward to supporting your learning journey.</p> 
            <p>Best regards,<br> 
            Pritam Pandit<br> 
            Coder's Goals<br> 
            codergolas054@gmail.com</p>";

            $mail->send();
            echo "<script>alert('Admission successful! A confirmation email has been sent. You will be redirected to the home page.'); window.location.href = 'admin-manageStudent.php';</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
