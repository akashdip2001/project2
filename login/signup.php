<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="https://raw.githubusercontent.com/akashdip2001/website-2/main/images/favicon.jpg?token=GHSAT0AAAAAACMGYPVOP4ZUPUDP4Q2FKSEWZNNHMWA">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.5); /* Adjust the opacity as needed */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="tel"] {
            width: calc(100% - 22px); /* Adjusted width for better alignment */
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            display: inline-block; /* Ensure inline display */
            background-color: rgba(255, 255, 255, 0.6); /* Adjust the opacity as needed */
            border: none;
            outline: none;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
        }

        input[type="submit"] {
            width: 100%; /* Full width submit button */
            background-color: transparent;
            color: #3498db;
            padding: 10px 15px;
            border: 2px solid #3498db;
            border-radius: 3px;
            cursor: pointer;
            border-radius: 8px;
        }

        input[type="email"]::placeholder {
    color: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
}

        .error {
            color: red;
            font-size: 15px;
            position: relative;
            top: -30px;
        }

        .login-button {
            background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(255, 255, 254, 0.3), rgba(255, 255, 254, 0.5), rgba(0, 0, 0, 0)); /* Gradient effect */
            color: #3498db;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin-top: 20px; /* Added margin to separate from form */
        }

         .policy {
            /* background-color: transparent;*/
            background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(255, 255, 254, 0.3), rgba(255, 255, 254, 0.5), rgba(0, 0, 0, 0)); /* Gradient effect */
            color: #089938;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin-top: 20px; /* Added margin to separate from form */
        }

        /* Make paragraphs slightly transparent and hidden by default */
        form p {
            opacity: 0.8;
            margin-top: 0; /* Remove top margin */
            display: none; /* Hide paragraphs by default */
        }

        /* Background effect styles */
        #bg-wrap {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        svg {
            width: 100%;
            height: 100%;
        }
 
    </style>
</head>
<body>

<!-- Background effect -->
<div id="bg-wrap">
  <svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
    <defs>
      <radialGradient id="Gradient1" cx="50%" cy="50%" fx="0.441602%" fy="50%" r=".5"><animate attributeName="fx" dur="34s" values="0%;3%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(255, 0, 255, 1)"></stop><stop offset="100%" stop-color="rgba(255, 0, 255, 0)"></stop></radialGradient>
      <radialGradient id="Gradient2" cx="50%" cy="50%" fx="2.68147%" fy="50%" r=".5"><animate attributeName="fx" dur="23.5s" values="0%;3%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(255, 255, 0, 1)"></stop><stop offset="100%" stop-color="rgba(255, 255, 0, 0)"></stop></radialGradient>
      <radialGradient id="Gradient3" cx="50%" cy="50%" fx="0.836536%" fy="50%" r=".5"><animate attributeName="fx" dur="21.5s" values="0%;3%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(0, 255, 255, 1)"></stop><stop offset="100%" stop-color="rgba(0, 255, 255, 0)"></stop></radialGradient>
      <radialGradient id="Gradient4" cx="50%" cy="50%" fx="4.56417%" fy="50%" r=".5"><animate attributeName="fx" dur="23s" values="0%;5%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(0, 255, 0, 1)"></stop><stop offset="100%" stop-color="rgba(0, 255, 0, 0)"></stop></radialGradient>
      <radialGradient id="Gradient5" cx="50%" cy="50%" fx="2.65405%" fy="50%" r=".5"><animate attributeName="fx" dur="24.5s" values="0%;5%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(0,0,255, 1)"></stop><stop offset="100%" stop-color="rgba(0,0,255, 0)"></stop></radialGradient>
      <radialGradient id="Gradient6" cx="50%" cy="50%" fx="0.981338%" fy="50%" r=".5"><animate attributeName="fx" dur="25.5s" values="0%;5%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(255,0,0, 1)"></stop><stop offset="100%" stop-color="rgba(255,0,0, 0)"></stop></radialGradient>
    </defs>
    <rect x="13.744%" y="1.18473%" width="100%" height="100%" fill="url(#Gradient1)" transform="rotate(334.41 50 50)"><animate attributeName="x" dur="20s" values="25%;0%;25%" repeatCount="indefinite"></animate><animate attributeName="y" dur="21s" values="0%;25%;0%" repeatCount="indefinite"></animate><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="7s" repeatCount="indefinite"></animateTransform></rect>
    <rect x="-2.17916%" y="35.4267%" width="100%" height="100%" fill="url(#Gradient2)" transform="rotate(255.072 50 50)"><animate attributeName="x" dur="23s" values="-25%;0%;-25%" repeatCount="indefinite"></animate><animate attributeName="y" dur="24s" values="0%;50%;0%" repeatCount="indefinite"></animate><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="12s" repeatCount="indefinite"></animateTransform>
    </rect>
    <rect x="9.00483%" y="14.5733%" width="100%" height="100%" fill="url(#Gradient3)" transform="rotate(139.903 50 50)"><animate attributeName="x" dur="25s" values="0%;25%;0%" repeatCount="indefinite"></animate><animate attributeName="y" dur="12s" values="0%;25%;0%" repeatCount="indefinite"></animate><animateTransform attributeName="transform" type="rotate" from="360 50 50" to="0 50 50" dur="9s" repeatCount="indefinite"></animateTransform>
    </rect>
  </svg>
</div>

    <h1>Sign Up</h1>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Username" onfocus="showParagraph('usernameParagraph')"><br>
        <!-- <p id="usernameParagraph">Enter your username.</p> -->
        <div class="error" id="usernameError"></div> <!-- Error message for username -->
        <input type="email" name="email" placeholder="Email" onfocus="showParagraph('emailParagraph')"><br>
        <p id="emailParagraph">Enter your college email.<br>after register i can verify it.<br>Otherwise your account is Deleted in some time</p>
        <div class="error" id="emailError"></div> <!-- Error message for email -->
        <input type="tel" name="mobile" placeholder="Mobile Number" onfocus="showParagraph('mobileParagraph')">
        <p id="mobileParagraph">after register i can verify the no.<br>Otherwise your account is Deleted in some time</p>
        <div class="error" id="mobileError"></div> <!-- Error message for mobile -->
        <input type="password" name="password" placeholder="Password" onfocus="showParagraph('passwordParagraph')"><br>
        <!-- <p id="passwordParagraph">Enter your password.</p> -->
        <div class="error" id="passwordError"></div> <!-- Error message for password -->
        <input type="date" name="signup_date" id="signup_date" placeholder="Signup Date" onfocus="showParagraph('signupDateParagraph')">
        <p id="signupDateParagraph">Enter Today's date.</p>
        <div class="error" id="signupDateError"></div> <!-- Error message for signup date -->
        <input type="submit" value="Sign Up">
    </form>
    
    <a href="login-email.php" class="login-button">already registered - login</a>
    <a href="policy.html" class="policy">Terms of Service</a>

    <!-- JavaScript to validate form fields -->
    <script>
        // Function to show paragraph when input is focused
        function showParagraph(paragraphId) {
            var paragraph = document.getElementById(paragraphId);
            paragraph.style.display = "block"; // Show paragraph
        }

        document.querySelector('form').addEventListener('submit', function(e) {
            const username = document.querySelector('input[name="username"]').value.trim();
            const email = document.querySelector('input[name="email"]').value.trim();
            const mobile = document.querySelector('input[name="mobile"]').value.trim();
            const password = document.querySelector('input[name="password"]').value.trim();
            const signupDate = document.querySelector('input[name="signup_date"]').value.trim();

            let isValid = true;

            // Validate username
            if (username === '') {
                document.getElementById('usernameError').innerText = 'Empty';
                isValid = false;
            } else {
                document.getElementById('usernameError').innerText = '';
            }

            // Validate email
            if (email === '') {
                document.getElementById('emailError').innerText = 'Empty';
                isValid = false;
            } else {
                document.getElementById('emailError').innerText = '';
            }

            // Validate mobile number
            if (mobile === '') {
                document.getElementById('mobileError').innerText = 'Empty';
                isValid = false;
            } else {
                document.getElementById('mobileError').innerText = '';
            }

            // Validate password
            if (password === '') {
                document.getElementById('passwordError').innerText = 'Empty';
                isValid = false;
            } else {
                document.getElementById('passwordError').innerText = '';
            }

            // Validate signup date
            if (signupDate === '') {
                document.getElementById('signupDateError').innerText = 'Empty';
                isValid = false;
            } else {
                document.getElementById('signupDateError').innerText = '';
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>