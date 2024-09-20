<?php
// Replace this email address with your receiving email address
$receiving_email_address = 'thabisongubanee@gmail.com';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"])); // Clean and retrieve form data
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Validate form fields
    if (empty($name) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // If validation fails
        echo "Please fill in all fields correctly.";
        exit;
    }

    // Set the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    $mail_sent = mail($receiving_email_address, $subject, $message, $headers);

    // Check if the email was sent successfully
    if ($mail_sent) {
        echo "Your message has been sent.";
    } else {
        echo "Sorry, your message couldn't be sent.";
    }
} else {
    echo "There was a problem with your submission. Please try again.";
}
?>
