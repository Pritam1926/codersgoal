<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Admission Section */
    .admission-section {
        position: relative;
        width: 100%;
        height: auto;
        background-image: url('https://cdn.pixabay.com/photo/2022/08/30/20/47/institute-7421918_1280.jpg');
        /* Add your selected image */
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: left;
        padding: 20px 10px;
    }

    .admission-box {
        background: rgba(0, 0, 0, .5);
        padding: 30px;
        max-width: 50%;
        border-radius: 10px;
        box-shadow: 2px 4px 6px rgba(0, 0, 0, 6.1);
        color: white;
    }

    .admission-box h1 {
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    .admission-box p {
        margin-bottom: 1.2em;
        line-height: 1.5;
    }

    .admission-box a {
        text-decoration: none;
    }

    .apply-btn {
        background-color: #2980b9;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        display: block;
        width: 200px;
        text-align: center;
        font-size: 18px;
    }

    .apply-btn:hover {
        background-color: #0056b3;
    }

    /* Second Section */
    .second-section {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        padding: 30px;
    }

    /* Left Part */
    .capsule-container {
        width: 70%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .capsule {
        background-color: #b8d1eb;
        width: 48%;
        padding: 20px;
        margin-bottom: 10px;
        border-radius: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
    }

    .capsule h3 {
        margin-bottom: 10px;
        font-size: 22px;
    }

    .capsule ul {
        list-style-type: square;
        margin-left: 20px;
    }

    .capsule ul li {
        line-height: 1.5;
    }

    /* Right Part */
    .important-dates {
        flex-basis: 28%;
        background-color: #b8d1eb;
        padding: 20px;
        margin-bottom: 10px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
    }

    .important-dates h3 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .important-dates ul {
        list-style-type: none;
        padding-left: 0;
    }

    .important-dates ul li {
        background-color: #72acea;
        color: white;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    /* FAQ and Fees Section */
    #faq-and-fees {
        padding: 40px;
    }

    .faq-and-fees-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .faq-section h2{
        margin-bottom: 10px;
    }
    .faq-section {
        width: 70%;
        padding: 20px;
        /* Adjust spacing as needed */
    }

    .faq-item {
        margin-bottom: 20px;
        /* Spacing between FAQ items */
    }

    .faq-item h3 {
        font-weight: bold;
        margin: 10px 0;
    }

    .fees-section {
        width: 30%;
        max-height: fit-content;
        padding-left: 20px;
        background-color: #b8d1eb;
        box-shadow: 2px 4px 6px rgba(0, 0, 0, .5);
        border-radius: 10px;
        padding: 20px;
    }

    .fees-section h2 {
        margin-bottom: 15px;
    }

    .fees-section ul {
        list-style-type: none;
        /* Remove bullet points */
        padding: 0;
        /* Remove padding */
    }

    .fees-section li {
        margin-bottom: 10px;
        /* Spacing between list items */
    }

    /* Responsive Design for Extra Small Devices (Phones, Less than 576px) */
    @media (max-width: 575px) {
        .admission-box {
            max-width: 100%;
            padding: 20px;
        }

        .admission-box h1 {
            font-size: 1.5em;
        }

        .admission-box p {
            font-size: 1em;
        }

        .apply-btn {
            width: 100%;
            font-size: 1em;
        }

        .second-section {
            flex-direction: column;
            align-items: center;
            padding: 15px;
        }

        .capsule-container {
            width: 100%;
            flex-direction: column;
        }

        .capsule {
            width: 100%;
        }

        .capsule h3 {
            font-size: 1.2em;
        }

        .capsul ul li {
            font-size: 1em;
        }

        .important-dates {
            width: 100%;
            margin-top: 20px;
        }

        .important-dates h3 {
            font-size: 1.2em;
        }

        #faq-and-fees {
            padding: 15px;
        }

        .faq-and-fees-container {
            display: flex;
            justify-content: space-between;
            flex-direction: column-reverse;
        }

        .faq-section {
            width: 100%;
            padding: 0;
            margin-top: 10px;
        }

        .faq-section h2 {
            font-size: 1.2em;
        }

        .faq-section h3 {
            font-size: 1em;
        }

        .faq-section p {
            font-size: .9em;
        }

        .fees-section {
            width: 100%;
            margin-top: 20px;
        }
    }

    /* Responsive Design for Small Devices (Phones, Landscape, 576px and up) */
    @media (min-width: 576px) and (max-width: 767px) {
        .admission-box {
            max-width: 100%;
            padding: 25px;
        }

        .admission-box h1 {
            font-size: 1.8em;
        }

        .admission-box p {
            font-size: 1.1em;
        }

        .apply-btn {
            width: 80%;
            margin: auto;
            font-size: 1.1em;
        }

        .second-section {
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .capsule-container {
            width: 100%;
            flex-direction: column;
        }

        .capsule {
            width: 100%;
        }

        .important-dates {
            width: 100%;
            margin-top: 20px;
        }

        #faq-and-fees {
            padding: 20px;
        }

        .faq-and-fees-container {
            display: flex;
            justify-content: space-between;
            flex-direction: column-reverse;
        }

        .faq-section {
            width: 100%;
            padding: 0;
            margin-top: 10px;
        }

        .fees-section {
            width: 100%;
            margin-top: 20px;
        }
    }

    /* Responsive Design for Medium Devices (Tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 991px) {
        .admission-box {
            max-width: 80%;
        }

        .admission-box h1 {
            font-size: 2em;
        }

        .admission-box p {
            font-size: 1.2em;
        }

        .apply-btn {
            width: 80%;
            margin: auto;
            font-size: 1.2em;
        }

        .second-section {
            flex-direction: column;
            align-items: center;
        }

        .capsule-container {
            width: 100%;
        }

        .capsule {
            width: 48%;
        }

        .important-dates {
            width: 90%;
            margin-top: 20px;
        }

        .faq-section {
            width: 100%;
        }

        #faq-and-fees {
            padding: 20px;
        }

        .faq-and-fees-container {
            display: flex;
            justify-content: space-between;
            flex-direction: column-reverse;
        }
        .fees-section {
            width: 100%;
            margin-top: 20px;
        }
    }

    /* Responsive Design for Large Devices (Desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1199px) {
        .admission-box {
            max-width: 70%;
        }

        .admission-box h1 {
            font-size: 2.2em;
        }

        .admission-box p {
            font-size: 1.3em;
        }

        .apply-btn {
            width: 80%;
            margin: auto;
            font-size: 1.3em;
        }

        .capsule-container {
            width: 70%;
        }

        .capsule {
            width: 48%;
        }

        .important-dates {
            flex-basis: 28%;
        }

        .faq-section {
            width: 70%;
        }

        .fees-section {
            width: 30%;
        }
    }

    /* Responsive Design for Extra Large Devices (Large Desktops, 1200px and up) */
    @media (min-width: 1200px) {
        .admission-box {
            max-width: 50%;
        }

        .admission-box h1 {
            font-size: 2.5em;
        }

        .admission-box p {
            font-size: 1.3em;
        }

        .apply-btn {
            width: 200px;
            font-size: 1.2em;
        }

        .capsule-container {
            width: 70%;
        }

        .capsule {
            width: 48%;
        }

        .important-dates {
            flex-basis: 28%;
        }

        .faq-section {
            width: 70%;
        }

        .fees-section {
            width: 30%;
        }
    }
    </style>
    <title>Admission</title>
</head>

<body>
    <?php include 'header.php' ?>
    <main>
        <section class="admission-section">
            <div class="admission-box">
                <h1>Welcome to Coder's Goal</h1>
                <p>Join us to enhance your coding skills and become part of a community of passionate learners. Our
                    programs
                    are designed for your success.</p>
                <a href="/student/student-detail-entry.php"><button class="apply-btn">Apply Now</button></a>
            </div>
        </section>


        <section class="second-section">
            <!-- Left part with capsules -->
            <div class="capsule-container">
                <div class="capsule">
                    <h3>Admission Process</h3>
                    <ul>
                        <li>Click "Apply Now".</li>
                        <li>Fill the admission form.</li>
                        <li>Pay the course fees first.</li>
                        <li>Get a mail.</li>
                    </ul>
                </div>
                <div class="capsule">
                    <h3>Eligibility Criteria</h3>
                    <ul>
                        <li>Candidates must have completed their secondary education (10) or equivalent.</li>
                        <li>A minimum of 50% marks (or equivalent grade) in the qualifying examination is required.</li>
                        <li>Candidates should be above 16 years as of the date of application.</li>
                        <li>Minimum knowledge in computer.</li>
                    </ul>
                </div>
                <div class="capsule">
                    <h3>Required Documents</h3>
                    <ul>
                        <li>Pasport size photo</li>
                        <li>Student's Signature</li>
                        <li>Mark sheets and certificates from previous educational qualifications (e.g., 10th and 12th
                            grade).</li>
                        <li>Payment recipt</li>
                    </ul>
                </div>
                <div class="capsule">
                    <h3>Why Choose Us</h3>
                    <ul>
                        <li>Expert Faculty.</li>
                        <li>Comprehensive Curriculum.</li>
                        <li>Modern Infrastructure.</li>
                        <li>24/7 Online Support.</li>
                        <li>Extracurricular Activities.</li>
                        <li>Positive Learning Environment.</li>
                        <li>Alumni Network.</li>
                        <li>Flexible Learning Options.</li>
                    </ul>
                </div>
            </div>

            <!-- Right part with Important Dates -->
            <div class="important-dates">
                <h3>Important Dates</h3>
                <ul>
                    <li>Date 1: Event 1</li>
                    <li>Date 2: Event 2</li>
                    <li>Date 3: Event 3</li>
                </ul>
            </div>
        </section>
        <hr style="height: 3px; background-color:#2980b9; border: none;">
        <section id="faq-and-fees">

            <div class="faq-and-fees-container">
                <div class="faq-section">
                    <h2>Frequently Asked Questions (FAQ)</h2>
                    <div class="faq-item">
                        <h3>What is the application fee?</h3>
                        <p>The application fee is $50, which is non-refundable.</p>
                    </div>
                    <div class="faq-item">
                        <h3>Can I apply for multiple courses?</h3>
                        <p>Yes, you can apply for multiple courses. However, a separate application fee is required for
                            each course.</p>
                    </div>
                    <div class="faq-item">
                        <h3>What if I face issues during form submission?</h3>
                        <p>If you encounter any issues, please contact our support team for assistance.</p>
                    </div>
                    <div class="faq-item">
                        <h3>Is there a reservation system in place?</h3>
                        <p>Yes, we have a reservation system that provides quotas for certain categories.</p>
                    </div>
                    <div class="faq-item">
                        <h3>When will the classes start after admission?</h3>
                        <p>Classes will commence two weeks after the admission process is completed.</p>
                    </div>
                </div>

                <div class="fees-section">
                    <h2>Other Details</h2>
                    <ul>
                        <li>Application Fee: $50</li>
                        <li>Tuition Fee (per semester): $500</li>
                        <li>Laboratory Fee: $100</li>
                        <li>Library Fee: $50</li>
                        <li>Additional Fees: Variable based on courses</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
    <?php include 'footer.php' ?>
</body>

</html>