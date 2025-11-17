<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cloud Engineer and Cybersecurity - Job Descriptions</title>
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
    <?php
        include 'nav_header.inc';
    ?> 

    <main class="jobs_mainbody">

    <?php
        require_once "settings.php";
        $query = "SELECT * FROM jobs";

        $result = mysqli_query($conn, $query);
        echo "<h1>Job Description</h1>";
        if (mysqli_num_rows($result) > 0){                 //if the table returns rows
        echo "<table class='jobs_page_table'>";       //headers of table
        echo "<thead>";
        echo "<tr>";
        echo "<th>Position</th>";
        echo "<th>Job Ref Num</th>";
        echo "<th>Salary Range</th>";
        echo "<th>Brief Description</th>";
        echo "<th>Responsibilities</th>";
        echo "<th>Qualifications</th>";
        echo "<th>Preferable</th>";
        echo "<th>Tasks</th>";
        echo "<th>Report Target</th>";
        echo "</tr>";
        echo "</thead>";

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['position'] . "</td>";
          echo "<td>" . $row['reference_num'] . "</td>";
          echo "<td>" . $row['Salary_range'] . "</td>";
          echo "<td>" . $row['Brief_Description'] . "</td>";
          echo "<td>" . $row['Responsibilities'] . "</td>";
          echo "<td>" . $row['Qualifications'] . "</td>";
          echo "<td>" . $row['Preferable'] . "</td>";
          echo "<td>" . $row['Tasks'] . "</td>";
          echo "<td>" . $row['Report_Target'] . "</td>";
          echo "</tr>";
        }
          echo "</table>";
        } else{
          echo "<p>no EOIs could be found.</p>";
        };
    ?> 
    </main>
    <?php
        include 'footer.inc';
    ?> 
</body>
</html>