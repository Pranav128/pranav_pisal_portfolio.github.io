<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Gather form data (basic validation)
  $fullname = sanitize($_POST["fullname"]);
  $email = sanitize($_POST["email"]);
  $message = sanitize($_POST["message"]);

  // Your email address
  $to = "your_email@example.com";
  $subject = "New Form Submission";

  // Compose the email message
  $body = "Name: $fullname\n Email: $email\n Message:\n $message";

  // Send the email (using PHP's mail function)
  if (mail($to, $subject, $body)) {
    echo "Message sent successfully!";
  } else {
    echo "Error sending message";
  }

}

// Basic sanitization to prevent some malicious input
function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
