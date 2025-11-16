<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage (for admin)</title>
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
    <?php
        include 'nav_header.inc';
    ?>

    <h1>Management Page</h1>

    <main class="manage_mainbody">      <!--Note: post will send a hidden value with name "action" prompting table types through each 'value'-->
        <h2>Form Toggle:</h2>
        <div>    <!--List ALL EOIs-->
            <input type="checkbox" name="visi" id="visi_form1">       <!-- checkbox to toggle visible/invisible forms -->
            <label for="visi_form1">Display All EOIs</label>

            <form method="POST" action="manage.php" class="eoi_form_1">
            <input type="hidden" name="action" value="list_all">
            <button type="submit">List All EOIs</button>
        </form>
        </div>

        <div>    <!--EOIs by Job Ref Num-->
            <input type="checkbox" name="visi" id="visi_form2">
            <label for="visi_form2">Display All EOIs via Job Reference Number</label>

            <form method="POST" action="manage.php" class="eoi_form_2">
                <input type="hidden" name="action" value="list_by_jobref">
                <label>Job Reference Number:</label>
                <input type="text" name="refnum" required>
                <button type="submit">Search</button>
            </form>
        </div>

        <div>    <!--EOIs by name -->
            <input type="checkbox" name="visi" id="visi_form3">
            <label for="visi_form3">Display EOIs via Name</label>

            <form method="POST" action="manage.php" class="eoi_form_3">
                <input type="hidden" name="action" value="list_by_name">
                <label>First Name:</label>
                <input type="text" name="firstname">
                <label>Last Name:</label>
                <input type="text" name="lastname">
                <button type="submit">Search</button>
            </form>
        </div>

        <div>    <!--Delete EOIs with Job Ref Num -->
            <input type="checkbox" name="visi" id="visi_form4">
            <label for="visi_form4">Delete All EOIs with Specific Job Reference Number</label>

            <form method="POST" action="manage.php" class="eoi_form_4">
                <input type="hidden" name="action" value="delete_by_ref">
                <label>Job Reference Number:</label>
                <input type="text" name="refnum" required>
                <button type="submit">Delete All</button>
            </form>
        </div>

        <div>    <!--Update Status of EOIs-->
            <input type="checkbox" name="visi" id="visi_form5">
            <label for="visi_form5">EOIs Status Change</label>

            <form method="POST" action="manage.php" class="eoi_form_5">
                <input type="hidden" name="action" value="update_status">
                <label>EOI Number:</label>
                <input type="text" name="eoi_num" required>
                <label>New Status:</label>
                <select name="status" required>
                    <option value="New">New</option>
                    <option value="Current">Current</option>
                    <option value="Final">Final</option>
                </select>
                <button type="submit">Update</button>
            </form>
        </div>
    </main>



























</body>
</html>

<?php
    require_once 'settings.php';
    $query = "SELECT * FROM eoi";

    $result = mysqli_query($conn, $query);

    function show_table($result){                    //function shows table with corresponding 'value'
        if (mysqli_num_rows($result) > 0){                 //if the table returns rows
        echo "<table style='text-align: center; border: black solid 1px'>";       //headers of table
        echo "<thead>";
        echo "<tr>";
        echo "<th>EOI Num</th>";
        echo "<th>Job Ref Num</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Street Addresss</th>";
        echo "<th>Suburb/Town</th>";
        echo "<th>State</th>";
        echo "<th>Postcode</th>";
        echo "<th>Email</th>";
        echo "<th>Phone Num</th>";
        echo "<th>Skills</th>";
        echo "<th>Other Skills</th>";
        echo "<th>Status</th>";
        echo "</tr>";
        echo "</thead>";
        while ($row = mysqli_fetch_assoc($result)) {
        $skills = array_filter([             //array_filter remove empty/null values
            $row['skill1'],
            $row['skill2'],
            $row['skill3'],
            $row['skill4'],
            $row['skill5']
        ]);
        $skills_str = implode(", ", $skills);    //group all checkbox skills into one

        echo "<tr>";
        echo "<td>" . $row['EOInumber'] . "</td>";
        echo "<td>" . $row['job_reference_number'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['street_address'] . "</td>";
        echo "<td>" . $row['suburb_town'] . "</td>";
        echo "<td>" . $row['state'] . "</td>";
        echo "<td>" . $row['postcode'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $skills_str . "</td>";
        echo "<td>" . $row['other_skills'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "</tr>";
    };
    } else{
        echo "<p>no EOIs could be found.</p>";
    };
    }

    if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // 1. List all EOIs
    if ($action == "list_all") {
        $sql = "SELECT * FROM eoi";
        $result = mysqli_query($conn, $sql);
        show_table($result);
    }

    // 2. List EOIs by Ref Num
    if ($action == "list_by_jobref") {
        $ref = mysqli_real_escape_string($conn, $_POST['refnum']);
        $sql = "SELECT * FROM eoi WHERE job_reference_number = '$ref'";
        $result = mysqli_query($conn, $sql);
        show_table($result);
    }

    // 3. List EOIs by name
    if ($action == "list_by_name") {
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname  = mysqli_real_escape_string($conn, $_POST['lastname']);

        $sql = "SELECT * FROM eoi WHERE 1";

        if ($firstname != "") $sql .= " AND first_name LIKE '%$firstname%'";
        if ($lastname != "")  $sql .= " AND last_name LIKE '%$lastname%'";

        $result = mysqli_query($conn, $sql);
        show_table($result);
    }

    // 4. Delete by Ref Num
    if ($action == "delete_by_ref") {
        $ref = mysqli_real_escape_string($conn, $_POST['refnum']);
        $sql = "DELETE FROM eoi WHERE job_reference_number = '$ref'";
        mysqli_query($conn, $sql);
        echo "<p>All EOIs with Job Reference <strong>$ref</strong> deleted.</p>";
    }

    // 5. Update Status
    if ($action == "update_status") {
        $eoi = mysqli_real_escape_string($conn, $_POST['eoi_num']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $sql = "UPDATE eoi SET Status='$status' WHERE EOInumber=$eoi";

        mysqli_query($conn, $sql);
        echo "<p>Status updated for EOI #<strong>$eoi</strong> to <strong>$status</strong></p>";
    }
    }

    mysqli_close($conn);
?> 

<?php
    include 'footer.inc';
?>