<?php
require 'vendor/autoload.php';

session_start();

$clientId = '591986170743-gkajkm1uqu4utkuprqgisgrnmrckr5d0.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://feedback-southpoint.000webhostapp.com';

$provider = new League\OAuth2\Client\Provider\Google([
    'clientId'     => $clientId,
    'clientSecret' => $clientSecret,
    'redirectUri'  => $redirectUri,
]);

// If the user is not authenticated, redirect to Google for authentication
if (!isset($_SESSION['access_token'])) {
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;
}

// Get the access token from the session
$token = $_SESSION['access_token'];

// Use the token to fetch user information
$user = $provider->getResourceOwner($token);

// Now, $user contains information about the authenticated user

// Display user information
echo 'Welcome, ' . $user->getFirstName() . ' ' . $user->getLastName() . '!<br>';
echo 'Email: ' . $user->getEmail();

// Provide a form for feedback
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Feedback - SOUTH POINT HIGH SCHOOL EXHIBITION</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="button_style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="content" align="center">
        <br>
        <br>
        <center>
            <span class="SubHead" style="font-weight:100;">Feedback
                <br>
                <br>
                <form action="submit_feedback.php" method="post">
                    <textarea name="feedback" placeholder="Enter your feedback here" required></textarea>
                    <br>
                    <input type="submit" value="Submit Feedback">
                </form>
            </span>
        </center>
    </div>
</body>
</html>
