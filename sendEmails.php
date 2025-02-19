<?php
require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('seneedacharya12@gmail.com')
    ->setPassword('jcfw sudx eoud kvlt');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token)
{
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p> Your Verification Code is : '.$token.'</p>
        <a href="http://localhost/fyp/verify_email.php?token='.$token.'">Click to verify</a>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Verify your email'))
        ->setFrom(['lovecasmnp@gmail.com' => 'Nepalax Inc'])
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

//Reset Password

function sendPasswordResetLink($userEmail, $token)
{
    global $mailer;
    $body = '<a href="http://localhost/fyp/confirm_code.php?token='.$token.'>Reset Link</a>';

    // Create a message
    $message = (new Swift_Message('Verify your email'))
        ->setFrom(['seneedacharya12@gmail.com' => 'Ramailo Trek'])
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}


?>