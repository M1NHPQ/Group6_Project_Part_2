<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
    <?php
        include 'nav_header.inc';
    ?> 

    <main class="about_mainbody">
        <h1 class="about_title">Information</h1>
        <ul>              <!-- Apparently you can't have div as a direct child of ul -->
            <li class="name_and_time">
                <h3>Group Name / Class Time and Day</h3>    
                <ul>
                    <li>Group Name: Group 6</li>
                    <li>Class Time and Day: 9:00 - 12:00 AM every Friday</li>
                </ul>
            </li>
            <li class="studentID">
                <h3>Student IDs</h3>
                <ul>
                    <li>Pham Quang Minh: SWH02964</li>
                    <li>Le Trinh Hai Nam: SWH03481</li>
                </ul>
            </li>
        </ul>
            <div class="Tutor_Name">
                <h3>Tutor's Name:</h3>
                <ul>
                    <li>Tutor 1:I forgor🥀</li>
                    <li>Tutor 2: Mr. Thomas</li>
                </ul>
            </div>

            <div class="Contribution_list">
                <h3>Members' Contribution</h3>
                <dl>
                    <dt>Name: Pham Quang Minh</dt>
                    <dd>about.html, apply.html, css</dd>
                    <dt>Name: Le Trinh Hai Nam</dt>
                    <dd>jobs.html, index.html</dd>
                </dl>
            </div>

            <div class="photo_section">
                <h3>Group Photo</h3>
                <figure class="group_photo">
                    <img src="./images/Maxwell.jpg" alt="">
                    <figcaption>Due to unavoidable circumstances we have none</figcaption>
                </figure>
            </div>

            <div class="Interests">
                <h3>Members' Interests</h3>
                <table class="interest_table">
                    <caption>Interests</caption>
                    <tr>
                        <th>Name</th>
                        <th>Interests</th>
                    </tr>
                    <tr>
                        <td>Pham Quang Minh</td>
                        <td>Sleeping, Games (Rhythm, Metroidvania), Music (Mainly Jpop)</td>
                    </tr>
                    <tr>
                        <td>Le Trinh Hai Nam</td>
                        <td>Games, Music</td>
                    </tr>
                </table>
            </div>

    </main>
    <?php
        include 'footer.inc';
    ?> 
</body>
</html>