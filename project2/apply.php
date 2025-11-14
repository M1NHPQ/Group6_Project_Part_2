<?php


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
    <link rel="stylesheet" href="/styles/styles.css">
</head>
<body>
    <?php
        include 'nav_header.inc';
    ?> 

    <main>
    <form action="process_eoi.php" class="apply_form" method="POST">
        <h1>Application Form</h1>
        <fieldset class="parent_field">
            <fieldset class="field_1">
                <label for="Ref_Num">Job reference number</label>
                <select name="Ref_Num" id="Ref_Num" required>
                    <option value="">Select</option>
                    <option value="Ref_ID_01">A0001</option>
                    <option value="Ref_ID_02">A0002</option>
                </select>
                <br>
                <label for="First_Name">First Name:</label>
                <input type="text" name="First_Name" id="First_Name" placeholder="Max: 20 Alphabetical Characters" pattern="[A-Za-z]{1,20}" title="Inappropriate input" required>
                <br>
                <label for="Last_Name">Last Name:</label>
                <input type="text" name="Last_Name" id="Last_Name" placeholder="Max: 20 Alphabetical Characters" pattern="[A-Za-z]{1,20}" title="Inappropriate input" required>
                <br>
                <label for="Birth_Date">Date of Birth:</label>
                <input type="text" name="Birth_Date" id="Birth_Date" pattern="^([01][0-9]|2[0-3]):[0-5][0-9]$" title="Inappropriate input"  placeholder="dd/mm/yyyy" required>
            </fieldset>
            <fieldset class="field_2">
                <legend>Gender</legend>
                <div>
                    <input type="radio" name="Gender" id="Male" checked>
                    <label for="Male">Male</label>
                </div>
                <div>
                    <input type="radio" name="Gender" id="Female">
                    <label for="Female">Female</label>
                </div>
                <div>
                    <input type="radio" name="Gender" id="Others">
                    <label for="Others">Others</label>
                </div>
                <div>
                    <input type="radio" name="Gender" id="Prefer_not_say">
                    <label for="Prefer_not_say">Prefer not say</label>
                </div>
            </fieldset>
            <fieldset class="field_3">
                <label for="Street_Address">Street Address:</label>
                <input type="text" name="Street_Address" id="Street_Address" maxlength="40" placeholder="Max: 40 Characters" title="Inappropriate input" required>
                <br>
                <label for="Suburb-Town">Suburb/Town:</label>
                <input type="text" name="Suburb_or_Town" id="Suburb-Town" maxlength="40" placeholder="Max: 40 Characters" title="Inappropriate input" required>
                <br>
                <div id="States_and_Code">
                    <div>
                        <label for="State">State:</label>
                        <select name="State" id="State" required>
                            <option value="">Select</option>
                            <option value="VIC">VIC</option>
                            <option value="NCW">NCW</option>
                            <option value="QLD">QLD</option>
                            <option value="NT">NT</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                        </select>
                    </div>
                    <div>
                        <label for="Postcode">Postcode</label>
                        <input type="text" name="Postcode" id="Postcode" pattern="\d{4}" placeholder="4 digits" title="Inappropriate input" required>
                    </div>
                </div>
            </fieldset>
            <fieldset class="field_4">
                <label for="Email">Email Address</label>
                <input type="text" name="Email" id="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}" placeholder="example.com" title="Inappropriate input" required>
                <label for="Phone_Number">Phone Number</label>
                <input type="text" name="Phone Number" id="Phone_Number" pattern="[0-9 ]{8,12}" placeholder="8 - 12 digits or spaces" title="Inappropriate input" required>
                <fieldset class="field_4s_child_check">
                    <legend>Technical List</legend>
                    <div>
                        <input type="checkbox" name="HTML" id="HTML">
                        <label for="HTML">HTML</label>
                    </div>
                    <div>
                        <input type="checkbox" name="CSS" id="CSS">
                        <label for="CSS">CSS</label>
                    </div>
                    <div>
                        <input type="checkbox" name="JavaScript" id="JavaScript">
                        <label for="JavaScript">JavaScript</label>
                    </div>
                    <div>
                        <input type="checkbox" name="PHP" id="PHP">
                        <label for="PHP">PHP</label>
                    </div>
                    <div>
                        <input type="checkbox" name="C#" id="C#">
                        <label for="C#">C#</label>
                    </div>

                </fieldset>
            </fieldset>
            <div class="other_skills">
                <label for="Other_skills">Other Skills:</label>
                <br>
                <textarea name="Other_skills" id="Other_skills" placeholder="Fill in your other skills here..."></textarea>
            </div>

        </fieldset>
        <div class="final">
            <input type="submit" value="Apply" class="final_child">
            <input type="reset" value="Reset form" class="final_child">
        </div>
    </form>
    </main>
    <?php
        include 'footer.inc';
    ?> 
</body>
</html>