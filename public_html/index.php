<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->usePutenv(true);
$dotenv->load(__DIR__.'/../.env');

// We save access and refresh tokens as well as the expire timestamp in the session.
// So we've to enable session support:
session_start();

// Instatiate the StravaApi class with API ID and API Secret (replace placeholders!):
$api = new Iamstuartwilson\StravaApi(getenv('STRAVA_CLIENT_ID'), getenv('STRAVA_CLIENT_SECRET'));

// Setup the API instance with authentication tokens, if possible:
if (
    !empty($_SESSION['strava_access_token'])
    && !empty($_SESSION['strava_refresh_token'])
    && !empty($_SESSION['strava_access_token_expires_at'])
) {
    $api->setAccessToken(
        $_SESSION['strava_access_token'],
        $_SESSION['strava_refresh_token'],
        $_SESSION['strava_access_token_expires_at']
    );
}

$action = isset($_GET['action']) ? $_GET['action'] : 'default';

switch ($action) {
    case 'auth':
        header('Location: ' . $api->authenticationUrl(getenv('CALLBACK_URL'), 'auto', 'activity:write'));

        return;

    case 'callback':
        echo '<h2>Callback Response Data</h2>';
        echo '<pre>';
        print_r($_GET);
        echo '</pre>';
        $code = $_GET['code'];
        $response = $api->tokenExchange($code);
        echo '<h2>Token Exchange Response Data</h2>';
        echo '<p>(after swapping the code from callback against tokens)</p>';
        echo '<pre>';
        print_r($response);
        echo '</pre>';

        $_SESSION['strava_access_token'] = isset($response->access_token) ? $response->access_token : null;
        $_SESSION['strava_refresh_token'] = isset($response->refresh_token) ? $response->refresh_token : null;
        $_SESSION['strava_access_token_expires_at'] = isset($response->expires_at) ? $response->expires_at : null;

        echo '<h2>Session Contents (after)</h2>';
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';

        echo '<p><a href="?action=test_request">Send test request</a></p>';
        echo '<p><a href="?action=refresh_token">Refresh Access Token</a></p>';

        return;

    case 'refresh_token':
        echo '<h2>Session Contents (before)</h2>';
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';

        echo '<h2>Refresh Token</h2>';
        $response = $api->tokenExchangeRefresh();
        echo '<pre>';
        print_r($response);
        echo '</pre>';

        $_SESSION['strava_access_token'] = isset($response->access_token) ? $response->access_token : null;
        $_SESSION['strava_refresh_token'] = isset($response->refresh_token) ? $response->refresh_token : null;
        $_SESSION['strava_access_token_expires_at'] = isset($response->expires_at) ? $response->expires_at : null;

        echo '<h2>Session Contents (after)</h2>';
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';

        return;

    case 'test_request':
        echo '<h2>Session Contents</h2>';
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';

        $response = $api->get('/athlete');
        echo '<h2>Test Request (/athlete)</h2>';
        echo '<pre>';
        print_r($response);
        echo '</pre>';

        return;

    case 'default':
    default:
        echo '<p>Start authentication flow.</p>';
        echo '<p><a href="?action=auth">Start oAuth Authentication Flow</a> (Strava oAuth URL: <code>'
            . $api->authenticationUrl(getenv('CALLBACK_URL'))
            . '</code>)</p>';
        echo '<h2>Session Contents</h2>';
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
        echo '<p><a href="?action=refresh_token">Refresh Access Token</a></p>';
}
