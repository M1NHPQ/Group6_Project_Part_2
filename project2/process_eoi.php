<?php

// direct access is forbidden
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("Access Denied. Return to apply.php.");
}

require_once "settings.php";

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// if table doesn’t exist
$eoi_sql = "
CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    job_reference_number VARCHAR(10),
    first_name VARCHAR(20),
    last_name VARCHAR(20),
    street_address VARCHAR(40),
    suburb_town VARCHAR(40),
    state VARCHAR(3),
    postcode CHAR(4),
    email VARCHAR(100),
    phone VARCHAR(20),
    skill1 VARCHAR(50),
    skill2 VARCHAR(50),
    skill3 VARCHAR(50),
    skill4 VARCHAR(50),
    skill5 VARCHAR(50),
    other_skills TEXT,
    status ENUM('New','Current','Final') DEFAULT 'New'
)";
mysqli_query($conn, $eoi_sql);

//if table exists

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data safely
    $ref_num = mysqli_real_escape_string($conn, $_POST['Ref_Num']);
    $first_name = mysqli_real_escape_string($conn, $_POST['First_Name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['Last_Name']);
    $street = mysqli_real_escape_string($conn, $_POST['Street_Address']);
    $suburb = mysqli_real_escape_string($conn, $_POST['Suburb_or_Town']);
    $state = mysqli_real_escape_string($conn, $_POST['State']);
    $postcode = mysqli_real_escape_string($conn, $_POST['Postcode']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $phone = mysqli_real_escape_string($conn, $_POST['Phone_Number']);
    $other_skills = mysqli_real_escape_string($conn, $_POST['Other_skills']);

    // checkboxes thing from form     true : false
    $skill1 = isset($_POST['HTML']) ? 'HTML' : '';
    $skill2 = isset($_POST['CSS']) ? 'CSS' : '';
    $skill3 = isset($_POST['JavaScript']) ? 'JavaScript' : '';
    $skill4 = isset($_POST['PHP']) ? 'PHP' : '';
    $skill5 = isset($_POST['C#']) ? 'C#' : '';

    // Insert into database
    $insert_sql = "
        INSERT INTO eoi 
        (job_reference_number, first_name, last_name, street_address, suburb_town, state, postcode, email, phone, skill1, skill2, skill3, skill4, skill5, other_skills)
        VALUES
        ('$ref_num', '$first_name', '$last_name', '$street', '$suburb', '$state', '$postcode', '$email', '$phone', '$skill1', '$skill2', '$skill3', '$skill4', '$skill5', '$other_skills')
    ";

    if (mysqli_query($conn, $insert_sql)) {
        // Get the auto-generated EOInumber
        $eoi_number = mysqli_insert_id($conn);
        echo "<h2>Thank you, $first_name.</h2>";
        echo "<p>Your Expression of Interest has been submitted successfully.</p>";
        echo "<p><strong>Your EOI Number:</strong> $eoi_number</p>";
    } else {
        echo " Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>