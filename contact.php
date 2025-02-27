<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    /* Contact Section */
    .contact-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        padding: 20px;
    }

    .contact-details,
    .enquiry-form {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
    }

    .contact-details {
        width: 40%;
        margin-bottom: 20px;
        font-size: 1.2em;
    }

    .social-links {
        text-decoration: none;
        color: black;
    }

    .enquiry-form {
        width: 55%;
    }

    .contact-item {
        margin: 10px 0;
        display: flex;
        align-items: center;
    }

    .contact-item i {
        margin-right: 10px;
        color: black;
    }

    .form-group {
        margin-bottom: 15px;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border: 1px solid #007BFF;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    .form-group button {
        position: relative;
        left: 25%;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        background-color: #007BFF;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: bold;
        width: 50%;
    }

    .form-group button:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .form-group textarea {
        resize: none;
        /* Disable resizing */
    }

    .form-container {
        background-color: #f1f8ff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    /* Responsive Design for Extra Small Devices (Phones, Less than 576px) */
    @media (max-width: 575px) {
        .contact-container {
            flex-direction: column;
            align-items: center;
        }

        .contact-details,
        .enquiry-form {
            width: 100%;
            margin-bottom: 20px;
        }
        .contact-details h2,.enquiry-form h2{
            font-size: 1.2em;
        }
        .contact-item span{
            font-size: .8em;
        }
        .form-group button {
            width: 100%;
            left: 0;
        }
    }

    /* Responsive Design for Small Devices (Phones, Landscape, 576px and up) */
    @media (min-width: 575px) and (max-width: 767px) {
        .contact-container {
            flex-direction: column;
            align-items: center;
        }

        .contact-details,
        .enquiry-form {
            width: 100%;
            margin-bottom: 20px;
        }

        .form-group button {
            width: 100%;
            left: 0;
        }
    }

    /* Responsive Design for Medium Devices (Tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 991px) {
        .contact-container {
            flex-direction: row;
        }

        .contact-details {
            width: 45%;
        }

        .enquiry-form {
            width: 50%;
        }

        .form-group button {
            width: 50%;
            left: 25%;
        }
    }

    /* Responsive Design for Large Devices (Desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1199px) {
        .contact-container {
            flex-direction: row;
        }

        .contact-details {
            width: 45%;
        }

        .enquiry-form {
            width: 50%;
        }

        .form-group button {
            width: 50%;
            left: 25%;
        }
    }

    /* Responsive Design for Extra Large Devices (Large Desktops, 1200px and up) */
    @media (min-width: 1200px) {
        .contact-container {
            flex-direction: row;
        }

        .contact-details {
            width: 45%;
        }

        .enquiry-form {
            width: 50%;
        }

        .form-group button {
            width: 50%;
            left: 25%;
        }
    }
    </style>
    <title>Contact Us</title>
</head>

<body>
    <?php include 'header.php' ?>
    <main>
        <div class="contact-container">
            <!-- Contact Details Section -->
            <div class="contact-details">
                <h2>Contact Details</h2>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Karimpur, Nadia-741152, West Bengal</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <span>+91 7719332510</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>info@codersgoal.com</span>
                </div>
                <div class="contact-item">
                    <i class="fab fa-facebook-f"></i>
                    <span><a href="https://www.facebook.com/profile.php?id=61556110485652" target="_blank"
                            class="social-links">Facebook</a></span>
                </div>
                <div class="contact-item">
                    <i class="fab fa-youtube"></i>
                    <span><a href="https://www.youtube.com/@codergoals" target="_blank"
                            class="social-links">YouTube</a></span>
                </div>
                <div class="contact-item">
                    <i class="fab fa-instagram"></i>
                    <span><a href="https://www.instagram.com/codergoals_/" target="_blank"
                            class="social-links">Instagram</a></span>
                </div>
            </div>

            <!-- Enquiry Form Section -->
            <div class="enquiry-form">
                <h2>Enquiry Form</h2>
                <div class="form-container">
                    <form action="enquiry-submit.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="ph_no">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include 'footer.php' ?>
</body>

</html>