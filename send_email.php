<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to_email = 'vishnusanthoshvr@gmail.com'; // Replace with your email address

    // Sanitize input data using PHP filter_var().
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    // Create email headers.
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Email subject.
    $subject = 'New Contact Form Submission';

    // Email message.
    $email_message = 'Name: ' . $name . "\n" .
                     'Email: ' . $email . "\n" .
                     'Message: ' . $message;

    // Attempt to send email.
    if (mail($to_email, $subject, $email_message, $headers)) {
        echo 'Your message has been sent successfully.';
    } else {
        echo 'Unable to send email. Please try again later.';
    }
} else {
    // Not a POST request, redirect back to the contact form.
    header("Location: index.html");
    exit;
}
?>
