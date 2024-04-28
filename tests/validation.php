<?php
// Include necessary headers and connection files
//include("../../layouts/header2.php");

include("../server/connection.php");


// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define output variable
$output = "";

// Function to check if the email exists in the database and display the email if it does
function checkEmailInDatabase($email) {
    global $conn;
    
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT user_email FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    // Bind the result to a variable
    $stmt->bind_result($existingEmail);
    $stmt->store_result();
    
    // Check if the email exists
    if ($stmt->num_rows() > 0) {
        // Fetch the email
        $stmt->fetch();
        // Return the existing email
        return "The email '$existingEmail' is in the database.";
    } else {
        // Email not found
        return "The email '$email' is not in the database.";
    }
}

// Perform the email check based on form submissions
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    
    // Check if the email is in the database and store the result in the output
    $output .= "<p>" . checkEmailInDatabase($email) . "</p>";
}

?>

