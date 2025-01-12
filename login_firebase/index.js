// Your web app's Firebase configuration
var firebaseConfig = {
  apiKey: "AIzaSyBvX_j1y-6WbYsgTUz_2_ELH4BVhhjP_9g",
  authDomain: "email-login-for-freecad-app.firebaseapp.com",
  projectId: "email-login-for-freecad-app",
  storageBucket: "email-login-for-freecad-app.appspot.com",
  messagingSenderId: "135887663364",
  appId: "1:135887663364:web:c4041af9677a1e06052051",
  measurementId: "G-SEGBK08VHV"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
// Initialize variables
const auth = firebase.auth();
const database = firebase.database();

// Set up our register function
function register() {
  // Get all our input fields
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;
  var full_name = document.getElementById('full_name').value;
  var favourite_song = document.getElementById('favourite_song').value;
  var milk_before_cereal = document.getElementById('milk_before_cereal').value;

  // Validate input fields
  if (validate_email(email) == false || validate_password(password) == false) {
    alert('Email or Password is Outta Line!!');
    return;
    // Don't continue running the code
  }
  if (validate_field(full_name) == false || validate_field(favourite_song) == false || validate_field(milk_before_cereal) == false) {
    alert('One or More Extra Fields is Outta Line!!');
    return;
  }

  // Move on with Auth
  auth.createUserWithEmailAndPassword(email, password)
    .then(function (userCredential) {
      // Declare user variable
      var user = userCredential.user;

      // Send email verification
      user.sendEmailVerification().then(function () {
        // Email verification sent
        alert('A verification email has been sent to your email address. Please verify your email before logging in.');
        // Redirect to next.html or any other page
        window.location.href = "after_login/index3_loding.html";
      }).catch(function (error) {
        // Error sending email verification
        console.error("Error sending email verification", error);
        alert('An error occurred while sending the verification email. Please try again later.');
      });

      // Add this user to Firebase Database
      var database_ref = database.ref();

      // Create User data
      var user_data = {
        email: email,
        full_name: full_name,
        favourite_song: favourite_song,
        milk_before_cereal: milk_before_cereal,
        last_login: Date.now()
      };

      // Push to Firebase Database
      database_ref.child('users/' + user.uid).set(user_data);

      // DOne
      // alert('User Created!!') // Remove this alert, as we're redirecting the user
    })
    .catch(function (error) {
      // Firebase will use this to alert of its errors
      var error_code = error.code;
      var error_message = error.message;

      alert(error_message);
    });
}

// Set up our login function
function login() {
  // Get all our input fields
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;

  // Validate input fields
  if (validate_email(email) == false || validate_password(password) == false) {
    alert('Email or Password is Outta Line!!');
    return;
    // Don't continue running the code
  }

  auth.signInWithEmailAndPassword(email, password)
    .then(function () {
      // Declare user variable
      var user = auth.currentUser;

      // Add this user to Firebase Database
      var database_ref = database.ref();

      // Create User data
      var user_data = {
        last_login: Date.now()
      };

      // Push to Firebase Database
      database_ref.child('users/' + user.uid).update(user_data);

      // // Done
      // alert('User Logged In!!');

      // Redirect to the desired website
      window.location.href = "after_login/index3_loding.html";
    })
    .catch(function (error) {
      // Firebase will use this to alert of its errors
      var error_code = error.code;
      var error_message = error.message;

      alert(error_message);
    });
}

// Validate Functions
function validate_email(email) {
  expression = /^[^@]+@(gmail\.com|\w+(\.\w+)*\.edu\.in)$/;
  if (expression.test(email) == true) {
    // Email is good
    return true;
  } else {
    // Email is not good
    alert('This email ID is not valid !');
    return false;
  }
}


function validate_password(password) {
  // Firebase only accepts lengths greater than 6
  if (password.length < 6) {
    return false;
  } else {
    return true;
  }
}

function validate_field(field) {
  if (field == null) {
    return false;
  }

  if (field.length <= 0) {
    return false;
  } else {
    return true;
  }
}
