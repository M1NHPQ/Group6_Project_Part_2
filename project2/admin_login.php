    <?php
        session_start();
    ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Login</title>
    <link rel="stylesheet" href="./styles/styles.css">

</head>
<body>
    <?php
        include 'nav_header.inc';
    ?> 
    <main class='admin_login_page_main'>
        <h1>Access to Management</h1>
        <form method="POST" action="admin_login.php">
            <div>
                <label>Username:</label>
                <input type="text" name="username">
            </div>
            <div>
                <label>Password:</label>
                <input type="text" name="password">
            </div>
            <div>
                <input type="submit" value="Login">
            </div>

        </form>

        <?php              //admin has to login before accessing manage.php   (refer to admin_list)
            require_once "settings.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);

        
                $query = "SELECT * FROM admin_list WHERE username = '$username' AND admin_pass = '$password'";
                $result = mysqli_query($conn, $query);
                $user = mysqli_fetch_assoc($result);

                if ($user) {
                    $_SESSION['username'] = $user['username'];      
                    header("Location: manage.php");
                exit();
                } else {
                    echo "Incorrect username or password.";
                }
            };

            mysqli_close($conn);
        ?>
    </main>
    <?php
        include 'footer.inc';
    ?> 
</body>
</html>
