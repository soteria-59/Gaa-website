<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate the email input
    $subscriber_email = filter_var(trim($_POST['subscriber_email']), FILTER_SANITIZE_EMAIL);

    if (filter_var($subscriber_email, FILTER_VALIDATE_EMAIL)) {
        // Recipient email address
        $to = "admin@globaladvisorsandanalysts.com";
        
        // Subject and message
        $subject = "New Newsletter Subscription";
        $message = "You have received a new newsletter subscription:\n\n";
        $message .= "Email: " . $subscriber_email;
        
        // Headers
        $headers = "From: no-reply@yourdomain.com\r\n";
        $headers .= "Reply-To: $subscriber_email\r\n";

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo "Thank you for subscribing! We will keep you updated.";
        } else {
            echo "There was an issue sending your subscription. Please try again.";
        }
    } else {
        // Invalid email
        echo "Please enter a valid email address.";
    }
} else {
    // Handle incorrect request method
    echo "Invalid request method.";
}
?>
