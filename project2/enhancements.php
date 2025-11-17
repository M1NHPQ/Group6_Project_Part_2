<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
    <?php
        include 'nav_header.inc';
    ?> 
    <main>
    <main class='enhancement_page_main'>
        <h1>Enhancements</h1>
        <h2>EOIs display (manage.php)</h2>
        <ul>
            <li>There are 5 fields (ways to display EOIs) as per requirement</li>
            <li>Each field has a form with which the manager/admin can select via checkboxes</li>
            <li>Each form will send "action" name with value depending on which forms are used</li>
            <li>The value will be sent to php upon submitting, php will then display the table via function show_table()</li>
            <li>the function will use the value to choose which method to display data from "eoi" table</li>
        </ul>
        <h2>Before accessing manage.php (admin_login.php)</h2>
        <ul>
            <li>(in manage.php) If there's no configured admins (no session username), the page will redirect to admin_login.php</li>
            <li>(in admin_login.php) There is a form with 2 inputs required: username and password</li>
            <li>To access manage.php, username and password need to be correct (refer to "admin_list" table)</li>
        </ul>
    </main>
    </main>
    <?php
        include 'footer.inc';
    ?> 
</body>
</html>