<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');
// REGISTER USER

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  $errors = array();
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // Profile picture upload handling
  if (isset($_FILES['profile_picture'])) {
    $profile_picture = $_FILES['profile_picture']['name'];
    $profile_picture_tmp = $_FILES['profile_picture']['tmp_name'];
    $profile_picture_dir = "profile_pictures/" . $profile_picture;

    // Move the uploaded profile picture to the desired directory
    if (move_uploaded_file($profile_picture_tmp, $profile_picture_dir)) {
      // Encrypt the password before saving in the database
      // $password = password_hash($password_1, PASSWORD_DEFAULT);
      $password = $password_1;

      // first check the database to make sure 
      // a user does not already exist with the same username and/or email
      $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);

      if ($user) { // if user exists
        if ($user['username'] === $username) {
          array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email) {
          array_push($errors, "Email already exists");
        }
      }

      // Finally, register user if there are no errors in the form
      if (count($errors) == 0) {
        $query = "INSERT INTO users (username, email, password, profile_picture) 
                  VALUES('$username', '$email', '$password', '$profile_picture_dir')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: shop.php');
      }
    } else {
      array_push($errors, "Failed to move the uploaded file");
    }
  } else {
    array_push($errors, "Profile picture is required");
  }
}
// Initialize error array
$errors = array();

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = ($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: shop.php');
        } else {
            array_push($errors, "Wrong username/password combination");
            $_SESSION['login_attempts'] = isset($_SESSION['login_attempts']) ? ($_SESSION['login_attempts'] + 1) : 1;
            $loginAttempts = $_SESSION['login_attempts'];

            if ($loginAttempts === 5) {
                // If you had a timer here, it has been removed
            } elseif ($loginAttempts === 3) {
                // If you had a timer here, it has been removed
            } elseif ($loginAttempts === 1) {
                // If you had a timer here, it has been removed
            } else {
                // print("TRY AGAIN");
            }

            $_SESSION['login_disabled'] = true;
        }
    }
}

// ... 

// ... (existing code)

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if (isset($_POST['contact_btn'])) {
  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['msg'];

  // Insert the data into the database
  $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
  if ($conn->query($sql) === TRUE) {
    // Data inserted successfully
    echo "<script>alert('Message Sent Successfully');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close the database connection
$conn->close();
?>