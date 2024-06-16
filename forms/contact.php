<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $to = 'ranatravels09@gmail.com';  // Replace with the recipient's email address
   
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $fullMessage = "You have received a new message from your website contact form.\n\n";
    $fullMessage .= "Here are the details:\n\n";
    $fullMessage .= "Name: $name\n";
    $fullMessage .= "Email: $email\n\n";
    $fullMessage .= "Message:\n$message\n";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo 'Your message has been sent successfully!';
        header('location:https://dwarkaprint.com/contact.php');
    } else {
        echo 'There was a problem sending your message. Please try again later.';
        header('location:https://dwarkaprint.com/contact.php');
    }
} else {
    echo 'Invalid request method.';
}
?>
