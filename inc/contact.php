<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate input
    if (!$first_name || !$email || !$message) {
        echo "Please fill out all fields correctly.";
        exit;
    }

    // Email configuration
    $to = "admin@globaladvisorsandanalysts.com"; // Your email address
    $subject = "New Message from FAQ Form";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email message
    $email_message = "You have received a new message from your website:\n\n";
    $email_message .= "First Name: $first_name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
