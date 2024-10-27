<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form fields
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $business = htmlspecialchars($_POST['business']);
    $country = htmlspecialchars($_POST['country']);
    $message = htmlspecialchars($_POST['message']);
    
    // Recipient email address (updated to your email)
    $to = "yashy45321@gmail.com";

    // Email subject
    $subject = "New Contact Form Submission from Synzon India Website";

    // Email content
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Business: $business\n";
    $body .= "Country: $country\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us, $name. We will get back to you shortly.";
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message. Please try again later.";
    }
} else {
    // Redirect back to the homepage if the request method is not POST
    header("Location: index.html");
    exit();
}
?>
